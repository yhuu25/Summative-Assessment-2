<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->taskModel->where('is_archived', 0)->findAll();
        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id = null)
    {
        $task = $this->taskModel->find($id);
        if (!$task || $task['is_archived']) {
            return redirect()->to('/tasks');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id = null)
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id = null)
    {
        $this->taskModel->update($id, ['is_archived' => 1]);
        return redirect()->to('/tasks');
    }
}
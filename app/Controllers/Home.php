<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks     = $taskModel->where('is_archived', 0)->findAll();

        return view('welcome_message', ['tasks' => $tasks]);
    }

    public function about()
    {
        return view('about');
    }
}
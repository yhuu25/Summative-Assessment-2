<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <nav>
        <a href="/">Welcome</a> |
        <a href="/tasks">Task List</a> |
        <a href="/profile">Profile</a> |
        <a href="/about">About</a> |
        <a href="/logout">Logout</a>
    </nav>

    <h1>Edit Task</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="/tasks/update/<?= esc($task['id']) ?>" method="post">
        <?= csrf_field() ?>
        
        <div>
            <label>Title (Required):</label><br>
            <input type="text" name="title" value="<?= old('title', $task['title'] ?? '') ?>" required>
        </div>
        <br>
        
        <div>
            <label>Description:</label><br>
            <textarea name="description"><?= old('description', $task['description'] ?? '') ?></textarea>
        </div>
        <br>

        <div>
            <label>Status:</label><br>
            <select name="status">
                <option value="pending" <?= (old('status', $task['status'] ?? '') === 'pending') ? 'selected' : '' ?>>pending</option>
                <option value="completed" <?= (old('status', $task['status'] ?? '') === 'completed') ? 'selected' : '' ?>>completed</option>
            </select>
        </div>
        <br>
        
        <div>
            <label>Task Date (Required):</label><br>
            <input type="date" name="task_date" value="<?= old('task_date', $task['task_date'] ?? '') ?>" required>
        </div>
        <br>
        
        <div>
            <button type="submit">Update Task</button>
            <a href="/tasks">Cancel</a>
        </div>
    </form>
</body>
</html>
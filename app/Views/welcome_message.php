<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome Page</h1>
    <nav>
        <a href="/">Home</a> |
        <a href="/tasks">Task List</a> |
        <a href="/profile">Profile</a> |
        <a href="/about">About</a> |
        <?php if (session()->get('isLoggedIn')): ?>
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a href="/login">Login</a>
        <?php endif; ?>
    </nav>

    <h2>Active Tasks</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?= esc($task['title']) ?> - <?= esc($task['task_date']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
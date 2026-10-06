<!DOCTYPE html>
<html>
<head>
    <title>Complete Task List</title>
</head>
<body>
    <nav>
        <a href="/">Welcome</a> |
        <a href="/tasks">Task List</a> |
        <a href="/profile">Profile</a> |
        <a href="/about">About</a> |
        <?php if (session()->get('isLoggedIn')): ?>
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a href="/login">Login</a>
        <?php endif; ?>
    </nav>

    <h1>Complete Task List</h1>

    <?php if (session()->get('isLoggedIn')): ?>
        <p><a href="/tasks/new">+ Create New Task</a></p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Title</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created At</th>
                <?php if (session()->get('isLoggedIn')): ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['status'] ?? 'pending') ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                        <td><?= esc($task['created_at'] ?? '') ?></td>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <td>
                                <a href="/tasks/edit/<?= $task['id'] ?>">Edit</a> |
                                <a href="/tasks/delete/<?= $task['id'] ?>" onclick="return confirm('Are you sure you want to archive this task?')">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?= session()->get('isLoggedIn') ? '6' : '5' ?>">No tasks found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
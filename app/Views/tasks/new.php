<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
</head>
<body>
    <h1>Create New Task</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="/tasks/create" method="post">
        <?= csrf_field() ?>
        <div>
            <label>Title (Required):</label>
            <input type="text" name="title" value="<?= old('title') ?>">
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description"><?= old('description') ?></textarea>
        </div>
        <div>
            <label>Task Date (Required):</label>
            <input type="date" name="task_date" value="<?= old('task_date') ?>">
        </div>
        <div>
            <button type="submit">Save Task</button>
        </div>
    </form>
    <p><a href="/tasks">Cancel</a></p>
</body>
</html>
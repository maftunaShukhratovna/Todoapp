<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - Todo App</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #0d6efd;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Edit Task</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/update">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
                            <div class="mb-3">
                                <label for="title" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?= htmlspecialchars($task['title']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="datetime-local" class="form-control" id="due_date" name="due_date"
                                    value="<?= date('Y-m-d\TH:i', strtotime($task['due_date'])) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="created_at" class="form-label">Created At</label>
                                <input type="text" class="form-control" id="created_at"
                                    value="<?= htmlspecialchars($task['created_at']) ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="updated_at" class="form-label">Last Updated</label>
                                <input type="text" class="form-control" id="updated_at"
                                    value="<?= htmlspecialchars($task['updated_at']) ?>" disabled>
                            </div>

                            <div class="text-center my-4">
                                <a href="/pending?id=<?= htmlspecialchars($task['id']) ?>"
                                    class="btn <?= $task['status'] === 'pending' ? 'btn-warning' : 'btn-outline-warning' ?> mx-2">
                                    <i class="fa fa-clock"></i> Pending
                                </a>
                                
                                <a href="/in-progress?id=<?= htmlspecialchars($task['id']) ?>"
                                    class="btn <?= $task['status'] === 'in_progress' ? 'btn-primary' : 'btn-outline-primary' ?> mx-2">
                                    <i class="fa fa-hourglass-half"></i> In-Progress
                                </a>

                                <a href="/complete?id=<?= htmlspecialchars($task['id']) ?>"
                                    class="btn <?= $task['status'] === 'completed' ? 'btn-success' : 'btn-outline-success' ?> mx-2">
                                    <i class="fa fa-check"></i> Completed
                                </a>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Update Task</button>
                                <a href="/todos" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kXicf0hPb6uG0sl3APeAC/mtvqqroVhF/VR2Nyc8LkAsEJmBMec1oMPT8sJdPs" crossorigin="anonymous">
    </script>
</body>

</html>
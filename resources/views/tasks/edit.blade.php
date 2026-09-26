<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            color: #17324d;
            margin: 0;
        }

        /* NAVIGATION */

        nav {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(21,101,192,0.25);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.15);
            padding: 9px 16px;
            border-radius: 8px;
        }

        /* CONTAINER */

        .container {
            width: 90%;
            max-width: 650px;
            margin: 45px auto;
        }

        /* FORM CARD */

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(30,80,140,0.12);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            color: #1565c0;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #6b7f95;
        }

        /* LABEL */

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        /* INPUTS */

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #bbdefb;
            border-radius: 9px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            background: #fbfdff;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #1976d2;
            box-shadow: 0 0 0 3px #e3f2fd;
        }

        /* UPDATE BUTTON */

        .update-button {
            width: 100%;
            margin-top: 25px;
            background: linear-gradient(135deg, #1565c0, #1976d2);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        .update-button:hover {
            background: #0d47a1;
        }

        /* BACK */

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #1565c0;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* ERROR */

        .error {
            background: #ffebee;
            border: 1px solid #ef9a9a;
            color: #b71c1c;
            padding: 14px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>

<!-- NAVIGATION -->

<nav>

    <div class="logo">
        Task Manager
    </div>

    <a href="/" class="nav-link">
        Dashboard
    </a>

</nav>

<div class="container">

    <div class="form-card">

        <div class="form-header">

            <h1>Edit Task</h1>

            <p>
                Update the details of your task.
            </p>

        </div>

        @if($errors->any())

            <div class="error">

                <strong>Please fix the following:</strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- UPDATE TASK FORM -->

        <form action="/tasks/{{ $task->id }}" method="POST">

            @csrf
            @method('PUT')

            <label for="task_name">
                Task Name
            </label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ old('task_name', $task->task_name) }}"
                required
            >

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $task->description) }}</textarea>

            <label for="status">
                Status
            </label>

            <select
                id="status"
                name="status"
            >

                <option
                    value="Pending"
                    {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}
                >
                    Pending
                </option>

                <option
                    value="Completed"
                    {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}
                >
                    Completed
                </option>

            </select>

            <label for="due_date">
                Due Date
            </label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date', $task->due_date) }}"
            >

            <button
                type="submit"
                class="update-button"
            >
                ✓ Update Task
            </button>

        </form>

        <a href="/" class="back-link">
            ← Back to Tasks
        </a>

    </div>

</div>

</body>
</html>
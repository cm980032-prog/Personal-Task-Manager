<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f8ff;
            color: #17324d;
        }

        /* NAVIGATION */
        nav {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(21, 101, 192, 0.25);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 14px;
            background: rgba(255,255,255,0.15);
            padding: 9px 16px;
            border-radius: 8px;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.25);
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, #1565c0, #42a5f5);
            color: white;
            padding: 45px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        header p {
            margin-top: 10px;
            opacity: 0.9;
        }

        /* MAIN CONTAINER */
        .container {
            width: 90%;
            max-width: 1150px;
            margin: 35px auto;
        }

        /* DASHBOARD CARDS */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(30, 80, 140, 0.10);
            border-left: 5px solid #1976d2;
        }

        .card h3 {
            margin: 0;
            color: #607d9b;
            font-size: 14px;
        }

        .card .number {
            font-size: 30px;
            font-weight: bold;
            color: #1565c0;
            margin-top: 8px;
        }

        /* TOP SECTION */
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-section h2 {
            margin: 0;
            color: #17324d;
        }

        .add-button {
            background: #1565c0;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(21,101,192,0.25);
            transition: 0.2s;
        }

        .add-button:hover {
            background: #0d47a1;
            transform: translateY(-2px);
        }

        /* SUCCESS */
        .success {
            background: #e3f2fd;
            border: 1px solid #90caf9;
            color: #1565c0;
            padding: 14px;
            margin-bottom: 25px;
            border-radius: 10px;
        }

        /* TABLE CARD */
        .table-card {
            background: white;
            border-radius: 14px;
            padding: 15px;
            box-shadow: 0 5px 20px rgba(30, 80, 140, 0.10);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1565c0;
            color: white;
            padding: 15px;
            text-align: left;
        }

        th:first-child {
            border-radius: 8px 0 0 8px;
        }

        th:last-child {
            border-radius: 0 8px 8px 0;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e3edf7;
        }

        tr:hover {
            background: #f5f9ff;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .completed {
            background: #d1f2df;
            color: #18794e;
        }

        /* BUTTONS */
        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
            flex-wrap: wrap;
        }

        .actions form {
            display: inline;
            margin: 0;
        }

        .edit-button,
        .complete-button,
        .delete-button {
            border: none;
            padding: 8px 11px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .edit-button {
            background: #1976d2;
            color: white;
        }

        .edit-button:hover {
            background: #0d47a1;
        }

        .complete-button {
            background: #42a5f5;
            color: white;
        }

        .complete-button:hover {
            background: #1976d2;
        }

        .delete-button {
            background: #ef5350;
            color: white;
        }

        .delete-button:hover {
            background: #c62828;
        }

        /* EMPTY */
        .empty {
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(30, 80, 140, 0.10);
        }

        .empty h3 {
            color: #1565c0;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .dashboard {
                grid-template-columns: 1fr;
            }

            .top-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            header h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<!-- NAVIGATION -->
<nav>
    <div class="logo">Task Manager</div>

    <a href="/" class="nav-link">
        Dashboard
    </a>
</nav>

<!-- HEADER -->
<header>
    <h1>Personal Task Manager</h1>
    <p>Organize your tasks, track your progress, and stay productive.</p>
</header>

<div class="container">

    @if(session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- DASHBOARD -->
    <div class="dashboard">

        <div class="card">
            <h3>Total Tasks</h3>
            <div class="number">
                {{ $tasks->count() }}
            </div>
        </div>

        <div class="card">
            <h3>Pending Tasks</h3>
            <div class="number">
                {{ $tasks->where('status', 'Pending')->count() }}
            </div>
        </div>

        <div class="card">
            <h3>Completed Tasks</h3>
            <div class="number">
                {{ $tasks->where('status', 'Completed')->count() }}
            </div>
        </div>

    </div>

    <!-- TASK HEADER -->
    <div class="top-section">
        <div>
            <h2>My Tasks</h2>
        </div>

        <a href="/tasks/create" class="add-button">
            + Add New Task
        </a>
    </div>

    @if($tasks->count() > 0)

        <div class="table-card">

            <table>

                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($tasks as $task)

                        <tr>

                            <td>
                                <strong>
                                    {{ $task->task_name }}
                                </strong>
                            </td>

                            <td>
                                {{ $task->description ?: 'No description' }}
                            </td>

                            <td>

                                @if($task->status === 'Pending')

                                    <span class="status pending">
                                        Pending
                                    </span>

                                @else

                                    <span class="status completed">
                                        Completed
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $task->due_date ?: 'No due date' }}
                            </td>

                            <td>

                                <div class="actions">

                                    <!-- EDIT -->
                                    <a
                                        href="/tasks/{{ $task->id }}/edit"
                                        class="edit-button"
                                    >
                                        Edit
                                    </a>

                                    <!-- STATUS -->
                                    <form
                                        action="/tasks/{{ $task->id }}/status"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="complete-button"
                                        >
                                            {{ $task->status === 'Pending' ? 'Complete' : 'Set Pending' }}
                                        </button>
                                    </form>

                                    <!-- DELETE -->
                                    <form
                                        action="/tasks/{{ $task->id }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-button"
                                            onclick="return confirm('Are you sure you want to delete this task?')"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty">

            <h3>No Tasks Yet</h3>

            <p>
                Start organizing your work by adding your first task.
            </p>

            <br>

            <a href="/tasks/create" class="add-button">
                + Add Your First Task
            </a>

        </div>

    @endif

</div>

</body>
</html>
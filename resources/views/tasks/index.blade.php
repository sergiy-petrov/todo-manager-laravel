@extends('adminlte::page')

@section('title')
    Tasks
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="{{ route('tasks.index') }}">Tasks</a>
                    </h3>

                    <div class="pull-right">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <form method="get" href="{{ route('tasks.index') }}">
                            <div class="col-sm-3">
                                <label>Search by name:
                                    <input type="search" name="search" class="form-control input-sm" value="{{ request('search') }}">
                                </label>
                            </div>

                            <div class="col-sm-3">
                                <label>
                                    Priority
                                    <select name="priority" class="form-control input-sm">
                                        <option value="">- Any- </option>
                                        @foreach(range(0, 5) as $priority)
                                            <option value="{{ $priority }}" {{ $priority == request('priority') ? 'selected' : '' }}>
                                                {{ $priority }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="col-sm-3">
                                <label>Date
                                    <input type="date" name="date" class="form-control input-sm" value="{{ request('date') }}">
                                </label>
                            </div>

                            <div class="col-sm-3">
                                <input type="submit" class="form-control btn btn-primary" value="Search">
                            </div>
                        </form>
                    </div>

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Assigned to me</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Created my me</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Priority</th>
                                        <th>Creator</th>
                                        <th>Assignee</th>
                                        <th>Completed</th>
                                        <th>Completed Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasksAssignedToMe as $task)
                                        <tr>
                                            <td>
                                                <a href="{{ route('tasks.show', $task) }}">
                                                    {{ $task->title }}
                                                </a>
                                            </td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->owner_name_and_email }}</td>
                                            <td>{{ $task->assignee_name_and_email }}</td>
                                            <td>{{ $task->is_completed ? '+' : '-' }}</td>
                                            <td>{{ $task->completed_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Priority</th>
                                        <th>Creator</th>
                                        <th>Assignee</th>
                                        <th>Completed</th>
                                        <th>Completed Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasksCreatedByMe as $task)
                                        <tr>
                                            <td>
                                                <a href="{{ route('tasks.show', $task) }}">
                                                    {{ $task->title }}
                                                </a>
                                            </td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->owner_name_and_email }}</td>
                                            <td>{{ $task->assignee_name_and_email }}</td>
                                            <td>{{ $task->is_completed ? '+' : '-' }}</td>
                                            <td>{{ $task->completed_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

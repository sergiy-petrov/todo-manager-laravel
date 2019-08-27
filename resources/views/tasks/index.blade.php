@extends('adminlte::page')

@section('title')
    Tasks
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tasks</h3>
                </div>

                <div class="box-body">
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
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->owner->name }} ({{ $task->owner->email }})</td>
                                            <td>{{ $task->assignee->name }} ({{ $task->assignee->email }})</td>
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

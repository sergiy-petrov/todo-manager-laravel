@extends('adminlte::page')

@section('title')
    Task #{{ $task->id }}
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Task #{{ $task->id }}</h3>

            <div class="box-tools">
                @can('delete', $task)
                    {!! form($deleteForm) !!}
                @endcan
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-sm-2">
                    <strong>Title</strong>
                </div>
                <div class="col-sm-10">
                    {{ $task->title }}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <strong>Priority</strong>
                </div>
                <div class="col-sm-10">
                    {{ $task->priority }}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <strong>Creator</strong>
                </div>
                <div class="col-sm-10">
                    {{ $task->owner_name_and_email }}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <strong>Assignee</strong>
                </div>
                <div class="col-sm-10">
                    {{ $task->assignee_name_and_email }}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <strong>Completed</strong>
                </div>
                <div class="col-sm-10">
                    {{ $task->is_completed ? '+' : '-' }}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <strong>Completed Date</strong>
                </div>
                <div class="col-sm-10">
                    {{ $task->completed_at }}
                </div>
            </div>
        </div>
    </div>
@endsection

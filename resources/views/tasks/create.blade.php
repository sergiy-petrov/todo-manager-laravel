@extends('adminlte::page')

@section('title')
    Create Task
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create Task</h3>
                </div>

                <div class="box-body">
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

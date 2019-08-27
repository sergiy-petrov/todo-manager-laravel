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
                                    <tr role="row">
                                        <th>Title</th>
                                        <th>Priority</th>
                                        <th>Owner</th>
                                        <th>Assignee</th>
                                        <th>Completed</th>
                                        <th>Completed Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th>Title</th>
                                        <th>Priority</th>
                                        <th>Owner</th>
                                        <th>Assignee</th>
                                        <th>Completed</th>
                                        <th>Completed Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
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

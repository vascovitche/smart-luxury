@extends('admin::layouts.master')

@section('title')
    Users
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active">Users</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('admin::users.blocks.table')
                </div>
            </div>
        </div>
    </div>

@stop

@extends('admin::layouts.master')

@section('title')
    <div class="d-flex">
        Subscribers
    </div>
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active">Subscribers</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    @include('admin::subscribers.blocks._table')
                </div>
            </div>
        </div>
    </div>
@stop

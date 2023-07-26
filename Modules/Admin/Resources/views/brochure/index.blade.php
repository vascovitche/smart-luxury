@extends('admin::layouts.master')

@section('title')
    <div class="d-flex">
        Brochure
    </div>
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active">Brochure</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('admin::brochure.blocks._actions')
                </div>
            </div>
        </div>
    </div>
@stop

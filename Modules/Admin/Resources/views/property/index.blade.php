@extends('admin::layouts.master')

@section('title')

    <div class="d-flex">
        Properties

        <form action="{{ route('admin.property.store') }}" class="ml-1" method="POST">
            @csrf

            <button class="btn btn-sm btn-primary d-inline-block ml-2" type="submit">
                <i class=" fas fa-plus-circle mr-1"></i>
                Add New Property
            </button>
        </form>

    </div>
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active">Properties</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    @include('admin::property.blocks._table')
                </div>
            </div>
        </div>
    </div>

@stop

@extends('admin::layouts.master')

@section('title')
    <div class="d-flex">
        Integration with CRM
    </div>
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active">Integration with CRM</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.amo.integration') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-link"></i>
                Интеграция с Amo CRM
            </a>
        </div>
    </div>
@stop
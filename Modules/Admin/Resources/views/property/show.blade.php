@extends('admin::layouts.master')

@section('title')
    Недвижимость {{ $property->product_code }}
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}">Недвижимость</a></li>
    <li class="breadcrumb-item active">{{ $property->product_code ?? $property->id }}</li>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            @include('admin::property.show-blocks._general')
            @include('admin::property.show-blocks._translations')

        </div>

        <div class="col-md-4">

            @if($property->property_type != \App\Enums\PropertyType::LAND)
                @include('admin::property.show-blocks._base')
            @endif

            @include('admin::property.show-blocks._labels')

            @if($property->property_type != \App\Enums\PropertyType::LAND)
                @include('admin::property.show-blocks._locations')
                @include('admin::property.show-blocks._infrastructures')
                @include('admin::property.show-blocks._leisures')
                @include('admin::property.show-blocks._additionals')
            @endif
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin::property.show-blocks._images')
        </div>
    </div>
@stop

@push('styles')
    <link rel="stylesheet" href="{{ asset("modules/admin/plugins/select2/dist/css/select2.min.css") }}">
    <style>
        .select2-container .select2-selection--single {
            height: 35px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #027bfe;
            border: 1px solid #027bfe;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
    </style>
@endpush

@extends('admin::layouts.master')

@section('title')
    Edit Property ({{ $property->property_type }})
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}">Недвижимость</a></li>
    @if($property->exists)
        <li class="breadcrumb-item"><a
                    href="{{ route('admin.property.show', $property->id) }}">{{ $property->product_code ?? $property->id }}</a>
        </li>
        <li class="breadcrumb-item active">Редактировать</li>
    @else
        <li class="breadcrumb-item active">Создать</li>
    @endif
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            @include('admin::property.forms._general')

            @include('admin::property.forms._languages-form', [
                'model' => $property,
            ])
        </div>

        <div class="col-md-4">
            @if ($property->isPublishable())
                @include('admin::property.forms._publish')
            @endif

            @include('admin::property.forms._images')

        </div>
    </div>

@stop

@include('admin::property.blocks._scripts')

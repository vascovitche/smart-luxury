@extends('admin::layouts.master')

@section('title')
    Фото {{ $property->product_code }}
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}">Недвижимость</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.property.show', $property->id) }}">{{ $property->product_code ?? $property->id }}</a></li>
    <li class="breadcrumb-item active">Фото</li>
@stop

@section('content')

    <div class="row">
        @foreach($images as $image)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid pad" src="{{ $image->getImageLink() }}" alt="...">
                    </div>
                    <div class="card-footer">
                        <form id="delete-image-{{ $image->id }}"
                              action="{{ route('admin.property.destroy-image', $image->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                        </form>
                        <button form="delete-image-{{ $image->id }}" class="btn btn-sm btn-danger"
                                data-ask="1" data-title="Delete Property"
                                data-message="Are you sure you want to delete the Property?"
                                data-type="danger"><i class="far fa-times-circle mr-2"></i>Удалить
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

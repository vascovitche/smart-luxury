<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Фото</span>
        <a class="btn btn-sm btn-info ml-auto"
           href="{{ route('admin.property.index-image', $property->id) }}">
            <i class="far fa-file-image mr-1"></i>
            See All Images
        </a>

    </div>
    <div class="card-body">

        <form action="{{ route('admin.property.image.upload', $property->id) }}" method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <input id="x1" type="hidden" name="x1">
            <input id="y1" type="hidden" name="y1">
            <input id="width" type="hidden" name="width">
            <input id="height" type="hidden" name="height">

        @include('admin::components.input_group', [
             'type' => 'file',
             'name' => 'image',
             'label' => 'Image',
        ])

        @include('admin::components.input_group', [
             'type' => 'select',
             'name' => 'type',
             'required' => true,
             'label' => false,
             'items' => \App\Enums\ImageType::forSelect(),
             'defaultPlaceholderValue' => 'Not Selected',
        ])

    </div>
    <div class="card-footer">
        <button class="btn btn-primary">
            <i class="fa fa-save mr-1"></i>Save
        </button>
    </div>
    </form>
</div>

@include('admin::components.crop-image-modal', [
    'title' => 'Upload Image'
])




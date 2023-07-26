<form action="{{ route('admin.brochure.upload') }}" method="POST" enctype="multipart/form-data">

    @csrf

    @include('admin::components.input_group', [
        'type' => 'file',
        'required' => true,
        'label' => 'Upload Brochure',
        'name' => 'brochure',
    ])


    <button class="btn btn-primary" type="submit">
        <i class="fa fa-save"></i>
    </button>


</form>


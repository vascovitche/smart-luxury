<a href="{{ route('admin.property.edit', $property->id) }}" class="btn btn-primary btn-sm">
    <em class="fas fa-pen"></em>
    Edit
</a>

<div class="d-inline-block">
    <form id="delete-property-{{ $property->id }}"
          action="{{ route('admin.property.destroy', $property->id) }}" method="POST">
        @csrf
        @method('DELETE')

    </form>
    <button form="delete-property-{{ $property->id }}" class="btn btn-danger ml-1 btn-sm"
            data-ask="1" data-title="Delete Property"
            data-message="Are you sure you want to delete the Property?"
            data-type="danger"><i class="fas fa-trash mr-1"></i>Delete
    </button>
</div>

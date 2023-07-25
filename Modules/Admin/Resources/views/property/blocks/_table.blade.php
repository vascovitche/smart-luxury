@push('styles')
    <style>
        img.preview {
            height: 36px;
            object-fit: cover;
        }

        .posts-table td {
            vertical-align: middle;
        }
    </style>
@endpush

<table class="table table-striped mb-4 table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th class="text-center">Image</th>

        <th class="text-center">Translations</th>
        <th class="text-center">Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($properties as $property)
        <tr>
            <td>
                <a href="{{ route('admin.property.show', $property->id) }}">{{ $loop->iteration }}</a>
            </td>
            <td class="text-center">
                <img class="preview" src="{{ $property->images->first()?->getImageLink() }}" alt="">
            </td>

            <td class="text-center">
                {{ implode(', ', $property->translations->pluck('code')->toArray()) }}
            </td>

            <td class="text-center">
                @if ($property->published_at === null)
                    <span class="badge bg-light">Not Published</span>
                @else
                    <span class="badge badge-success">Published</span>
                @endif
            </td>

            <td>
                <a href="{{ route('admin.property.show', $property->id) }}" class="btn btn-warning btn-sm mr-1">
                    <i class="fas fa-eye"></i>
                </a>
                @include('admin::property.blocks._actions')
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
<div class="pr-3 pl-3">{{ $properties->links() }}</div>

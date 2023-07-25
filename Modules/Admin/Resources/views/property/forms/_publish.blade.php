<div class="card">
    <div class="card-header">
        Активность
    </div>
    <form action="{{ route('admin.property.toggle-publish', $property->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">
            @include('admin::components.input_group', [
                'type' => 'text',
                'name' => 'date',
                'required' => false,
                'label' => false,
                'placeholder' => 'Опубликовать в',
                'defaultValue' => now()->toDateString()
            ])
        </div>

        <div class="card-footer">
            @if ($property->published_at === null)
                <button class="btn btn-success mt-3">Опубликовать</button>
            @else
                <button class="btn btn-warning mt-3">Отозвать публикацию</button>
            @endif
        </div>

    </form>
</div>




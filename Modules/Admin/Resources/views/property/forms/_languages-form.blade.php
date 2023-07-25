<div class="card">
    <div class="card-header">
        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            {{ $language->name }}
        </button>
        <div class="dropdown-menu">
            @foreach($languages as $lang)
                <a class="dropdown-item"
                   href="{{ route('admin.property.edit', $property->id). '?language_code=' . $lang->code}}">
                    {{ $lang->name }}
                </a>
            @endforeach
        </div>
    </div>

    <form action="{{ route('admin.property.update-translated-fields', $property->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="mt-3">
                <input type="hidden" name="language_code" value="{{ $language->code }}">

                @include('admin::components.input_group', [
                    'type' => 'text',
                    'required' => true,
                    'label' => 'Заголовок',
                    'name' => 'title',
                    'placeholder' => 'title',
                    'defaultValue' => $property->translations->first()?->pivot->title
                ])

                @include('admin::components.input_group', [
                     'type' => 'textarea',
                     'name' => 'description',
                     'required' => true,
                     'label' => 'Описание',
                     'rows' => 5,
                     'defaultValue' => $property->translations->first()?->pivot->description
                ])

                @include('admin::components.input_group', [
                     'type' => 'textarea',
                     'name' => 'features',
                     'required' => true,
                     'label' => 'Особенности',
                     'rows' => 5,
                     'defaultValue' => $property->translations->first()?->pivot->features
                ])
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary mt-lg-4" type="submit">
                <i class="fa fa-save"></i>
                Сохранить перевод
            </button>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        Основная информация
    </div>
    <form action="{{ route('admin.property.update', $property->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @include('admin::components.input_group', [
                         'type' => 'select',
                         'name' => 'ad_type',
                         'required' => true,
                         'label' => 'Тип объявления',
                         'items' => \App\Enums\AdType::forSelect(),
                         'defaultValue' => $property->ad_type?->value,
                         'defaultPlaceholderValue' => 'Не выбран',
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'area',
                         'required' => true,
                         'label' => 'Площадь',
                         'defaultValue' => $property->area,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'text',
                         'name' => 'address',
                         'required' => false,
                         'label' => 'Адрес',
                         'defaultValue' => $property->address,
                    ])
                </div>

                <div class="col-md-6">
                    @include('admin::components.input_group', [
                         'type' => 'text',
                         'name' => 'video_link',
                         'required' => false,
                         'label' => 'Видео',
                         'defaultValue' => $property->video_link,
                    ])

                    <div class="row">
                        <div class="col-md-8">
                            @include('admin::components.input_group', [
                                 'type' => 'number',
                                 'name' => 'price',
                                 'required' => true,
                                 'label' => 'Цена',
                                 'defaultValue' => $property->price,
                            ])
                        </div>
                        <div class="col-md-4">
                            @include('admin::components.input_group', [
                                 'type' => 'select',
                                 'name' => 'currency',
                                 'required' => true,
                                 'label' => 'Валюта',
                                 'items' => \App\Enums\Currency::forSelect(),
                                 'defaultValue' => $property->currency?->value,
                                 'defaultPlaceholderValue' => 'Валюта',
                            ])
                        </div>
                    </div>

                    @include('admin::components.input_group', [
                         'type' => 'text',
                         'name' => 'residential_complex',
                         'required' => false,
                         'label' => 'Жилой комплекс',
                         'defaultValue' => $property->residential_complex
                    ])

                </div>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-primary">
                <i class="fa fa-save mr-1"></i>Сохранить
            </button>
        </div>
    </form>
</div>




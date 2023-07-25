@php
    $simpleSelectItems = [
        '1' => 'Да',
        '0' => 'Нет'
    ];
@endphp

<div class="card">
    <div class="card-header">
        Базовые параметры
    </div>
    <form action="{{ route('admin.property.update-base', $property->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @include('admin::components.input_group', [
                         'type' => 'text',
                         'name' => 'floors',
                         'required' => true,
                         'label' => 'Этажность',
                         'defaultValue' => $property->floors,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'ceiling',
                         'required' => false,
                         'label' => 'Потолок',
                         'defaultValue' => $property->ceiling,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'room_count',
                         'required' => true,
                         'label' => 'Количество Комнат',
                         'defaultValue' => $property->room_count,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'bedroom_count',
                         'required' => true,
                         'label' => 'Количество Спален',
                         'defaultValue' => $property->bedroom_count,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'bathroom_count',
                         'required' => true,
                         'label' => 'Количество Ванных',
                         'defaultValue' => $property->bathroom_count,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'wc_count',
                         'required' => true,
                         'label' => 'Количество Туалетов',
                         'defaultValue' => $property->wc_count,
                    ])

                </div>

                <div class="col-md-6">
                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'living_room_area_count',
                         'required' => true,
                         'label' => 'Гостинная Зона',
                         'defaultValue' => $property->living_room_area_count,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'kitchen_area_count',
                         'required' => true,
                         'label' => 'Кухонная Зона',
                         'defaultValue' => $property->kitchen_area_count,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'number',
                         'name' => 'terrace_balcony_count',
                         'required' => true,
                         'label' => 'Терраса/Балкон',
                         'defaultValue' => $property->terrace_balcony_count,
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'select',
                         'name' => 'rest_area',
                         'required' => true,
                         'label' => 'Зоны Отдыха',
                         'items' => $simpleSelectItems,
                         'defaultValue' => $property->rest_area,
                         'defaultPlaceholderValue' => 'Наличие',
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'select',
                         'name' => 'sports_infrastructure',
                         'required' => true,
                         'label' => 'Спортивная Инфраструктура',
                         'items' => $simpleSelectItems,
                         'defaultValue' => $property->sports_infrastructure,
                         'defaultPlaceholderValue' => 'Наличие',
                    ])

                    @include('admin::components.input_group', [
                         'type' => 'select',
                         'name' => 'parking',
                         'required' => true,
                         'label' => 'Паркинг Для Авто',
                         'items' => $simpleSelectItems,
                         'defaultValue' => $property->parking,
                         'defaultPlaceholderValue' => 'Наличие',
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




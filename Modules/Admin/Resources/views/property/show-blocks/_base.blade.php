<div class="card">
    <div class="card-header">
        Базовые параметры
    </div>
    <div class="card-body">
        <div class="mb-2">
            <b> <i class="far fa-building mr-1 text-info"></i> Этажность объекта: </b>
            {{ $property->floors }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-border-all mr-1 text-info"></i> Потолок: </b>
            {{ $property->ceiling }}
        </div>

        <div class="mb-2">
            <b> <i class="far fa-clone mr-1 text-info"></i> Количество Комнат: </b>
            {{ $property->room_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-bed mr-1 text-info"></i> Количество Спален: </b>
            {{ $property->bedroom_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-bath mr-1 text-info"></i> Количество Ванных: </b>
            {{ $property->bathroom_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-toilet mr-1 text-info"></i> Количество Туалетов: </b>
            {{ $property->wc_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-couch mr-1 text-info"></i> Гостиная Зона: </b>
            {{ $property->living_room_area_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-utensils mr-1 text-info"></i> Кухонная Зона: </b>
            {{ $property->kitchen_area_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-hotel mr-1 text-info"></i> Терраса / Балкон: </b>
            {{ $property->terrace_balcony_count }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-umbrella-beach mr-1 text-info"></i> Зоны Отдыха: </b>
            {{ $property->rest_area ? 'Да' : 'Нет' }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-dumbbell mr-1 text-info"></i> Спортивная Инфраструктура: </b>
            {{ $property->sports_infrastructure ? 'Да' : 'Нет' }}
        </div>

        <div class="mb-2">
            <b> <i class="fas fa-car mr-1 text-info"></i> Паркинг Для Авто: </b>
            {{ $property->parking ? 'Да' : 'Нет' }}
        </div>

    </div>
</div>


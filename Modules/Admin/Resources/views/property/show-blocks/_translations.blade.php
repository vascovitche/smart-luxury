<div class="card">
    <div class="card-header">
        Переводы
    </div>
    <div class="card-body">
        @foreach($property->translations as $translation)
            <div class="badge badge-info mb-3">
                {{ strtoupper($translation->pivot->language_code) }}
            </div>

            <div class="mb-2">
                <div class="text-info text-bold h7 mb-1">Заголовок</div>
                {{ $translation->pivot->title }}
            </div>

            <div class="mb-2">
                <div class="text-info text-bold h7 mb-1">Описание</div>
                {{ $translation->pivot->description }}
            </div>

            <div class="mb-4">
                <div class="text-info text-bold h7 mb-1">Особенности объекта</div>
                {{ $translation->pivot->features }}
            </div>

        @endforeach

    </div>
</div>


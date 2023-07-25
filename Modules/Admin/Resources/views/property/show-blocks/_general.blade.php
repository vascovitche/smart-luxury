<div class="card">
    <div class="card-header">
        Основаная Информация
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <b> <i class="far fa-list-alt mr-1 text-info"></i> Код: </b>
                    {{ $property->product_code }}
                </div>

                <div>
                    <b> <i class="fas fa-globe-europe mr-1 text-info"></i> Страна: </b>
                    {{ $property->country?->code }}
                </div>

                <div>
                    <b> <i class="fas fa-city mr-1 text-info"></i> Город: </b>
                    {{ $property->city?->code }}
                </div>

                <div>
                    <b> <i class="far fa-dot-circle mr-1 text-info"></i> Тип Объявления: </b>
                    {{ $property->ad_type }}
                </div>

                <div>
                    <b> <i class="fas fa-building mr-1 text-info"></i> Тип Недвижимости: </b>
                    {{ $property->property_type }}
                </div>

                <div>
                    <b> <i class="fas fa-star-half-alt mr-1 text-info"></i> Статус: </b>
                    @if ($property->published_at === null)
                        <span class="badge bg-light">Не опубликовано</span>
                    @else
                        <span class="badge badge-success">Опубликовано</span>
                    @endif
                </div>

                <div>
                    <b> <i class="fas fa-star-half-alt mr-1 text-info"></i> Продано/Сдано: </b>
                        <span class="badge badge-success">
                            {{ $property->implemented ? date('Y-m-d', strtotime($property->implemented)) : 'Нет' }}
                        </span>
                </div>
            </div>

            <div class="col-md-6">
                <div>
                    <b> <i class="fas fa-home mr-1 text-info"></i> Адрес: </b>
                    {{ $property->adress ?? '...' }}
                </div>

                <div>
                    <b> <i class="fas fa-hotel mr-1 text-info"></i> Жилой комплекс: </b>
                    {{ $property->residential_complex ?? '...' }}
                </div>

                <div>
                    <b> <i class="fas fa-clone mr-1 text-info"></i> Площадь: </b>
                    {{ $property->area }} кв.м
                </div>

                <div>
                    <b> <i class="fab fa-youtube mr-1 text-info"></i> Видео: </b>
                    <a href="{{ $property->video_link }}" target="_blank">ссылка</a>
                </div>

                <div>
                    <b> <i class="fas fa-money-bill mr-1 text-info"></i> Цена: </b>
                    {{ $property->price }} {{ $property->currency }}
                </div>

                <div>
                    <b> <i class="fas fa-percent mr-1 text-info"></i> Акционная цена: </b>
                    {{ $property->new_price ? $property->new_price . ' ' . $property->currency->value : 'Нет' }}
                </div>

            </div>
        </div>

    </div>
    <div class="card-footer">
        @include('admin::property.blocks._actions')
    </div>
</div>


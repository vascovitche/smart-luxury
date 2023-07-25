<div class="card">
    <div class="card-header">
        Фото
        <a class="btn btn-sm btn-primary d-inline-block ml-2"
           href="{{ route('admin.property.index-image', $property->id) }}">
            <i class="far fa-file-image mr-1"></i>
            Смотреть все фото
        </a>
    </div>
    <div class="card-body">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                @foreach($property->images as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ $image->getImageLink() }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                    data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                    data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
</div>

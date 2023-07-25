<div class="card">
    <div class="card-header">
        Локации
    </div>
    <div class="card-body">
        @foreach($locations as $location)
            <div class="d-inline-block bg-primary p-1 pr-2 pl-2 rounded mr-1 mb-2 ">
                {{ $location }}
            </div>
        @endforeach
    </div>
</div>

<div class="card">
    <div class="card-header">
        Лейбы
    </div>
    <div class="card-body">
        @foreach($labels as $label)
            <div class="d-inline-block bg-primary p-1 pr-2 pl-2 rounded mr-1 mb-2 ">
                {{ $label }}
            </div>
        @endforeach
    </div>
</div>

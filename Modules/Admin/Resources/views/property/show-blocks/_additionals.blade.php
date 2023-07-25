<div class="card">
    <div class="card-header">
        Дополнительно
    </div>
    <div class="card-body">
        @foreach($additionals as $additional)
            <div class="d-inline-block bg-primary p-1 pr-2 pl-2 rounded mr-1 mb-2 ">
                {{ $additional }}
            </div>
        @endforeach
    </div>
</div>

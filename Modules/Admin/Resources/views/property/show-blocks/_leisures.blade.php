<div class="card">
    <div class="card-header">
        Отдых и спорт
    </div>
    <div class="card-body">
        @foreach($leisures as $leisure)
            <div class="d-inline-block bg-primary p-1 pr-2 pl-2 rounded mr-1 mb-2 ">
                {{ $leisure }}
            </div>
        @endforeach
    </div>
</div>

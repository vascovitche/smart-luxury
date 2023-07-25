<div class="card">
    <div class="card-header">
        Инфраструктура
    </div>
    <div class="card-body">
        @foreach($infrastructures as $infrastructure)
            <div class="d-inline-block bg-primary p-1 pr-2 pl-2 rounded mr-1 mb-2 ">
                {{ $infrastructure }}
            </div>
        @endforeach
    </div>
</div>

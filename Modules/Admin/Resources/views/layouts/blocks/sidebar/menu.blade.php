<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <i class="fas fa-handshake nav-icon"></i>
                    <p>
                        Orders
                        @if($orderCount)
                            <span class="badge badge-info right">{{ $orderCount }}</span>
                        @endif
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.property.index') }}" class="nav-link">
                    <i class="fas fa-hotel nav-icon"></i>
                    <p>
                        Properties
                    </p>
                </a>
            </li>


            <li class="nav-header">DEV</li>

            @if(env('APP_ENV') == 'local')
                <li class="nav-item">
                    <a href="{{ route('alphacruds.crud-generator') }}" class="nav-link">
                        <i class="fas fa-robot nav-icon"></i>
                        <p>
                            CRUD
                        </p>
                    </a>
                </li>
            @endif

            <li class="nav-item ">
                <a href="{{ route('log.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-bug"></i>
                    <p>
                        Bugs Log
                    </p>
                </a>
            </li>

        </ul>

    </nav>
</div>

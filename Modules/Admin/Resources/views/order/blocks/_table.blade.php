<table class="table table-striped mb-4 table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th class="text-center">Phone</th>

        <th class="text-center">Email</th>
        <th class="text-center">Status</th>
        <th class="text-center">Date</th>

        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>
                {{ $order->name }}
            </td>

            <td class="text-center">{{ $order->phone_number ?? '...' }}</td>
            <td class="text-center">{{ $order->email ?? '...' }}</td>
            <td class="text-center">
                <span
                        class="badge {{ $order->status == \App\Enums\OrderStatus::DONE ? 'bg-success' : ($order->status == \App\Enums\OrderStatus::AT_WORK ? 'bg-warning' : 'bg-light') }}">
                    {{ $order->status->value }}
                </span>
            </td>

            <td class="text-center">{{ $order->created_at->format('M d, Y') }}</td>

            <td>
                @include('admin::order.blocks._actions')
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
<div class="pr-3 pl-3">{{ $orders->links() }}</div>

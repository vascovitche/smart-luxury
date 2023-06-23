<form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">

    @csrf
    @method('PUT')
    <div class="input-group">
        @include('admin::components.input_group', [
            'type' => 'select',
            'required' => true,
            'label' => false,
            'name' => 'status',
            'multiple' => false,
            'items' => \App\Enums\OrderStatus::forSelect(),
            'defaultValue' => $order->status->value,
        ])
        <div class="input-group-append">

            <button class="btn btn-primary" type="submit">
                <i class="fa fa-save"></i>
            </button>
        </div>
    </div>
</form>

<form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="POST">

    @csrf
    @method('DELETE')

    <button class="btn btn-danger" type="submit">
        <i class="fas fa-ban"></i>
    </button>

</form>

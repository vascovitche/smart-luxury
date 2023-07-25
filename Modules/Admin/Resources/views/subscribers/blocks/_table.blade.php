<table class="table table-striped mb-4 table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th class="text-center">Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subscribers as $subscriber)
        <tr>
            <td>
                {{ $subscriber->name }}
            </td>
            <td>{{ $subscriber->email ?? '...' }}</td>

            <td class="text-center">{{ $subscriber->created_at->format('M d, Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pr-3 pl-3">{{ $subscribers->links() }}</div>

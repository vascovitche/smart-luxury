@push('style')
    <style>
        img.preview {
            height: 36px;
            width: 36px;
            object-fit: cover;
        }
    </style>
@endpush

<table class="table table-striped mb-4 posts-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th class="text-center">Status</th>
        <th>Since</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                @if ($user->avatar)
                    <img class="preview img-circle elevation-2" src="{{ $user->getAvatarLink() }}" alt="User Avatar">
                @else
                    <img class="preview" src="https://e7.pngegg.com/pngimages/799/987/png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper-thumbnail.png" alt="User Avatar">
                @endif
            </td>

            <td>
                {{ $user->name }}
            </td>

            <td>
                {{ $user->email }}
            </td>

            <td class="text-center">
                @if ($user->email_verified_at === null)
                    <span class="badge bg-light">Not Verified</span>
                @else
                    <span class="badge badge-success">Verified</span>
                @endif
            </td>

            <td class="text-muted">
                {{ $user->created_at->format('M d, Y') }}
            </td>
{{--            <td class="td-title"><a class="post-title" href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title ?? '-' }}</a></td>--}}
{{--            <td class="text-muted">{{ $post->created_at->format('M d, Y') }}</td>--}}
{{--            <td>{{ $post->category->name ?? '' }}</td>--}}
{{--            <td class="text-center post-status">--}}
{{--                @if ($post->published_at === null)--}}
{{--                    <span class="badge bg-light">Not published</span>--}}
{{--                @else--}}
{{--                    <span class="badge badge-success">Published</span>--}}
{{--                @endif--}}
{{--            </td>--}}
            <td class="actions">
                @include('admin::users.blocks.actions')
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $users->withQueryString()->links() }}

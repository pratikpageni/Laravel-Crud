@extends('dashboard')

@section('content')
    <a href="{{ route('posts.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Post</a>

    <div class="overflow-x-auto mt-10">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border border-gray-300">Title</th>
                    <th class="py-2 px-4 border border-gray-300">Description</th>
                    <th class="py-2 px-4 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border border-gray-300">{{ $post->title }}</td>
                    <td class="py-2 px-4 border border-gray-300">{{ $post->description }}</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form> |
                        <a href="{{ route('posts.edit', $post) }}" class="text-green-500 hover:underline">Edit</a> |
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

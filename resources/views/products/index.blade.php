<!-- resources/views/products/index.blade.php -->
@extends('layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <a href="{{ route('products.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Product</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border border-gray-300">Name</th>
                    {{-- <th class="py-2 px-4 border border-gray-300">Description</th> --}}
                    <th class="py-2 px-4 border border-gray-300">Price</th>
                    {{-- <th class="py-2 px-4 border border-gray-300">Stock</th> --}}
                    <th class="py-2 px-4 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border border-gray-300">{{ $product->name }}</td>
                    {{-- <td class="py-2 px-4 border border-gray-300">{{ $product->description }}</td> --}}
                    <td class="py-2 px-4 border border-gray-300">{{ $product->price }}</td>
                    {{-- <td class="py-2 px-4 border border-gray-300">{{ $product->stock }}</td> --}}
                    <td class="py-2 px-4 border border-gray-300">
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form> |
                        <a href="{{ route('products.edit', $product) }}" class="text-green-500 hover:underline">Edit</a> |
                        <a href="{{ route('products.show', $product) }}" class="text-blue-500 hover:underline">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

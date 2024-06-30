@extends('layout')

@section('content')
    <div class="px-8 py-6">
        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <p class="text-gray-700 text-lg mb-4">{{ $product->description }}</p>
        <p class="text-gray-700 text-lg mb-4">Price: ${{ $product->price }}</p>
        <p class="text-gray-700 text-lg mb-4">Stock: {{ $product->stock }}</p>
        {{-- <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Edit</a> --}}
        <a href="{{ url()->previous() }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded inline-block">Back</a>
    </div>
@endsection

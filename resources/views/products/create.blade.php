@extends('layout')

@section('content')
<h1 class="text-2xl font-bold">{{ isset($product) ? 'Edit Product' : 'Create Product' }}</h1>


    {!! Form::model(isset($product)?$product:'',['route' => 'products.store']) !!}
    @isset($product)
    {!! Form::number('id', null, [ 'id' => 'id','hidden' ]) !!}     
    @endisset
        <div class="mb-3">
            {!! Form::label('name', 'Name:', ['class' => 'block text-gray-700 font-bold  ']) !!}
            {!! Form::text('name', null, ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'name', 'required']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('description', 'Description:', ['class' => 'block text-gray-700 font-bold  ']) !!}
            {!! Form::textarea('description', old('description'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'description']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('price', 'Price:', ['class' => 'block text-gray-700 font-bold  ']) !!}
            {!! Form::text('price', old('price'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'price', 'required']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('stock', 'Stock:', ['class' => 'block text-gray-700 font-bold ']) !!}
            {!! Form::text('stock', old('stock'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'stock']) !!}
        </div>
        <div class="mb-3">
            {!! Form::submit(isset($product) ? 'Update' : 'Create', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) !!}
        </div>
        
    {!! Form::close() !!}
@endsection

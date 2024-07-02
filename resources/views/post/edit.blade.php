@extends('dashboard')

@section('content')
    <h1 class="text-2xl font-bold">Edit Product</h1>


    {!! Form::model($post, [
        'route' => ['posts.update', $post->id],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
    ]) !!}

    <div class="mb-3">
        {!! Form::label('title', 'Title:', ['class' => 'block text-gray-700 font-bold  ']) !!}
        {!! Form::text('title', null, [
            'class' =>
                'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
            'required',
        ]) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('description', 'Description:', ['class' => 'block text-gray-700 font-bold  ']) !!}
        {!! Form::textarea('description', null, [
            'class' =>
                'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
            'id' => 'description',
        ]) !!}
    </div>
    <div class="mb-3">
        {!! Form::submit('Update', [
            'class' =>
                'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
        ]) !!}
    </div>

    {!! Form::close() !!}
@endsection

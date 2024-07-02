@extends('dashboard')

@section('content')
<h1 class="text-2xl font-bold">Create Product</h1>


    {!! Form::open(['route' => 'posts.store','method'=>'POST',"enctype" => "multipart/form-data"]) !!}
    {{-- {!! Form::open(['route' => $base_route.'.store', 'method' => 'POST', 'class' => 'form-horizontal',
                        'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!} --}}
   
        <div class="mb-3">
            {!! Form::label('title', 'Title:', ['class' => 'block text-gray-700 font-bold  ']) !!}
            {!! Form::text('title', null, ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'name', 'required']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('description', 'Description:', ['class' => 'block text-gray-700 font-bold  ']) !!}
            {!! Form::textarea('description', old('description'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'description']) !!}
        </div>
        <div class="mb-3">
            {!! Form::submit('Create', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) !!}
        </div>
        
    {!! Form::close() !!}
@endsection

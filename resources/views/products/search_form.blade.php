{!! Form::open(['route' => 'products.filter', 'method' => 'POST', 'class' => 'space-y-4']) !!}
<div class="flex space-x-4 ">
    <div class="flex flex-col">
        {!! Form::label('price', 'Price:', ['class' => 'block text-sm font-medium text-gray-700']) !!}
        {!! Form::number('price', $price?$price:null, ['placeholder' => 'eg:500','required', 'class' => 'mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm']) !!}
    </div>
    <div class="flex flex-col">
        {!! Form::label('category_id', 'Category:', ['class' => 'block text-sm font-medium text-gray-700']) !!}
        {!! Form::select('category_id', $categories, $categoryId?$categoryId:null, ['placeholder' => 'Choose a category', 'required', 'class' => 'mt-1 p-2 block w-[20rem]  border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm']) !!}
    </div>
    {!! Form::submit('Filter', [
            'class' =>
                'bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
        ]) !!}
</div>
{!! Form::close() !!}


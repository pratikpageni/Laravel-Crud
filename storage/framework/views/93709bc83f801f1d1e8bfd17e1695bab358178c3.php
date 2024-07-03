<?php echo Form::open(['route' => 'products.filter', 'method' => 'POST', 'class' => 'space-y-4']); ?>

<div class="flex space-x-4 ">
    <div class="flex flex-col">
        <?php echo Form::label('price', 'Price:', ['class' => 'block text-sm font-medium text-gray-700']); ?>

        <?php echo Form::number('price', $price?$price:null, ['placeholder' => 'eg:500','required', 'class' => 'mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm']); ?>

    </div>
    <div class="flex flex-col">
        <?php echo Form::label('category_id', 'Category:', ['class' => 'block text-sm font-medium text-gray-700']); ?>

        <?php echo Form::select('category_id', $categories, $categoryId?$categoryId:null, ['placeholder' => 'Choose a category', 'required', 'class' => 'mt-1 p-2 block w-[20rem]  border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm']); ?>

    </div>
    <?php echo Form::submit('Filter', [
            'class' =>
                'bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
        ]); ?>

</div>
<?php echo Form::close(); ?>


<?php /**PATH C:\zPersonal\Project\Laravel-Crud\resources\views/products/search_form.blade.php ENDPATH**/ ?>
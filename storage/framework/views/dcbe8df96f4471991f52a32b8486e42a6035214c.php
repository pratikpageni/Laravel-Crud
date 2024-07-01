

<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold">Edit Product</h1>


    <?php echo Form::model($product, [
        'route' => ['products.update', $product->id],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
    ]); ?>


    <div class="mb-3">
        <?php echo Form::label('name', 'Name:', ['class' => 'block text-gray-700 font-bold  ']); ?>

        <?php echo Form::text('name', null, [
            'class' =>
                'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
            'id' => 'name',
            'required',
        ]); ?>

    </div>
    <div class="mb-3">
        <?php echo Form::label('description', 'Description:', ['class' => 'block text-gray-700 font-bold  ']); ?>

        <?php echo Form::textarea('description', null, [
            'class' =>
                'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
            'id' => 'description',
        ]); ?>

    </div>
    <div class="mb-3">
        <?php echo Form::label('price', 'Price:', ['class' => 'block text-gray-700 font-bold  ']); ?>

        <?php echo Form::text('price', null, [
            'class' =>
                'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
            'id' => 'price',
            'required',
        ]); ?>

    </div>
    <div class="mb-3">
        <?php echo Form::label('stock', 'Stock:', ['class' => 'block text-gray-700 font-bold ']); ?>

        <?php echo Form::text('stock', null, [
            'class' =>
                'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
            'id' => 'stock',
        ]); ?>

    </div>
    <div class="mb-3">
        <?php echo Form::submit('Update', [
            'class' =>
                'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
        ]); ?>

    </div>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\zPersonal\Project\Laravel-Crud\resources\views/products/edit.blade.php ENDPATH**/ ?>
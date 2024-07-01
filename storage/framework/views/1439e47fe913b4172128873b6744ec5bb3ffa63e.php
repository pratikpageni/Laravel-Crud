

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold"><?php echo e(isset($product) ? 'Edit Product' : 'Create Product'); ?></h1>


    <?php echo Form::model(isset($product)?$product:'',['route' => 'products.store']); ?>

    <?php if(isset($product)): ?>
    <?php echo Form::number('id', null, [ 'id' => 'id','hidden' ]); ?>     
    <?php endif; ?>
        <div class="mb-3">
            <?php echo Form::label('name', 'Name:', ['class' => 'block text-gray-700 font-bold  ']); ?>

            <?php echo Form::text('name', null, ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'name', 'required']); ?>

        </div>
        <div class="mb-3">
            <?php echo Form::label('description', 'Description:', ['class' => 'block text-gray-700 font-bold  ']); ?>

            <?php echo Form::textarea('description', old('description'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'description']); ?>

        </div>
        <div class="mb-3">
            <?php echo Form::label('price', 'Price:', ['class' => 'block text-gray-700 font-bold  ']); ?>

            <?php echo Form::text('price', old('price'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'price', 'required']); ?>

        </div>
        <div class="mb-3">
            <?php echo Form::label('stock', 'Stock:', ['class' => 'block text-gray-700 font-bold ']); ?>

            <?php echo Form::text('stock', old('stock'), ['class' => 'shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'stock']); ?>

        </div>
        <div class="mb-3">
            <?php echo Form::submit(isset($product) ? 'Update' : 'Create', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']); ?>

        </div>
        
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\zPersonal\Project\Laravel-Crud\resources\views/products/create.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
    <div class="px-8 py-6">
        <h1 class="text-3xl font-bold mb-4"><?php echo e($product->name); ?></h1>
        <p class="text-gray-700 text-lg mb-4"><?php echo e($product->description); ?></p>
        <p class="text-gray-700 text-lg mb-4">Price: $<?php echo e($product->price); ?></p>
        <p class="text-gray-700 text-lg mb-4">Stock: <?php echo e($product->stock); ?></p>
        
        <a href="<?php echo e(url()->previous()); ?>" class="bg-green-500 text-white font-bold py-2 px-4 rounded inline-block">Back</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\zPersonal\Project\Laravel-Crud\resources\views/products/show.blade.php ENDPATH**/ ?>
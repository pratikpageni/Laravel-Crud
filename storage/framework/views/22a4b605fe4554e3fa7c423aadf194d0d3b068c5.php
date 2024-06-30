<!-- resources/views/products/index.blade.php -->


<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <a href="<?php echo e(route('products.create')); ?>"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Product</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border border-gray-300">Name</th>
                    
                    <th class="py-2 px-4 border border-gray-300">Price</th>
                    
                    <th class="py-2 px-4 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border border-gray-300"><?php echo e($product->name); ?></td>
                    
                    <td class="py-2 px-4 border border-gray-300"><?php echo e($product->price); ?></td>
                    
                    <td class="py-2 px-4 border border-gray-300">
                        <a href="<?php echo e(route('products.destroy', $product)); ?>" class="text-red-500 hover:underline">Delete</a> |
                        <a href="<?php echo e(route('products.edit', $product)); ?>" class="text-green-500 hover:underline">Edit</a> |
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="text-blue-500 hover:underline">Show</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\zPersonal\Project\Laravel-Crud\resources\views/products/index.blade.php ENDPATH**/ ?>
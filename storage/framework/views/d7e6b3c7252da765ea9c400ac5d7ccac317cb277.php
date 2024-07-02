

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('posts.create')); ?>"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Post</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border border-gray-300">Title</th>
                    <th class="py-2 px-4 border border-gray-300">Description</th>
                    <th class="py-2 px-4 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border border-gray-300"><?php echo e($post->title); ?></td>
                    <td class="py-2 px-4 border border-gray-300"><?php echo e($post->description); ?></td>
                    <td class="py-2 px-4 border border-gray-300">
                        <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form> |
                        <a href="<?php echo e(route('posts.edit', $post)); ?>" class="text-green-500 hover:underline">Edit</a> |
                        <a href="<?php echo e(route('posts.show', $post)); ?>" class="text-blue-500 hover:underline">Show</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\zPersonal\Project\Laravel-Crud\resources\views/post/index.blade.php ENDPATH**/ ?>
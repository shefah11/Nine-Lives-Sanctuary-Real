

<?php $__env->startSection('title', 'Adoption Gallery'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="hero">
        <h1>🐱 Meet Our Cats</h1>
        <p>Find your perfect feline companion!</p>
    </div>
    
    <div class="grid-3">
        <?php $__currentLoopData = $allCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <img src="<?php echo e($cat['images'][0]); ?>" alt="<?php echo e($cat['name']); ?>" style="width: 100%; height: 200px; object-fit: cover;">
            <div class="card-content">
                <h3 class="card-title"><?php echo e($cat['name']); ?></h3>
                <p class="card-text"><?php echo e($cat['short_desc']); ?></p>
                <a href="/cats/<?php echo e($id); ?>" class="btn btn-primary">View Details</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\nine-lives-sanctuary\resources\views/gallery.blade.php ENDPATH**/ ?>
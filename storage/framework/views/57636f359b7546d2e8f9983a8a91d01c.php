

<?php $__env->startSection('title', 'Healthcare Guide'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Hero section -->
    <div class="hero-bg">
        <div class="hero-overlay">
            <h1>🐱 Cat Healthcare Guide</h1>
            <p>Learn how to keep your feline friend healthy and happy</p>
        </div>
    </div>
    
    <div class="grid-3">
        <?php $__currentLoopData = $healths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $health): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <?php if($health->image_url): ?>
                <img src="<?php echo e($health->image_url); ?>" alt="<?php echo e($health->title); ?>">
            <?php else: ?>
                <img src="https://placekitten.com/400/200" alt="Cat">
            <?php endif; ?>
            <div class="card-content">
                <h3 class="card-title"><?php echo e($health->title); ?></h3>
                <p class="card-text"><?php echo e(Str::limit($health->content, 100)); ?></p>
                <a href="/health/<?php echo e($health->id); ?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <?php if($healths->isEmpty()): ?>
        <p style="text-align: center; padding: 50px;">No healthcare guides available yet. Check back soon!</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\nine-lives-sanctuary\resources\views/health/index.blade.php ENDPATH**/ ?>
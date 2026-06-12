

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div style="max-width: 400px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h1 style="text-align: center; margin-bottom: 30px; color: #4A3B32;">Welcome Back!</h1>
        <p style="text-align: center; color: #6B5B4F; margin-bottom: 20px;">Log in to track your rescue & adoption journey.</p>

        <?php if($errors->any()): ?>
            <div style="background: #F8D7DA; color: #721C24; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="margin: 0;"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div style="background: #D4EDDA; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In 🐾</button>
        </form>

        <p style="text-align: center; margin-top: 20px;">
            Don't have an account? <a href="<?php echo e(route('register')); ?>" style="color: #E8A35E;">Register here</a>
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\nine-lives-sanctuary\resources\views/auth/login.blade.php ENDPATH**/ ?>
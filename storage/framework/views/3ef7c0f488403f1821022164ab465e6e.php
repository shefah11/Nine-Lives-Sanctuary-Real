

<?php $__env->startSection('title', 'My Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div style="max-width: 800px; margin: 50px auto;">
        
        <?php if(session('success')): ?>
            <div style="background: #D4EDDA; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div style="background: white; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); overflow: hidden;">
            
            <!-- Profile Header -->
            <div style="background: linear-gradient(135deg, #E8A35E 0%, #D4914A 100%); padding: 30px; color: white; text-align: center;">
                <div style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid white; overflow: hidden; background: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-size: 3rem; margin: 0 auto 15px;">
                    <?php if($user->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        🐱
                    <?php endif; ?>
                </div>
                <h1 style="font-size: 1.8rem; margin-bottom: 5px;"><?php echo e($user->name); ?></h1>
                <p style="opacity: 0.9;"><?php echo e($user->email); ?></p>
                <!-- <span style="display: inline-block; background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 30px; font-size: 0.8rem; margin-top: 10px;">
                    Role: <?php echo e($user->role); ?>

                </span> -->
            </div>

            <!-- Profile Form -->
            <form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data" style="padding: 30px;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <h3 style="font-size: 1.2rem; font-weight: 600; color: #4A3B32; border-bottom: 2px solid #F0E8DF; padding-bottom: 10px; margin-bottom: 20px;">
                    Account Management Details
                </h3>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    
                    <div class="form-group">
                        <label>Display Name</label>
                        <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Mahallah Residence Group</label>
                        <input type="text" name="mahallah" value="<?php echo e(old('mahallah', $user->mahallah)); ?>">
                    </div>

                    <div class="form-group">
                        <label>Contact Phone Number</label>
                        <input type="text" name="phone_number" value="<?php echo e(old('phone_number', $user->phone_number)); ?>">
                    </div>

                    <div class="form-group">
                        <label>Update Profile Image Avatar</label>
                        <input type="file" name="profile_picture" style="padding: 10px 0;">
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Save Changes Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\nine-lives-sanctuary\resources\views/user/profile.blade.php ENDPATH**/ ?>
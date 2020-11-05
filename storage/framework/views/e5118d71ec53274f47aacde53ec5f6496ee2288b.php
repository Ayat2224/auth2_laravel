
<?php $__env->startSection('title','Edit Category'); ?>
<?php $__env->startSection('content'); ?>
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <?php if(session('sucessMSG')): ?>
            <div class="alert alert-success">
                <?php echo e(session('sucessMSG')); ?>

            </div>
          <?php endif; ?>


         


        	<form action="<?php echo e(url('admin/categories')); ?>/<?php echo e($objCategory->id); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>                

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name"  placeholder="Enter name" value="<?php echo e($objCategory->name); ?>">

                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                   
                </div>
            
                
             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/categories/edit.blade.php ENDPATH**/ ?>
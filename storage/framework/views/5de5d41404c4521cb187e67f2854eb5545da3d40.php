
<?php $__env->startSection('title','Show SubCategory'); ?>
<?php $__env->startSection('content'); ?>
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            <?php if(session('sucessMSG')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('sucessMSG')); ?>

                </div>
            <?php endif; ?>
 
             
            <form action="<?php echo e(url('admin/subcategories')); ?>/<?php echo e($categorie_id); ?>" method="post">
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
unset($__errorArgs, $__bag); ?>" id="name" name="name">
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
                 <input type="hidden" name="categorie_id" value="<?php echo e($categorie_id); ?>">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>


            <h2>SubCategories</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>

                    </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $arrSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($objSubCategory->id); ?></td>
                        <td><?php echo e($objSubCategory->name); ?></td>
                        <td>
                            
                            <form action="<?php echo e(url('admin/subcategories')); ?>/<?php echo e($objSubCategory->id); ?>" method="post" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                            </form>
                        </td>
                        
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
 
                  </tbody>
                </table>
            </div>
        </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/categories/subcategories.blade.php ENDPATH**/ ?>
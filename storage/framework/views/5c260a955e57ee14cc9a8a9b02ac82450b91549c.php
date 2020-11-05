
<?php $__env->startSection('title','Show Event Photos'); ?>
<?php $__env->startSection('content'); ?>
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            <?php if(session('sucessMSG')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('sucessMSG')); ?>

                </div>
            <?php endif; ?>
 
             
            <form action="<?php echo e(url('admin/eventphotos')); ?>/<?php echo e($event_id); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="price">Type</label>
                    
                    <select class="form-control" name="type">
                        <option value="slider">Slider</option>
                        <option value="photo_galary">Photo Galary</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Image</label>
                    <input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image" name="image">
                    <?php $__errorArgs = ['image'];
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


            <h2>Photos</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $arrEventPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objEventPhoto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($objEventPhoto->id); ?></td>
                        <td><img style="width: 100px;height: 100px;" src="<?php echo e(url('')); ?>/<?php echo e($objEventPhoto->photo); ?>"></td>
                        <td><?php echo e($objEventPhoto->type); ?></td>
                        <td>
                            
                            <form action="<?php echo e(url('admin/eventphotos')); ?>/<?php echo e($objEventPhoto->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/events/event_photos.blade.php ENDPATH**/ ?>



<?php $__env->startSection('title','Show Features'); ?>
<?php $__env->startSection('content'); ?>
 

 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

 

            <?php if(session('sucessMSG')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('sucessMSG')); ?>

                </div>
              <?php endif; ?>

 

            <a href="<?php echo e(url('admin/features/create')); ?>" class="btn btn-primary">Add Feature</a>
             
              <h2>Features</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Icon</th>
                          <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    <?php $__currentLoopData = $arrFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objFeatures): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                          <td><?php echo e($objFeatures->id); ?></td>
                          <td><?php echo e($objFeatures->title); ?></td>
                          <td><?php echo e($objFeatures->description); ?></td>
                          <td><?php echo e($objFeatures->Icon); ?></td>
                          
                          
                          <td>
                              <a class="btn btn-primary" href="<?php echo e(url('admin/features/')); ?>/<?php echo e($objFeatures->id); ?>/edit"> Edit </a><br>
                              <a class="btn btn-secondary" href="<?php echo e(url('admin/features/')); ?>/<?php echo e($objFeatures->id); ?>"> Show </a><br>
                              <form action="<?php echo e(url('admin/features')); ?>/<?php echo e($objFeatures->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/features/index.blade.php ENDPATH**/ ?>
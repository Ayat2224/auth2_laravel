


<?php $__env->startSection('title','Show Teachers'); ?>
<?php $__env->startSection('content'); ?>
 

 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

 

            <?php if(session('sucessMSG')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('sucessMSG')); ?>

                </div>
              <?php endif; ?>

 

            <a href="<?php echo e(url('admin/teachers/create')); ?>" class="btn btn-primary">Add Teacher</a>
             
              <h2>Teachers</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Address</th>
                          <th>Image</th>
                          <th>Facebook</th>
                          <th>Twitter</th>
                          <th>Linkedin</th>
                          <th>Skype</th>
                          <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    <?php $__currentLoopData = $arrTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                          <td><?php echo e($objTeacher->id); ?></td>
                          <td><?php echo e($objTeacher->name); ?></td>
                          <td><?php echo e($objTeacher->position); ?></td>
                          <td><?php echo e($objTeacher->address); ?></td>
                          <td><img style="width: 100px;height: 100px;" src="<?php echo e(url('')); ?>/<?php echo e($objTeacher->image); ?>"></td>                     
                          <td><?php echo e($objTeacher->facebook); ?></td>
                          <td><?php echo e($objTeacher->twitter); ?></td>
                          <td><?php echo e($objTeacher->linkedin); ?></td>
                          <td><?php echo e($objTeacher->skype); ?></td>

                          <td>
                              <a class="btn btn-primary" href="<?php echo e(url('admin/teachers/')); ?>/<?php echo e($objTeacher->id); ?>/edit"> Edit </a><br>
                              <a class="btn btn-secondary" href="<?php echo e(url('admin/teachers/')); ?>/<?php echo e($objTeacher->id); ?>"> Show </a><br>
                              <form action="<?php echo e(url('admin/teachers')); ?>/<?php echo e($objTeacher->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/teachers/index.blade.php ENDPATH**/ ?>
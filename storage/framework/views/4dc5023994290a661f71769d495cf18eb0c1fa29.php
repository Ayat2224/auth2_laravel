
<?php $__env->startSection('title','Show Courses'); ?>
<?php $__env->startSection('content'); ?>
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	<?php if(session('sucessMSG')): ?>
	            <div class="alert alert-success">
	                <?php echo e(session('sucessMSG')); ?>

	            </div>
          	<?php endif; ?>

        	<a href="<?php echo e(url('admin/courses/create')); ?>" class="btn btn-primary">Add Course +</a>
        	 
          	<h2>Courses</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Course Name</th>
	                  	<th>Course Price</th>
	                  	<th>Course Description</th>
	                  	<th>Course Image</th>
	                  	<th>Topics</th>
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                <?php $__currentLoopData = $arrCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <tr>
	                  	<td><?php echo e($objCourse->id); ?></td>
	                  	<td><?php echo e($objCourse->name); ?></td>
	                  	<td><?php echo e($objCourse->price); ?></td>
	                  	<td><?php echo e($objCourse->description); ?></td>
	                  	<td><img style="width: 100px;height: 100px;" src="<?php echo e(url('')); ?>/<?php echo e($objCourse->image); ?>"></td>
	                  	<td><a class="btn btn-primary" href="<?php echo e(url('admin/coursetopics')); ?>/<?php echo e($objCourse->id); ?>"> Topics </a></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="<?php echo e(url('admin/courses/')); ?>/<?php echo e($objCourse->id); ?>/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="<?php echo e(url('admin/courses/')); ?>/<?php echo e($objCourse->id); ?>"> Show </a>
	                  		<form action="<?php echo e(url('admin/courses')); ?>/<?php echo e($objCourse->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/courses/index.blade.php ENDPATH**/ ?>
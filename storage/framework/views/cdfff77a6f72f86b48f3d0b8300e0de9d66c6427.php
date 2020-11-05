
<?php $__env->startSection('title','Show Speakers'); ?>
<?php $__env->startSection('content'); ?>
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	<?php if(session('sucessMSG')): ?>
	            <div class="alert alert-success">
	                <?php echo e(session('sucessMSG')); ?>

	            </div>
          	<?php endif; ?>

        	<a href="<?php echo e(url('admin/speakers/create')); ?>" class="btn btn-primary">Add Speaker +</a>
        	 
          	<h2>Speakers</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Name</th>
	                  	<th>Position</th>
	                   	<th>Events</th>
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                <?php $__currentLoopData = $arrspeakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objSpeaker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <tr>
	                  	<td><?php echo e($objSpeaker->id); ?></td>
	                  	<td><?php echo e($objSpeaker->name); ?></td>
	                  	<td><?php echo e($objSpeaker->position); ?></td>
						<td><a class="btn btn-primary" href="<?php echo e(url('admin/eventsspeakers')); ?>/<?php echo e($objSpeaker->id); ?>"> Events </a></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="<?php echo e(url('admin/speakers/')); ?>/<?php echo e($objSpeaker->id); ?>/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="<?php echo e(url('admin/speakers/')); ?>/<?php echo e($objSpeaker->id); ?>"> Show </a>
	                  		<form action="<?php echo e(url('admin/speakers')); ?>/<?php echo e($objSpeaker->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/speakers/index.blade.php ENDPATH**/ ?>
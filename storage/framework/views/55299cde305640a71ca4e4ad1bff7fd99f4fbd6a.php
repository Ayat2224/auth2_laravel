
<?php $__env->startSection('title','Show Events'); ?>
<?php $__env->startSection('content'); ?>
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	<?php if(session('sucessMSG')): ?>
	            <div class="alert alert-success">
	                <?php echo e(session('sucessMSG')); ?>

	            </div>
          	<?php endif; ?>

        	<a href="<?php echo e(url('admin/events/create')); ?>" class="btn btn-primary">Add Event +</a>
        	 
          	<h2>Events</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>topics</th>
	                  	<th>description</th>
	                  	<th>source_title</th>
	                  	<th>source_title_writer</th>
	                  	<th>host</th>
	                  	<th>location</th>
	                  	<th>website</th>
	                  	<th>start_date</th>
	                    <th>end_date</th>
	                   	<th>Speakers</th>
	                   	<th>Registrations</th>
	                   	<th>Photos</th>
	                    <th>Actions</th>

	                </tr>
	              </thead>
	              <tbody>
	                 
	                <?php $__currentLoopData = $arrevents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <tr>
	                  	<td><?php echo e($objEvent->id); ?></td>
	                  	<td><?php echo e($objEvent->topic); ?></td>
	                  	<td><?php echo e($objEvent->description); ?></td>
	                  	<td><?php echo e($objEvent->source_title); ?></td>
	                  	<td><?php echo e($objEvent->source_title_writer); ?></td>
	                  	<td><?php echo e($objEvent->host); ?></td>
	                  	<td><?php echo e($objEvent->location); ?></td>
	                  	<td><?php echo e($objEvent->website); ?></td>
	                  	<td><?php echo e($objEvent->start_date); ?></td>
	                  	<td><?php echo e($objEvent->end_date); ?></td>
	                  	<td><a class="btn btn-primary" href="<?php echo e(url('admin/eventspeakers')); ?>/<?php echo e($objEvent->id); ?>"> Speakers </a></td>
	                  	<td><a class="btn btn-secondary" href="<?php echo e(url('admin/eventregistrations')); ?>/<?php echo e($objEvent->id); ?>"> Registrations </a></td>
	                  	<td><a class="btn btn-primary" href="<?php echo e(url('admin/eventphotos')); ?>/<?php echo e($objEvent->id); ?>"> Photos </a></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="<?php echo e(url('admin/events/')); ?>/<?php echo e($objEvent->id); ?>/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="<?php echo e(url('admin/events/')); ?>/<?php echo e($objEvent->id); ?>"> Show </a>
	                  		<form action="<?php echo e(url('admin/events')); ?>/<?php echo e($objEvent->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/events/index.blade.php ENDPATH**/ ?>
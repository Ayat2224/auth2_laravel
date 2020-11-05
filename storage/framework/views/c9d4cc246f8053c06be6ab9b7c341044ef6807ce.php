
<?php $__env->startSection('title','Home'); ?>  
<?php $__env->startSection('content'); ?>
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Event Grid 4column</h3>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-gray-silver">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Upcoming Events -->
    <section id="upcoming-events" class="divider parallax layer-overlay overlay-white-8" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pb-50 pt-80">
        <div class="section-content">
          <div class="row">
            
            <?php $__currentLoopData = $arrEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="schedule-box maxwidth500 bg-light mb-30">
                  <div class="thumb">
                    
                    <?php if(isset($objEvent->Photo->photo)): ?>
                    <img style="height: 160px;" class="img-fullwidth" alt="" src="<?php echo e($objEvent->Photo->photo); ?>">
                    <?php else: ?>
                      <img style="height: 160px;" class="img-fullwidth" alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png">
                    <?php endif; ?>


                    <div class="overlay">
                      <a href="<?php echo e(url('event_details')); ?>/<?php echo e($objEvent->id); ?>"><i class="fa fa-calendar mr-5"></i></a>
                    </div>
                  </div>
                  <div class="schedule-details clearfix p-15 pt-10">
                    <h5 class="font-16 title"><a href="<?php echo e(url('event_details')); ?>/<?php echo e($objEvent->id); ?>"><?php echo e($objEvent->topics); ?></a></h5>
                    <ul class="list-inline font-11 mb-20">
                      <li><i class="fa fa-calendar mr-5"></i> <?php echo e($objEvent->start_date); ?></li>
                      <li><i class="fa fa-map-marker mr-5"></i> <?php echo e($objEvent->location); ?></li>
                    </ul>
                    <p><?php echo e($objEvent->description); ?></p>
                    <div class="mt-10">
                     <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">Register</a>
                     <a href="<?php echo e(url('event_details')); ?>/<?php echo e($objEvent->id); ?>" class="btn btn-dark btn-sm mt-10">Details</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app_front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/frontend/events.blade.php ENDPATH**/ ?>
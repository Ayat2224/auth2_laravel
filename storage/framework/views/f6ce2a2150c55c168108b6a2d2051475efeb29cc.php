
<?php $__env->startSection('title','Show CourseTopics'); ?>
<?php $__env->startSection('content'); ?>
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            <?php if(session('sucessMSG')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('sucessMSG')); ?>

                </div>
            <?php endif; ?>
 
             
            <form action="<?php echo e(url('admin/coursetopics')); ?>/<?php echo e($course_id); ?>" method="post">
                <?php echo csrf_field(); ?>


                <div class="form-group">
                    <label for="topic_name">Topic Name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['topic_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="topic_name" name="topic_name">
                    <?php $__errorArgs = ['topic_name'];
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
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="duration" name="duration">
                    <?php $__errorArgs = ['duration'];
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
                <input type="hidden" name="course_id" value="<?php echo e($course_id); ?>">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>


            <h2>Course Topics</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic Name</th>
                        <th>Duration</th> 
                    </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $arrCourseTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objCourseTopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($objCourseTopic->id); ?></td>
                        <td><?php echo e($objCourseTopic->topic_name); ?></td>
                        <td><?php echo e($objCourseTopic->duration); ?></td>
                        <td>
                            
                            <form action="<?php echo e(url('admin/subcategories')); ?>/<?php echo e($objCourseTopic->id); ?>" method="post" enctype="multipart/form-data">
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
<?php echo $__env->make('layouts.app_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/backend/courses/coursetopics.blade.php ENDPATH**/ ?>
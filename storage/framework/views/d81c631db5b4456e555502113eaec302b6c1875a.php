
<?php $__env->startSection('title','Home'); ?>  
<?php $__env->startSection('content'); ?>
  <!-- Start main-content -->
  <div class="main-content">

    

    <?php echo $__env->make('frontend.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    


    <!-- Divider: Call To Action -->
    <section class="bg-theme-colored">
      <div class="container pt-10 pb-20">
        <div class="row">
          <div class="call-to-action">
            <?php if(session('sucessMSG')): ?>
            <div class="alert alert-success">
                <?php echo e(session('sucessMSG')); ?>

            </div>
          <?php endif; ?>
            <!-- Reservation Form Start-->
            <form id="reservation_formm" name="reservation_form" class="reservation-form mb-0" method="post" action="<?php echo e(url('register')); ?>">
              <?php echo csrf_field(); ?>
              <div class="col-md-12">
                <h3 class="text-white mt-0 mb-10">Get A Free<span class="text-theme-color-2"> Registration</span>!</h3>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group mb-15">
                  <input name="email" class="form-control required email <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" placeholder="Enter Email">
                </div>
                <?php $__errorArgs = ['email'];
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
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group mb-15">
                  <div class="styled-select">
                    <select id="course_id" name="course_id" class="form-control" required="">
                      <option value="">- Select Courses -</option>
                      
                      <?php $__currentLoopData = $arrCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($objCourse->id); ?>"><?php echo e($objCourse->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    
                    </select>
                  </div>
                </div>
                <?php $__errorArgs = ['course_id'];
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
              <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="form-group mb-15">
                  <input placeholder="Phone" type="text" id="phone" name="phone" class="form-control" required="">
                </div>
                <?php $__errorArgs = ['phone'];
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
              <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="form-group mb-15">
                  <input name="dateofbirth" class="form-control required date-picker" type="text" placeholder="Date Of Birth" aria-required="true">
                </div>
                <?php $__errorArgs = ['dateofbirth'];
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
              <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="form-group mb-15 mt-0">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" class="btn btn-default btn-lg btn-flat border-left-theme-color-2-4px form-control" data-loading-text="Please wait...">Submit Now</button>
                </div>
              </div>
            </form>
            <!-- Reservation Form End-->

            <!-- Reservation Form Validation Start-->
            <script type="text/javascript">
              $("#reservation_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
            <!-- Reservation Form Validation Start -->
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About  -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20 ">
              <h2 class="line-bottom font-20 text-theme-colored text-uppercase mb-10 mt-0">Welcome to Our<span class="text-theme-color-2"> University</span></h2>
              <p class="lead font-18">We care for children, protect their welfare, and prepare them for the future</p>
              <p>Lorem ipsum dolor sit ametes redum, consectetur adipisicing elites. Istees recusandae laboriosam, voluptatibus culpa quas sint, deleniti delectus tempora. adipisicing elites. Istees recusandae laboriosam</p>
              <a class="btn btn-colored btn-theme-colored btn-sm" href="#">View Details</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="image-box-thum">
                <img class="img-fullwidth" alt="" src="http://placehold.it/255x170">
              </div>
              <div class="image-box-details pt-20 pb-sm-20">
                <h4 class="title text-uppercase line-bottom mt-0">Experience Yourself</h4>
                <p class="desc mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsa ullam dicta suscipit.</p>
                <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 pb-sm-20">
              <div class="image-box-thum">
                <img class="img-fullwidth" alt="" src="http://placehold.it/255x170">
              </div>
              <div class="image-box-details pt-20 pb-sm-20">
                <h4 class="title text-uppercase line-bottom mt-0">Online Learning</h4>
                <p class="desc mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsa ullam dicta suscipit.</p>
                <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="image-box-thum">
                <img class="img-fullwidth" alt="" src="http://placehold.it/255x170">
              </div>
              <div class="image-box-details pt-20 pb-sm-20">
                <h4 class="title text-uppercase line-bottom mt-0">Mastery Learning</h4>
                <p class="desc mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsa ullam dicta suscipit.</p>
                <a href="#" class="btn btn-xs btn-theme-colored">Read more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Features -->
     

  <!-- Section: Features -->
   
    <section id="features" class="bg-lighter">
      <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored font line-bottom line-height-1 mt-0 mb-0">Our <span class="text-theme-color-2 font-weight-400">Features</span></h2>
            </div>
          </div>
        </div>
       
        <div class="row mtli-row-clearfix">
           <?php $__currentLoopData = $arrFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objFeatures): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="icon-box iconbox-theme-colored bg-white p-15 mb-30 border-1px">
              <a class="icon icon-dark border-left-theme-color-2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                <i class="<?php echo e($objFeatures->icon); ?>"></i>
              </a>
              <div class="icon-box-details">
                <h4 class="icon-box-title font-16 font-weight-600 m-0 mb-5"><?php echo e($objFeatures->title); ?></h4>
                <p class="text-gray font-13 mb-0"><?php echo e($objFeatures->description); ?></p>
              </div>
            </div>    
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <!-- Section: COURSES -->
    <section class="">
      <div class="container pb-40">
        <div class="section-title">
        <div class="row">
          <div class="col-md-8">
            <h2 class="text-uppercase line-bottom line-height-1 mt-0 mb-0 ">Our <span class="text-theme-color-2 font-weight-400">COURSES</span></h2>
         </div>
        </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-4col">
                <?php $__currentLoopData = $arrCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item ">
                  <div class="service-block bg-lighter">
                    <div class="thumb"> <img  style="height: 160px;" alt="featured project" src="<?php echo e($objCourse->image); ?>" class="img-fullwidth">
                    <h4 class="text-white mt-0 mb-0"><span class="price"><?php echo e($objCourse->price); ?></span></h4>
                    </div>
                    <div class="content text-left flip p-25 pt-0">
                      <h4 class="line-bottom mb-10"><?php echo e($objCourse->name); ?></h4>
                      <p><?php echo e($objCourse->description); ?></p>
                     <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="<?php echo e(url('course_details')); ?>/<?php echo e($objCourse->id); ?>">view details</a>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Funfact -->
        <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="http://placehold.it/1920x1280" data-parallax-ratio="0.7">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo e(App\Models\Event::get()->count()); ?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Events</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo e(App\Models\Course::get()->count()); ?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Our Courses</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-users mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo e(App\Models\Teacher::get()->count()); ?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Our Teachers</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
            <div class="funfact text-center">
              <i class="pe-7s-cup mt-5 text-theme-color-2"></i>
              <h2 data-animation-duration="2000" data-value="<?php echo e(App\Models\Gallery::get()->count()); ?>" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
              <h5 class="text-white text-uppercase mb-0">Gallery</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Teachers -->
    <section id="Teachers">
      <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored title line-bottom line-height-1 mb-0">Our <span class="text-theme-color-2 font-weight-400">Teachers</span></h2>
            </div>
          </div>
        </div>
        <div class="row mtli-row-clearfix">
          <div class="col-md-12">
            <div class="owl-carousel-4col">
              
              <?php $__currentLoopData = $arrTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item">
                <div class="team-members maxwidth400">
                  <div class="team-thumb">
                    <img class="img-fullwidth" alt="" src="<?php echo e($objTeacher->image); ?>">
                  </div>
                  <div class="team-bottom-part border-bottom-theme-color-2-2px bg-lighter border-1px text-center p-10 pt-20 pb-10">
                    <h4 class="text-uppercase font-raleway font-weight-600 m-0"><a class="text-theme-color-2" href="page-teachers-details.html"> <?php echo e($objTeacher->name); ?></a></h4>
                    <h5 class="text-theme-color"><?php echo e($objTeacher->address); ?></h5>
                    <p class="mb-20"><?php echo e($objTeacher->position); ?></p>
                    <ul class="styled-icons icon-sm icon-dark icon-theme-colored">
                      <li><a href="#"><i class="<?php echo e($objTeacher->facebook); ?>"></i></a></li>
                      <li><a href="#"><i class="<?php echo e($objTeacher->twitter); ?>"></i></a></li>
                      <li><a href="#"><i class="<?php echo e($objTeacher->linkedin); ?>"></i></a></li>
                      <li><a href="#"><i class="<?php echo e($objTeacher->skype); ?>"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Gallery -->
    <section id="gallery" class="bg-lighter">
     <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored title line-bottom line-height-1 mt-0 mb-0">Our<span class="text-theme-color-2 font-weight-400"> Gllery</span></h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Works Filter -->
              <div class="portfolio-filter font-alt align-center">
                <a href="#" class="active" data-filter="*">All</a>
                <a href="#select1" class="" data-filter=".select1">Photos</a>
                <a href="#select2" class="" data-filter=".select2">Campus</a>
                <a href="#select3" class="" data-filter=".select3">Students</a>
              </div>
              <!-- End Works Filter -->
              
              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope grid-4 gutter clearfix">
                <!-- Portfolio Item Start -->
                <div class="gallery-item select1">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/1.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/1.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select1">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/2.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/2.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select2">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/3.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/3.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select3">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/4.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/4.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select1">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/5.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/5.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select3">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/6.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/6.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select2">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/7.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/7.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select3">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/8.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/8.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select1">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/9.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/9.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select2">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/10.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/10.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select1">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/11.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/11.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item select3">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/280x160" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="images/gallery/12.jpg"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="images/gallery/12.jpg">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
              </div>
              <!-- End Portfolio Gallery Grid -->
            </div>
          </div>
        </div>
      </div >
    </section>

    <!-- Section: Why Choose Us -->
    <section id="event" class="">
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-uppercase line-bottom mt-0 line-height-1"><i class="fa fa-calendar mr-10"></i>Upcoming <span class="text-theme-color-2">Events</span></h2>
              <?php $__currentLoopData = $arrEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb mr-10">
                    <?php if(isset($objEvent->Photo->photo)): ?>
                    <img style="height: 160px;width: 50px; "class="img-fullwidth" alt="" src="<?php echo e($objEvent->Photo->photo); ?>">
                    <?php else: ?>
                      <img style="height: 160px;width: 50px;" class="img-fullwidth" alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png">
                    <?php endif; ?>
                <div class="post-right">
                  <h4 class="mt-0 mb-5"><a href="<?php echo e(url('event_details')); ?>/<?php echo e($objEvent->id); ?>"><?php echo e($objEvent->topics); ?></a></h4>
                  <ul class="list-inline font-12 mb-5">
                    <li class="pr-0"><i class="fa fa-calendar mr-5"></i>  <?php echo e($objEvent->start_date); ?></li>
                    <li class="pl-5"><i class="fa fa-map-marker mr-5"></i><?php echo e($objEvent->location); ?></li>
                  </ul>
                  <p class="mb-0 font-13"><?php echo e($objEvent->description); ?></p>
                  <a class="text-theme-colored font-13" href="<?php echo e(url('event_details')); ?>/<?php echo e($objEvent->id); ?>">Read More →</a>
                </div>
              </article>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-6">
              <h2 class="line-bottom mt-0 line-height-1">Why <span class="text-theme-color-2">Choose Us?</span></h2>
              <p class="mb-10">The Cweren Law Firm is a recognized leader in landlord tenant representation throughout Texas.The largest professional property.</p>
              <div id="accordion1" class="panel-group accordion">
                <div class="panel">
                  <div class="panel-title"> <a class="active" data-parent="#accordion1" data-toggle="collapse" href="#accordion11" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion12" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion13" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion14" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
                <div class="panel">
                  <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion15" class="" aria-expanded="true"> <span class="open-sub"></span> Why this Company is Best?</a> </div>
                  <div id="accordion15" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                    <div class="panel-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore impedit quae repellendus provident dolor iure poss imusven am aliquam. Officiis totam ea laborum deser unt vonsess.  iure poss imusven am aliquam</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: testimonials -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-background-ratio="0.5" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pb-50">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6">
              <h5 class="font-weight-300 m-0 text-gray-lightgray">Happy Student</h5>
              <h2 class="mt-0 mb-0 text-uppercase line-bottom text-white font-28">Testimonials<span class="font-30 text-theme-color-2">.</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-10">
            <div class="owl-carousel-2col boxed" data-dots="true">
              <?php $__currentLoopData = $arrTestimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objTestimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="testimonial pt-10">
                    <div class="thumb pull-left mb-0 mr-0 pr-20">
                      <img width="75" class="img-circle" alt="" src="<?php echo e($objTestimonial->photo); ?>">
                    </div>
                    <div class="ml-100 ">
                      <h4 class="text-white mt-0"><?php echo e($objTestimonial->description); ?></h4>
                      <p class="author mt-20">- <span class="text-theme-color-2"><?php echo e($objTestimonial->name); ?>, </span> <small><em class="text-gray-lightgray"><?php echo e($objTestimonial->position); ?></em></small></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> 
          </div>
        </div>
      </div>
    </section>

    <!-- Section: blog -->
    <section id="blog">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase text-theme-colored title line-bottom line-height-1 mt-0">Latest <span class="text-theme-color-2 font-weight-400">News</span></h2>
              <div class="owl-carousel-3col owl-nav-top" data-nav="true">
              <div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="http://placehold.it/330x225" alt="" class="img-responsive img-fullwidth"> </div>
                    <div class="entry-meta meta-absolute text-center pl-15 pr-15">
                    <div class="display-table">
                      <div class="display-table-cell">
                        <ul>
                          <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up"></i> 265 <br> Likes</a></li>
                          <li class="mt-20"><a class="text-white" href="#"><i class="fa fa-comments-o"></i> 72 <br> comments</a></li>
                        </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="entry-content border-1px p-20">
                    <h5 class="entry-title mt-0 pt-0"><a href="#">The World Best University</a></h5>
                    <p class="text-left mb-20 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="#">Read more</a>
                    <ul class="list-inline entry-date pull-right font-12 mt-5">
                      <li><a class="text-theme-colored" href="#">Admin |</a></li>
                      <li><span class="text-theme-colored">Nov 13, 2015</span></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </article>
              </div>
              <div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="http://placehold.it/330x225" alt="" class="img-responsive img-fullwidth"> </div>
                    <div class="entry-meta meta-absolute text-center pl-15 pr-15">
                    <div class="display-table">
                      <div class="display-table-cell">
                        <ul>
                          <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up"></i> 265 <br> Likes</a></li>
                          <li class="mt-20"><a class="text-white" href="#"><i class="fa fa-comments-o"></i> 72 <br> comments</a></li>
                        </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="entry-content border-1px p-20">
                    <h5 class="entry-title mt-0 pt-0"><a href="#">The World Best University</a></h5>
                    <p class="text-left mb-20 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="#">Read more</a>
                    <ul class="list-inline entry-date pull-right font-12 mt-5">
                      <li><a class="text-theme-colored" href="#">Admin |</a></li>
                      <li><span class="text-theme-colored">Nov 13, 2015</span></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </article>
              </div>
              <div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="http://placehold.it/330x225" alt="" class="img-responsive img-fullwidth"> </div>
                    <div class="entry-meta meta-absolute text-center pl-15 pr-15">
                    <div class="display-table">
                      <div class="display-table-cell">
                        <ul>
                          <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up"></i> 265 <br> Likes</a></li>
                          <li class="mt-20"><a class="text-white" href="#"><i class="fa fa-comments-o"></i> 72 <br> comments</a></li>
                        </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="entry-content border-1px p-20">
                    <h5 class="entry-title mt-0 pt-0"><a href="#">The World Best University</a></h5>
                    <p class="text-left mb-20 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="#">Read more</a>
                    <ul class="list-inline entry-date pull-right font-12 mt-5">
                      <li><a class="text-theme-colored" href="#">Admin |</a></li>
                      <li><span class="text-theme-colored">Nov 13, 2015</span></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </article>
              </div>
              <div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="http://placehold.it/330x225" alt="" class="img-responsive img-fullwidth"> </div>
                    <div class="entry-meta meta-absolute text-center pl-15 pr-15">
                    <div class="display-table">
                      <div class="display-table-cell">
                        <ul>
                          <li><a class="text-white" href="#"><i class="fa fa-thumbs-o-up"></i> 265 <br> Likes</a></li>
                          <li class="mt-20"><a class="text-white" href="#"><i class="fa fa-comments-o"></i> 72 <br> comments</a></li>
                        </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="entry-content border-1px p-20">
                    <h5 class="entry-title mt-0 pt-0"><a href="#">The World Best University</a></h5>
                    <p class="text-left mb-20 mt-15 font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="#">Read more</a>
                    <ul class="list-inline entry-date pull-right font-12 mt-5">
                      <li><a class="text-theme-colored" href="#">Admin |</a></li>
                      <li><span class="text-theme-colored">Nov 13, 2015</span></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </article>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Call To Action -->
    <section class="bg-theme-color-2">
      <div class="container pt-10 pb-20">
        <div class="row">
          <div class="call-to-action">
            <div class="col-md-9">
              <h3 class="mt-5 text-white font-weight-600">Edupress The Best Education & University HTML Template Ever!</h3>
            </div>
            <div class="col-md-3 text-right flip sm-text-center"> 
              <a class="btn btn-flat btn-theme-colored btn-lg mt-5" href="#">Purchase Now<i class="fa fa-angle-double-right font-16 ml-10"></i></a>  
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  </div>
<?php $__env->stopSection(); ?> 


    
<?php echo $__env->make('layouts.app_front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/frontend/index.blade.php ENDPATH**/ ?>
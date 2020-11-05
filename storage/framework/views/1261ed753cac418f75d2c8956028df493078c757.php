
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Yat</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          

          <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>

                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.dropdown-link','data' => ['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']]); ?>
<?php $component->withName('jet-dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('logout')).'','onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']); ?>
                    <?php echo e(__('Logout')); ?>

                 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </form>


        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && Request::segment(2)=='dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('admin/dashboard')); ?>">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
               
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && Request::segment(2)=='courses') ? 'active' : ''); ?> " href="<?php echo e(url('admin/courses')); ?>">
                  <span data-feather="shopping-cart"></span>
                  Courses
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && Request::segment(2)=='sliders') ? 'active' : ''); ?> " href="<?php echo e(url('admin/sliders')); ?>">
                  <span data-feather="airplay"></span>
                  Sliders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && (Request::segment(2)=='events' || Request::segment(2)=='eventspeakers')  ) ? 'active' : ''); ?> " href="<?php echo e(url('admin/events')); ?>">
                  <span data-feather="airplay"></span>
                  Events
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && (Request::segment(2)=='speakers' || Request::segment(2)=='eventsspeakers')) ? 'active' : ''); ?> " href="<?php echo e(url('admin/speakers')); ?>">
                  <span data-feather="airplay"></span>
                  Speakers
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && Request::segment(2)=='testimonials') ? 'active' : ''); ?> " href="<?php echo e(url('admin/testimonials')); ?>">
                  <span data-feather="shopping-cart"></span>
                  Testimonials
                </a>
              </li>              
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' &&(Request::segment(2)=='categories'|| Request::segment(2)=='subcategories')  ) ? 'active' : ''); ?> " href="<?php echo e(url('admin/categories')); ?>">
                  <span data-feather="shopping-cart"></span>
                  Categories
                </a>
              </li>     
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' &&(Request::segment(2)=='news')  ) ? 'active' : ''); ?> " href="<?php echo e(url('admin/news')); ?>">
                  <span data-feather="shopping-cart"></span>
                  News
                </a>
              </li>   
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && Request::segment(2)=='features') ? 'active' : ''); ?> " href="<?php echo e(url('admin/features')); ?>">
                  <span data-feather="list"></span>
                  Features
                </a>
              </li>         
              <li class="nav-item">
                <a class="nav-link <?php echo e((Request::segment(1)=='admin' && Request::segment(2)=='teachers') ? 'active' : ''); ?> " href="<?php echo e(url('admin/teachers')); ?>">
                  <span data-feather="list"></span>
                  Teachers
                </a>
              </li>
            </ul>

             
             
          </div>
        </nav>

	<?php echo $__env->yieldContent('content'); ?>

	</div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <?php if(Request::segment(1)=='admin' && Request::segment(2)=='dashboard'): ?>
    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
    <?php endif; ?>


  </body>
</html>
<?php /**PATH D:\xampp\htdocs\laravel_auth\resources\views/layouts/app_admin.blade.php ENDPATH**/ ?>
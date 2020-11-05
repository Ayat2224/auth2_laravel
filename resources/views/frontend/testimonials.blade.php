@extends('layouts.app_front')
@section('title','Home')  
@section('content')
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

	            @foreach($arrTestimonials as $objTestimonial)
	              <div class="item">
	                <div class="testimonial pt-10">
	                  <div class="thumb pull-left mb-0 mr-0 pr-20">
	                    <img width="75" class="img-circle" alt="" src="{{ $objTestimonial->photo }}">
	                  </div>
	                  <div class="ml-100 ">
	                    <h4 class="text-white mt-0">{{$objTestimonial->description }}</h4>
	                    <p class="author mt-20">- <span class="text-theme-color-2">{{ $objTestimonial->name }}, </span> <small><em class="text-gray-lightgray">{{ $objTestimonial->position }}</em></small></p>
	                  </div>
	                </div>
	              </div>
	            @endforeach

            </div> 
          </div>
        </div>
      </div>
    </section>
@endsection 
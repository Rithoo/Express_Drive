@extends('layouts.apps')

@section('content')

@include('components.header')

@php
$img = asset('website/images/bg_1.jpg');
@endphp

<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{$img}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Fast &amp; To buy A Car</h1>
          <p style="font-size: 18px;">You And Your Drive</p>
          <!-- <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a> -->
        </div>
      </div>
    </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container ">
        <div class="row no-gutters ">
            <div class="col-md-12	featured-top">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <form action="/sale" class="request-form ftco-animate bg-primary">
                            <h2>make your choice</h2>
                            <div class="form-group">
                                <label for="" class="label">Marque</label>
                                <input type="text" class="form-control" placeholder="lamborghini">
                            </div>
                            <div class="form-group">
                                <label for="" class="label">Model</label>
                                <input type="text" class="form-control" placeholder="Aventador">
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="" class="label">Year</label>
                                    <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
                                </div>
                                <div class="form-group ml-2">
                                    <label for="" class="label">quantuty</label>
                                    <input type="text" class="form-control" id="book_off_date" placeholder="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="label">price</label>
                                <input type="text" class="form-control" id="time_pick" placeholder="$700500">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="buy A Car Now" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Better way to buy your ideal cars</h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Select the Best Deal</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@include('components.footer')

@endsection
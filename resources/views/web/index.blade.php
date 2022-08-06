@extends('web.layout.master')
@section('title')
    Home
@endsection
@section('content')



    <section id="slider" class="slider-element "
             style="background: url('{{lib_assets('img/img1 2.jpeg')}}') no-repeat; background-size: cover;padding-top: 200px;height: 400px!important;"
             data-height-xl="600" data-height-lg="500" data-height-md="400" data-height-sm="300" data-height-xs="250">
        <div class="slider-parallax-inner">
            <input type="hidden" value="HOME" id="page_active">
            <div class="container clearfix">
                <div class="vertical-middle dark center">

                    <div class="heading-block nobottommargin center">
                        <h1 class="txt_baner">
                            @if(!\Illuminate\Support\Facades\Auth::check())
                                <input type="hidden" name="check_login" value="out">
                                <span class="text-rotater nocolor" id="show_get_name" data-separator="|" data-rotate="flipInX" data-speed="3500">
                            </span>
                            @else
                                <input type="hidden" name="check_login" value="is">
                                <span class="text-rotater nocolor" data-separator="|" data-rotate="flipInX"
                                      data-speed="3500">HELLO {{\Illuminate\Support\Facades\Auth::user()->first_name}}, ARE YOU GOING SOMEWHERE?
                                </span>
                            @endif

                        </h1>
                        <span class="d-md-block txt_baner">Find people travelling to your destination</span>
                        <a href="{{route('createRequest')}}"
                           class="btn btn-outline-dark button button-border  button-rounded tright button-large topmargin d-none d-md-inline-block"><span
                                style="" class="find-a-ride">Find a Ride</span></a>
                        <a href="{{route('createRide')}}"
                           class="btn btn-outline-dark button button-border  button-rounded tright button-large topmargin d-none d-md-inline-block"><span
                                style="">Offer a Ride</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content1">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="col_one_third">
                    <div class="feature-box fbox-border fbox-effect">
                        <div class="fbox-icon">
                            <p style="font-size: 300%; margin: -8% 30%; color: #1ABC9C">1</p>
                        </div>
                        <h3>CREATE A REQUEST</h3>
                        <p>Create a carpool request and we will match it with a ride that has a destination at the same address or close to yours</p>
                    </div>
                </div>
                <div class="col_one_third">
                    <div class="feature-box fbox-border fbox-effect">
                        <div class="fbox-icon">
                            <p style="font-size: 300%; margin: -8% 30%; color: #1ABC9C">2</p>
                        </div>
                        <h3>BOOK</h3>
                        <p>Once a match it found, you can see the details of the ride and book your ride online in few clicks</p>
                    </div>
                </div>

                <div class="col_one_third col_last">
                    <div class="feature-box fbox-border fbox-effect">
                        <div class="fbox-icon">
                            <p style="font-size: 300%; margin: -8% 30%; color: #1ABC9C">3</p>
                        </div>
                        <h3>ENJOY THE RIDE</h3>
                        <p>The driver will come pick you up at specified time and place. Connect people & make new friends</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="slider2" class=" swiper_wrapper">
        <div class="container">
            <div class="col_one_third bottommargin-sm center ml-5">
                <img data-animate="fadeInLeft" src="https://cdn.blablacar.com/kairos/assets/build/images/indicate-your-route-fef6b1a4c9dac38c77c092858d73add3.svg">
            </div>
            <div class="col_two_third bottommargin-sm col_last abc">
                <p class="text-P" style="margin-bottom: 10px !important;font-size: 250%; margin-top: 2%;">To work, festivals and more</p>
                <p class="text-P">Driving together allows you to share costs, makes driving more fun and helps protect the environment. Let's make this your least expensive journey ever.</p>
                <a href="{{route('createRide')}}" class="button button-border button-dark button-rounded button-large noleftmargin topmargin-sm mt-5 text-P">Offer a ride</a>
            </div>
        </div>
    </section>
    <div class="section topmargin-sm nobottommargin">

        <div class="container clearfix">

            <div class="heading-block center">
                <h3>Testimonials</h3>
                <span>Check out some of our Client Reviews</span>
            </div>

            <ul class="testimonials-grid grid-3 clearfix nobottommargin">
                <li>
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="{{lib_assets('/img/hoang.jpeg')}}" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>I've been carpooling for more than 3 years now. It will take some organizing now and then, but it always pays off for our wallet as well as for the environment.</p>
                            <div class="testi-meta">
                                John Doe
                                <span>XYZ Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="{{lib_assets('/img/phuong.jpg')}}" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Intuitive and easy to use, Carpool provides quick access to rides, messages and notifications. Ideal to never miss out on a request!</p>
                            <div class="testi-meta">
                                Collis Ta'eed
                                <span>Envato Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="{{lib_assets('/img/thuan.jpg')}}" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>I've been carpooling for more than 3 years now. It will take some organizing now and then, but it always pays off for our wallet as well as for the environment.</p>
                            <div class="testi-meta">
                                Mary Jane
                                <span>Google Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="{{lib_assets('/img/thuan.jpg')}}" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Intuitive and easy to use, Carpool provides quick access to rides, messages and notifications. Ideal to never miss out on a request!</p>
                            <div class="testi-meta">
                                Steve Jobs
                                <span>Apple Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="{{lib_assets('/img/hoang.jpeg')}}" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Intuitive and easy to use, Carpool provides quick access to rides, messages and notifications. Ideal to never miss out on a request!</p>
                            <div class="testi-meta">
                                Jamie Morrison
                                <span>Adobe Inc.</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="testimonial">
                        <div class="testi-image">
                            <a href="#"><img src="{{lib_assets('/img/phuong.jpg')}}" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Intuitive and easy to use, Carpool provides quick access to rides, messages and notifications. Ideal to never miss out on a request!</p>
                            <div class="testi-meta">
                                Cyan Ta'eed
                                <span>Tutsplus</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @if($ride_count)
        <section>
            <a href="{{route('profile_user')}}" class="button button-full center tright">
                <div class="container clearfix">
                    You have {{$ride_count}} upcoming rides planned. <strong>See details.</strong>
                </div>
            </a>
        </section>
    @endif
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3>Choice</h3>
                            <p>We go everywhere. Literally thousands of destinations. No station required.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <h3>Simple</h3>
                            <p>Enter your exact address to find the perfect ride. Choose who you’d like to travel with. And book!</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <i class="fas fa-road"></i>
                            </div>
                            <h3>Seamless</h3>
                            <p>Get to your exact destination, without the hassle. No queues. No waiting around.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


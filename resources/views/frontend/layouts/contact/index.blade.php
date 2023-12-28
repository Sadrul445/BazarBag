@extends('frontend.layouts.templateBuilder')
@push('css')
@endpush
@includeIf('frontend.layouts.partials.css')
@section('title','Contact Us')
@section('content')
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/ui/frontend/img/breadcrumb.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Contact Us</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Contact Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
    
        <!-- Contact Section Begin -->
        <section class="contact spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_phone"></span>
                            <h4>Phone</h4>
                            <p>+951515151</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_pin_alt"></span>
                            <h4>Address</h4>
                            <p>14 No Ward Lalkhan Bazar Chattogram, Bangladesh</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_clock_alt"></span>
                            <h4>Open time</h4>
                            <p>10:00 am to 23:00 pm</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                        <div class="contact__widget">
                            <span class="icon_mail_alt"></span>
                            <h4>Email</h4>
                            <p>info@ministore.com.bd</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->
    
        <!-- Map Begin -->
        <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14760.18205417871!2d91.82086299682204!3d22.351910255800757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd896f189aae3%3A0xa9856520631c6891!2sLalkhan%20Bazar%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1703573680803!5m2!1sen!2sbd" 
                height="550" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="map-inside">
                <i class="icon_pin"></i>
                <div class="inside-widget">
                    <h4>Lalkhan Bazar</h4>
                    <ul>
                        <li>Phone: +12-345-6789</li>
                        <li>Add: Lalkhan Bazar, Chittagong</li>
                        <li><a href="#">info@ministore.com.bd</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Map End -->
    
        <!-- Contact Form Begin -->
        <div class="contact-form spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h2>Leave Message</h2>
                        </div>
                    </div>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <input type="text" placeholder="Your name">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <input type="text" placeholder="Your Email">
                        </div>
                        <div class="col-lg-12 text-center">
                            <textarea placeholder="Your message"></textarea>
                            <button type="submit" class="site-btn">SEND MESSAGE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact Form End -->
@endsection

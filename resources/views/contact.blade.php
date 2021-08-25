@extends('layouts.page')

@section('content')


    <section class="map-section">
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2977.7316290600916!2d44.759918251469514!3d41.72630958277562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404472e005215b4b%3A0x9b339b2f6674a14c!2s15%20Alexander%20Kazbegi%20Ave%2C%20T&#39;bilisi!5e0!3m2!1sen!2sge!4v1629047595581!5m2!1sen!2sge" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    @if(session('success'))
        <div class="alert alert-success message-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        </div>
    @endif


    <section class="Material-contact-section section-padding section-dark contact-section">
        <div class="container">
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Love to Hear From You</h1>
                </div>
            </div>
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s" >
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>

                    <div class="find-widget">
                        Company:  <a href="https://hostriver.ro">HostRiver</a>
                    </div>
                    <div class="find-widget">
                        Address: <a href="#">4435 Berkshire Circle Knoxville</a>
                    </div>
                    <div class="find-widget">
                        Phone:  <a href="#">+ 879-890-9767</a>
                    </div>

                    <div class="find-widget">
                        Website:  <a href="https://uny.ro">www.uny.ro</a>
                    </div>
                    <div class="find-widget">
                        Program: <a href="#">Mon to Sat: 09:30 AM - 10.30 PM</a>
                    </div>
                </div>
                <!-- contact form -->
                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator" action="{{url('sendmail')}}">
                        {{ csrf_field() }}
                        <!-- Name -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">სახელი</label>
                            <input class="form-control" id="name" type="text" name="name" required="" data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- email -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="email">მეილი</label>
                            <input class="form-control" id="email" type="email" name="email" required="" data-error="Please enter your Email">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Subject -->
                        <div class="form-group label-floating">
                            <label class="control-label">Subject</label>
                            <input class="form-control" id="msg_subject" type="text" name="subject" required="" data-error="Please enter your message subject">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Message -->
                        <div class="form-group label-floating">
                            <label for="message" class="control-label">მესიჯი</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required="" data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Form Submit -->
                        <div class="form-submit mt-5">
                            <button class="btn btn-primary" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

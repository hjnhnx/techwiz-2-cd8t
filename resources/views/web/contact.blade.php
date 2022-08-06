@extends('web.layout.master')
@section('title')
    Contact
@endsection
@section('content')
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="col_half">
                        <div class="fancy-title title-dotted-border">
                            <h3>Send us an Email</h3>
                        </div>
                        <div class="contact-widget">
                            <input type="hidden" value="CONTACT" id="page_active">
                            <div class="contact-form-result"></div>
                            <form class="nobottommargin" id="template-contactform"
                                  name="template-contactform" action="{{route('storeFeedback')}}" method="post">
                                @csrf
                                <div class="form-process"></div>
                                <div class="col_full">
                                    <label for="title">Title<small>*</small></label>
                                    <input type="text" id="title" name="title"  class="sm-form-control required" required/>
                                </div>
                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="content">Content<small>*</small></label>
                                    <textarea class="required sm-form-control" id="content" name="content" rows="6" cols="30"></textarea>
                                </div>

                                <div class="col_full">
                                    <button style="width: 50%" name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
                                </div>

                            </form>
                        </div>

                    </div>
                    <div class="col_half col_last">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119167.706490933!2d105.78214315820311!3d21.033053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6c1540e631%3A0xd2fe500bb6bb4f47!2sHoi%20An%20private%20car!5e0!3m2!1sen!2s!4v1619389006659!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="clear"></div>

                    <!-- Contact Info
                    ============================================= -->
                    <div class="row clear-bottommargin">

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                                </div>
                                <h3>Our Headquarters<span class="subtitle">Melbourne, Australia</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="fas fa-phone-alt"></i></a>
                                </div>
                                <h3>Speak to Us<span class="subtitle">(123) 456 7890</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="fab fa-skype"></i></a>
                                </div>
                                <h3>Make a Video Call<span class="subtitle">CanvasOnSkype</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                                <h3>Follow on Twitter<span class="subtitle">2.3M Followers</span></h3>
                            </div>
                        </div>

                    </div><!-- Contact Info End -->

                </div>

            </div>

        </section><!-- #content end -->
    @endsection


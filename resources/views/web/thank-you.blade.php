@extends('web.layout.master')
@section('title')
    Thank you!
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <h1 class="text-center">We have received your feedback. Thank you!</h1> <br>
                <div class="col_full text-center">
                    <button style="width: 20%" onclick="window.location='{{ url("/") }}'" name="home" type="button" id="button-home" tabindex="5" value="Button" class="button button-3d nomargin ">Back to home</button>
                </div>
            </div>

        </div>

    </section><!-- #content end -->
@endsection


@extends('web.layout.master')
@section('title')
    Forbidden
@endsection
@section('content')
    <section id="slider" class="slider-element full-screen dark error404-wrap" style="background:url('{{lib_assets('images/landing/static.jpg')}}') center;">
        <div>

            <div class="container-fluid vertical-middle center clearfix">

                <div class="error404">403</div>

                <div class="heading-block nobottomborder">
                    <h4>You do not have the permission to visit this page</h4>
                </div>
            </div>

        </div>
    </section>
@endsection

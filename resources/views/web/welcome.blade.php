<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>
    @include('web.layout.style')
<style>

        ::placeholder {
        }

</style>
    <title>Welcome | Car share</title>

</head>
<body class="stretched ">
<div id="wrapper" class="clearfix">
    <header id="header" class="transparent-header dark full-header no-sticky">


    </header>

    <section id="slider" class="slider-element force-full-screen full-screen">
        <div class="force-full-screen full-screen dark"
             style="background: url('{{lib_assets('img/baner3.jpg')}}') no-repeat; background-size: cover;padding-top: -100px;height: 800px!important;opacity: 0.9">
            <div class="container clearfix" style="z-index: 1000">
                <div class="slider-caption slider-caption-center">
                    <h2 id="txt_welcome" data-animate="fadeInDown"></h2><br>
                    <form action="{{route('index')}}">
                        <input style="font-weight: normal;text-align: center;font-family: 'Raleway', sans-serif;;height: 80px ;color: #000;font-size: 40px; background: none;border: none;" type="text" name="get_name" id="get_name" class="form-control" placeholder="Type &amp; Hit Enter..">
                        <a href="{{route('index') }}"><button id="btn_start" type="submit" data-animate="fadeInUp" data-delay="600"  class="button button-border button-light button-rounded button-large noleftmargin nobottommargin d-none d-md-inline-block" style="margin-top: 30px; background: white;color: black;width: 160px">Start Now</button></a>
                        <a data-animate="fadeInUp" data-delay="600" href="{{route('login')}}" class="button button-border button-light button-rounded button-large noleftmargin nobottommargin d-none d-md-inline-block" style="margin-top: 30px; background: white;color: black;width: 160px">login</a>
                    </form>
                </div>
            </div>

        </div>

    </section>

    <!-- Footer
    ============================================= -->
    @include('web.layout.footer')
</div>

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<script>
    document.addEventListener('DOMContentLoaded',function (){
        document.querySelector('#top-search-trigger').onclick = function (){
            this.style.opacity = 0;
        }
    document.onclick = function (){
        document.querySelector('#top-search-trigger').style.opacity = 1;
        document.querySelector('body').classList.remove('top-search-open')
    }
    })
</script>
@include('web.layout.script')
<script>
    document.addEventListener('DOMContentLoaded',function (){
        if (!localStorage.getItem('get_name')){
            $('#txt_welcome').text('Welcome to CarShare')
        }else {
            $('#txt_welcome').text('Hello '+ localStorage.getItem('get_name') + '\n welcome to Carshare')
        }
        $(document).on('keypress',function(e) {
            if(e.which === 13 && $('#get_name').val().length > 2) {
                localStorage.setItem('get_name',$('#get_name').val())
            }else {
                $('#top-search-trigger').css('opacity',0)
                $('body').addClass('top-search-open')
                $("#get_name").attr("placeholder", "PLEASE ENTER A NAME BEFORE PROCEEDING!").placeholder();
            }
        });

    })
</script>

</body>
</html>

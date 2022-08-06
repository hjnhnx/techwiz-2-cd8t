<style>
    .log-hover:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>
<header id="header" class="transparent-header dark full-header" data-sticky-class="not-dark"
        style="background-color: rgba(0,0,0,0)">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <div id="logo">
                <a href="/" class="standard-logo"
                   data-dark-logo="{{lib_assets('web/images/logo.png')}}"><img
                        src="{{lib_assets('web/images/logo.png')}}" alt="Canvas Logo"></a>
                <a href="/" class="retina-logo" data-dark-logo="{{lib_assets('web/images/logo.png')}}"><img
                        src="{{lib_assets('web/images/logo.png')}}" alt="Canvas Logo"></a>
            </div>
            <i style="font-size: 25px;float: right;" class="fa fa-bars menu-bars-icon iconbar" aria-hidden="true"></i>
            <nav id="primary-menu" class="menu_top">
                <ul class="h-100">
                    <li slot="HOME" class="mega-menu"><a href="{{route('index')}}">
                            <div>HOME</div>
                        </a>
                    </li>
                    <li slot="RULES" class="mega-menu"><a href="{{route('rules')}}">
                            <div>RULES</div>
                        </a>
                    </li>
                    <li slot="FINDARIDE" class="mega-menu"><a href="{{route('createRequest')}}">
                            <div>FIND A RIDE</div>
                        </a>
                    </li>

                    <li slot="CONTACT" class="mega-menu"><a href="{{route('createFeedback')}}">
                            <div>CONTACT</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('createRide')}}">
                            <div style="display: inline; background-color: #1ABC9C !important; color: white"
                                 class="btn">OFFER A RIDE
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="position-relative" id="top-search" style="width: 150px">
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <div style="width: 80%;float: left">
                            {{--                            <a class="btn_account"><i class="fas fa-user" style="font-size: 20px"></i></a>--}}
                            {{--                            <a href="{{route('loginUser')}}" class="btn" style="margin-right: 5px;color: black; width: 100%;">Login</a>--}}
                            <a href="{{route('loginUser')}}" class="btn_account"><b
                                    style="font-size: 20px; cursor: pointer">Login</b></a>
                        </div>
                    @else()
                        <div style="width: 80%;float: left">
                            <a class="btn_account"><b
                                    style="font-size: 20px; cursor: pointer">{{\Illuminate\Support\Facades\Auth::user()->username}}</b></a>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div style="width: 20%;float: left">
                            <a>
                                <i style="font-size: 20px" class="fa fa-bell" aria-hidden="true">
                                    <p style=" display: flex;justify-content: center;align-items: center;height: 14px;width: 14px;font-size: 10px;border-radius: 50%;background: #1ABC9C
                                    ;position: absolute;top: -8px;right: -12px; cursor: pointer"
                                       id="unread-notification-count">{{$unread_count}}</p></i>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="top-cart-content notification"
                     style="box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 -1px 0px rgb(0 0 0 / 2%);border-top: 2px solid #1ABC9C;right: 0; width: 350px; background: #fff;position: absolute;top: 100%;">
                    <div class="top-cart-title">
                        <h4>Notifications</h4>
                    </div>
                    <div style="padding: 0 15px 12px 15px;">
                        @foreach($notifications as $notification)
                            <a href="{{$notification->target ? $notification->target : '#'}}">
                                <div style="padding: 15px 0;border-bottom: 1px solid #EEE;"
                                     class="top-cart-item clearfix border border-danger">
                                    <p style="color: black; margin: 0;">
                                        @if($notification->is_read)
                                            {{$notification->content}}
                                        @else
                                            <span class="text-primary">{{$notification->content}}</span>
                                        @endif
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <div id="account" class="accountn"
                         style="border-top: 2px solid #1ABC9C;box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 -1px 0px rgb(0 0 0 / 2%);width: 130px;color: black; background-color: #ffffff;position: absolute;  top: 100%; right: 87px;">
                        <div style="padding: 5px;border-bottom: 1px solid rgba(0,0,0,0.1)" class="log-hover">
                            <a href="{{route('profile_user')}}"
                               style="display: inline-block;text-align: center;-ms-touch-action: manipulation;border: 1px solid transparent;padding: 6px 12px;line-height: 1.42857143;width: 100%;;color: black;margin-right: 5px"><b>Profile<i
                                        style="padding-left: 5px" class="fas fa-id-badge"></i></b></a>
                        </div>
                        <div style="padding: 5px" class="log-hover">
                            <a href="{{route('logoutUser')}}"
                               style="display: inline-block;text-align: center;-ms-touch-action: manipulation;border: 1px solid transparent;padding: 6px 12px;line-height: 1.42857143;width: 100%;color: black"><b>Logout<i
                                        class="fas fa-sign-out-alt" style="padding-left: 5px"></i></b></a>
                        </div>
                    </div>
                @endif
            </nav>
        </div>
    </div>
</header>

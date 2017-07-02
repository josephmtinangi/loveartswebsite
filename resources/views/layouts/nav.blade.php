<style>
    #bannerTopBar{
        z-index: 99;
        width: 100%;
        background: #ff4d4d;
        padding: 10px 42px;
        position: fixed;
        top: 0;
    }

    #bannerTopBar #title {
        font-size: 32px;
        display: inline-block;
    }

    #bannerTopBar #title img{
        height: 45px !important;
    }

    #bannerTopBar #links, #bannerTopBar #authOptions{
        margin-top: 10px;
    }

    #bannerTopBar #links > a, #bannerTopBar #authOptions a{
        padding: 12px 20px;
        font-family: "Gotham medium", sans-serif;
        font-weight: 200;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 0.75em;
        margin-bottom: 11px;
        color: #fff;
    }

    #bannerTopBar #authOptions a{
        background-color: rgba(255,255,255,0.1);
        color: #fff;
    }

    #bannerTopBar #authOptions a:hover{
        background-color: rgba(255,255,255,0.2);
        color: #fff;
    }

    #bannerTopBar #links > a:hover{
        background-color: rgba(255,255,255,0.2);
    }

    #bannerTopBar #links > a.active{
        background-color: rgb(232, 74, 74);
    }

    #authOptions img{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #ddd;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        border: 2px solid #fff;
    }
</style>

<?php
        $nav_class = isset($for_inner) ? "light" : "";
?>
<div id="bannerTopBar" class="layout center justified {{$nav_class}}">
    <div id="title" class="layout center" style="color: #555">
        {{--<div id="logo"></div>--}}
        {{--Love Arts--}}

        <img src="{{asset('images/logoactive.png')}}" alt="" style="height: 60px">
    </div>

    <div id="links" class="layout center">
        @include('layouts.nav_links')
    </div>

    <div id="authOptions" class="layout center">
        @if(Auth::guest())
            <a href="{{url('/login')}}">LOGIN</a>
        @else
            <img src="{{Auth::user()->avatar}}" alt="">
        @endif
    </div>
</div>
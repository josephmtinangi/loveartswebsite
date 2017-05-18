<!--1. LARGE IMAGE WITH SERIF TEXT, SANS SERIF TEXT-->
<style>
    #banner{
        position: relative;
        overflow: hidden;
        height: calc(100vh + 10px);
        /*height: calc(100vh + 200px);*/
        background: var(--app-cool-white);
        background-position: top right;
        background-repeat: no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        background-image: url({{asset('images/banner/im4.jpg')}});
    }

    #banner.reddis{
        background-color: #ee4a4a;
        background-image: -webkit-linear-gradient(#ee4a4a, #da4d4d);
        background-image: -o-linear-gradient(#ee4a4a, #da4d4d);
        background-image: linear-gradient(#ee4a4a, #da4d4d);
    }

    #banner h2{
        font-family: "Gotham light", serif;
        font-size: 4em;
        letter-spacing: 17px;
        color: #303030;
        color: #222;
        color: #000;
        color: #eee;
        padding-top: 70px;
        margin-bottom: 9px;
    }

    #banner p{
        font-size: 1.4em;

        font-family: Verdana, sans-serif;
        font-size: 1.3em;
        font-weight: 100;
        letter-spacing: 5px;
    }

    #banner #text{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    #banner .faded-bg{
        opacity: 0.9;
        background:rgba(238,74,74,1);
        /*background:rgba(238,238,239,0.9);*/
        {{--background-image: url({{asset('images/banner/im4.jpg')}});--}}
    }

    #celebrateTagline{
        z-index: 99;
        -webkit-perspective: 500px; /* Chrome, Safari, Opera */
        -mox-perspective: 500px;
        perspective: 500px;
        color: #444;
        margin-top: 18px;
    }
    #celebrateTagline span{
        display: inline-block;
        position: relative;
        cursor: default;
        border-style: solid;
        border-width: 0;
        border-bottom-width: 1px;

        -webkit-transition: all 0.35s ease-out;
        -moz-transition: all 0.35s ease-out;
        -ms-transition: all 0.35s ease-out;
        -o-transition: all 0.35s ease-out;
        transition: all 0.35s ease-out;
    }
    #banner:not(.reddish) #celebrateTagline span{
        color: #777;
    }

    #banner:not(.reddish) #celebrateTagline span:hover{
        color: #000;
    }

    #celebrateTagline span:hover{
        color: #f9f9f9;
    }

    #celebrateTagline span:not(:first-child){
        /*margin-left: 40px;*/
    }
</style>

<div id="banner" class="layout vertical reddish">
    @include('landing.banner.nav')
    <div class="faded-bg"></div>
    <div class="layout center-center justifie" style="padding-to: 2em; background-colo: #fff; position: absolute; top: 0; width: 100%; height: calc(100vh - 70px);">
        <h2 class="layout justified" style="margin-left: 23px;">
            <span>passion.</span> <span>impact.</span> <span>change</span>
        </h2>
    </div>
</div>
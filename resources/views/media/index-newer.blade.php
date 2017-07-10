<style>
    body{
        background: #fff;
    }
    #media{
        position: relative;
        min-height: 100vh;
    }

    .container{
        max-width: 1200px;
        margin: auto;
    }

    #media #title{
        /*background: #fff0f0;*/
        /*background: #362626;*/
        /*background: #000;*/
        padding-top: 7.5em;
        padding-bottom: 3.5em;
    }

    #media #title h1{
        color: #f8f8f8;
        font-size: 4em;
        letter-spacing: 4px;
        font-family: "Gotham ultra", sans-serif;
        margin-bottom: 0.3em;
    }

    #media #title p{
        margin-top: 10px;
        line-height: 1.5em;
        font-size: 1.3em;
        max-width: 800px;
        color: #eee;
    }

    .channel{
        width: 33.333%;
        max-width: 33.333%;
        padding: 3em 0;
    }

    .channel .container{
        padding-top: 3em;
    }

    .channel .title{
        background-color: #000;
        -webkit-background-size:20%;
        margin-right: 10px;
    }

    .channel .channel-image{
        background: #f0ad4e;
        height: 295px;
    }

    .channel .title h2{
        color: #000;
        font-size: 1.4em;
        /*letter-spacing: 2px;*/
        font-family: "Gotham bold", sans-serif;
        padding: 0.1em 0;
    }

    .channel .title p{
        margin-top: 2px;
        line-height: 1.2em;
        font-size: 1em;
        color: #555;
    }

    #polyCover{
        background: #362626; opacity: 0.95;
    }

    #polyBg{
        background-image: url({{asset('images/pt.png')}}); background-size: 50%;
    }
</style>

@verbatim
<div id="media" ng-controller="listCtrl as vm">
    <section id="title" style="position: relative;">
        <div id="polyBg" class="fill-above">
        </div>
        <div id="polyCover" class="fill-above"></div>
        <div class="container layout vertical center-center" style="text-align: center;">
            <h1>MEDIA</h1>
            <p>
                Stay in touch with all you favorite tv shows, series and online platforms from your favorite loveartists right here, don't forget to subscribe.
            </p>
        </div>
    </section>

    <div class="layou wra">
        <div class="container layout wrap">
            <div class="channel" ng-repeat="channel in vm.movie_items">
                <a href="{{vm.media_url + channel.id}}" class="title layout vertical">
                    <div class="channel-image flex" style="-webkit-background-size: cover;background-size: cover; background-position: 0 0;background-image: url({{channel.cover}})"></div>
                    <div class="layout start" style="background: #f5f5f5; padding: 25px 30px; padding-bottom: 30px; padding-right: 25px;">
                        <div class="flex layou center">
                            <h2 style="display: inline-block">{{channel.name}}</h2>
                            <p>
                                {{channel.description | limitTo : 70}}
                                <span ng-if="!channel.description.length">No description provided</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div style="height: 5em"></div>
</div>
@endverbatim
<style>
    #artists{
        min-height: 100vh;
        -webkit-perspective: 1000px;
        -moz-perspective: 1000px;
        -ms-perspective: 1000px;
        perspective: 1000px;
    }

    #artists .container{
        max-width: 1200px;
        margin: auto;
    }

    .category-shape h1{
        font-family: "Ultra", sans-serif;
        font-size: 2.5em;
        letter-spacing: 7px;
        color: #000;
        text-transform: uppercase;
        font-size: 3.2em !important;
        letter-spacing: 9px !important;
    }

    .category-shape{
        display: inline-block;
        background: #fff;
        background: var(--app-contrast-color);
        padding: 3em;
        -webkit-transform: translate3d(-50px, 4.3em, 0) rotateX(-8deg);
        -moz-transform: translate3d(-50px, 4.3em, 0) rotateX(-8deg);
        -ms-transform: translate3d(-50px, 4.3em, 0) rotateX(-8deg);
        -o-transform: translate3d(-50px, 4.3em, 0) rotateX(-8deg);
        transform: translate3d(-50px, 4.3em, 0) rotateX(-8deg);
        margin:auto;
        box-shadow: 0 0 16px rgba(0,0,0,0.12);
        position: relative;
        z-index: 1;
    }

    #artists h1{
        font-family: "Gotham ultra", sans-serif;
        font-size: 3.5em;
        color: #000;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .artist{
        position: relative;
        min-width: calc(33.33% - 4px);
        max-width: calc(33.33% - 4px);
        margin-bottom: 6px;
        height: 300px;
        overflow: hidden;
        text-decoration: none;
    }

    .artist-text{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: rgba(0,0,0,0.4);
        color: #fff;
        font-family: "Gotham light", sans-serif;
        padding: 0 1em;

        -webkit-transition: all 0.35s;
        -moz-transition: all 0.35s;
        -ms-transition: all 0.35s;
        -o-transition: all 0.35s;
        transition: all 0.35s;
    }

    .artist-text:hover{
        background: rgba(0,0,0,0.8);
    }

    .artist-name{
        font-size: 2em;
        -webkit-transition: all 0.15s;
        -moz-transition: all 0.15s;
        -ms-transition: all 0.15s;
        -o-transition: all 0.15s;
        transition: all 0.15s;
    }

    .artist .image{
        width: 100%;
        height: 100%;
        background-color:#cccccc;
        -webkit-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .artist:hover .artist-name{
        font-family: "Gotham ultra", sans-serif;
        letter-spacing: 3px;
        transform: scale(1.8);
        padding: 0.5em 3em;
        color: #555;
    }

    .artist:not(:hover) .artist-quote{
        display: none;
    }

    .artist:hover .artist-quote{
        font-size: 1.5em;
        position: absolute;
    }

    #artistFilters{

    }

    #artistFilters .artist-filter{
        position: relative;
        color: #888;
        padding: 15px 20px;
        min-width: 100px;
        text-align: center;
        margin: 0 8px;
        letter-spacing: 2px;
    }

    #artistFilters .artist-filter:before{
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        transform: rotateX(18deg);
        background: #f7f7f7;
        z-index: -1;
    }

    #artistFilters .artist-filter:hover:before{
        background: #f0f0f0;
    }

    #artistFilters .artist-filter.active{
        color: #fff;
        color: #000;
        font-weight: bold;
    }

    #artistFilters .artist-filter.active:before{
        background: var(--app-contrast-color);
    }
</style>

<div style="padding-top: 8em; margin-bottom: 4.6em; backgroun: #ff4d4d;">
    <div class="container">
        <div class="layout center justified">
            <h1>ARTISTS</h1>
            <div id="artistFilters" class="layout center">
                @verbatim
                <a href="javascript:void(0);" class="artist-filter"
                   ng-repeat="filter in vm.filters"
                   ng-class="{'active' : vm.isCur($index)}"
                   ng-click="vm.setFilter($index)">{{filter}}</a>
                @endverbatim
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-bottom: 8.6em;">
    <div class="layout wrap justified">
        @verbatim
        <a class="artist" href="#artist{{$index}}"
           ng-repeat="name in vm.names"
           ng-show="$index % vm.cur_filter === 0">
            <div class="image" style="background-image: {{vm.artistImage($index)}}"></div>
            <div class="artist-text layout vertical center-center text-center">
                <div class="artist-name">
                    {{name}}
                </div>
                <div class="artist-quote">
                    <q>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, doloremque, velit. Alias facilis magni necessitatibus.</q>
                </div>
            </div>
        </a>
        @endverbatim
    </div>
</div>
{{--1. LIST OF FEATURE ARTISTS--}}
{{--2. HIGHLIGHT A SPECIFIC ONE--}}

{{--1. ARTIST PICTURE(CHANGING)--}}
{{--2. CHANGING QUESTIONS--}}
{{--3. ARTIST ANSWER TO QUESTION--}}
{{--4. QUESTION INICATORS--}}

<style>
    #featured{
        padding-top: 4em;
        background: var(--app-cool-white);
    lg(top left, var(--app-accent1-color), var(--app-main-color), var(--app-accent1-color))
    }

    #featured #header h2{
        text-align: center;
        padding-top: 0;
        margin-bottom: 0;
        width: 100%;
        /*font-family: "Lucida Grande", serif;*/
        /*letter-spacing: 0.2em;*/
        /*font-size: 3.5em;*/
        /*font-weight: bolder;*/
        font-family: "Gotham ultra", sans-serif;
        font-size: 3em;
        letter-spacing: 10px;
        color: #555;
    }

    #featured #header p{
        margin: 20px 0;
        font-size: 1.8em;
        letter-spacing: 2px;
        font-family: "Lora Italic", sans-serif;
    }

    #featured #artistImage{
        position: relative;
        /*max-height: 400px;*/
        overflow: hidden;
        width: calc(40% - 30px);
    }

    #featured #artistImage img{
        width: 100%;
        height: auto;
        /*max-height: calc(100vh + 50px);*/
        transform: translate3d(60px, 50px, 0)
    }
</style>

<div id="featured">
    <div class="layout justified" style="overflow: hidden; padding-top: 8px;">
        <div id="artistImage">
            <img src="{{asset('images/featured/maurice2.jpg')}}" alt="">
        </div>
        <div class="flex" style="padding-top: 80px;">
            <div id="header" class="layout vertical center">
                <h2>FEATURED ARTIST</h2>
                <p style="">Baraka Kamuzoga</p>
            </div>

            @include('landing.featured.artist_sections')
        </div>
    </div>
</div>
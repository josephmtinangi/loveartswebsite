<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('title', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_events.inputs.title.placeholder'),
                'aria-describedby'=> 'eventTitleHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('title'))

            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}

        @else

            <p id="eventTitleHelpBlock" class="help-block">

                {{ trans('admin_events.inputs.title.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('start_date', null, [
                'class' => 'form-control form-control-datetime',
                'placeholder' => trans('admin_events.inputs.start_date.placeholder') ,
                'aria-describedby' => 'eventStartDateHelpBlock',
                'required' => 'required',
                'readonly' => 'readonly',
            ])
        !!}

        @if ($errors->any() && $errors->has('start_date'))

            {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}

        @else

            <p id="eventStartDateHelpBlock" class="help-block">

                {{ trans('admin_events.inputs.start_date.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('poster_url') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::file('poster_url', [
                'class' => 'form-control',
                'placeholder' => trans('admin_events.inputs.poster.placeholder') ,
                'aria-describedby' => 'eventPosterHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('poster_url'))

            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}

        @else

            <p id="eventPosterHelpBlock" class="help-block">

                {{ trans('admin_events.inputs.poster.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('source_url') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('source_url', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_events.inputs.source_url.placeholder') ,
                'aria-describedby' => 'eventSourceUrlHelpBlock',
            ])
        !!}

        @if ($errors->any() && $errors->has('source_url'))

            {!! $errors->first('source_url', '<p class="help-block">:message</p>') !!}

        @else

            <p id="eventSourceUrlHelpBlock" class="help-block">

                {{ trans('admin_events.inputs.source_url.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('location', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_events.inputs.location.placeholder') ,
                'aria-describedby' => 'eventLocationHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('location'))

            {!! $errors->first('location', '<p class="help-block">:message</p>') !!}

        @else

            <p id="eventLocationHelpBlock" class="help-block">

                {{ trans('admin_events.inputs.location.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('description', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_events.inputs.description.placeholder') ,
                'aria-describedby' => 'eventDescriptionHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('description'))

            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}

        @else

            <p id="eventDescriptionHelpBlock" class="help-block">

                {{ trans('admin_events.inputs.description.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('name', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_artists_pillars.inputs.name.placeholder'),
                'aria-describedby'=> 'nameHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('name'))

            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

        @else

            <p id="nameHelpBlock" class="help-block">

                {{ trans('admin_artists_pillars.inputs.name.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('media') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::file('media', [
                'class' => 'form-control',
                'aria-describedby' => 'mediaHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('media'))

            {!! $errors->first('media', '<p class="help-block">:message</p>') !!}

        @else

            <p id="mediaHelpBlock" class="help-block">

                {{ trans('admin_artists_pillars.inputs.media.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('description', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_artists_pillars.inputs.description.placeholder') ,
                'aria-describedby' => 'descriptionHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('description'))

            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}

        @else

            <p id="descriptionHelpBlock" class="help-block">

                {{ trans('admin_artists_pillars.inputs.description.help_block') }}

            </p>

        @endif

    </div>

</div>

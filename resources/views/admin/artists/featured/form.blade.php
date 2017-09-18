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

<div class="form-group {{ $errors->has('biography') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('biography', null, [
                'class' => 'form-control',
                'placeholder' => 'Biography',
                'aria-describedby'=> 'biographyHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('biography'))

            {!! $errors->first('biographyHelpBlock', '<p class="help-block">:message</p>') !!}

        @else

            <p id="biographyHelpBlock" class="help-block">

                A little about the life of {{ $instance->name }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('questions') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('questions', null, [
                'class' => 'form-control',
                'placeholder' => 'Answers to interview questions',
                'aria-describedby' => 'questionsHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('questionsHelpBlock'))

            {!! $errors->first('questions', '<p class="help-block">:message</p>') !!}

        @else

            <p id="questions" class="help-block">

                Answers to interview questions

            </p>

        @endif

    </div>

</div>

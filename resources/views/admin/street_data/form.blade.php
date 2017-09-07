<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('title', null, [
                'class'             => 'form-control',
                'placeholder'       => trans('admin_street_data.inputs.title.placeholder'),
                'aria-describedby'  => 'streetDataTitleHelpBlock',
                'required'          => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('title'))

            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}

        @else

            <p id="streetDataTitleHelpBlock" class="help-block">

                {{ trans('admin_street_data.inputs.title.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('attachment') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::file('attachment', [
                'class' => 'form-control',
                'placeholder' => trans('admin_street_data.inputs.attachment.placeholder') ,
                'aria-describedby' => 'streetDataAttachmentHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('attachment'))

            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}

        @else

            <p id="streetDataAttachmentHelpBlock" class="help-block">

                {{ trans('admin_street_data.inputs.attachment.help_block') }}

            </p>

        @endif

    </div>

</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">

    <div class="col-md-offset-3 col-md-6">

        {!!
            Form::text('description', null, [
                'class' => 'form-control',
                'placeholder' => trans('admin_street_data.inputs.description.placeholder') ,
                'aria-describedby' => 'streetDataDescriptionHelpBlock',
                'required' => 'required',
            ])
        !!}

        @if ($errors->any() && $errors->has('description'))

            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}

        @else

            <p id="streetDataDescriptionHelpBlock" class="help-block">

                {{ trans('admin_street_data.inputs.description.help_block') }}

            </p>

        @endif

    </div>

</div>

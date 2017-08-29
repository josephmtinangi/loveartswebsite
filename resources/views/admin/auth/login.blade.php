@extends('admin.layouts.auth')

@section('content')

    <div class="middle-box loginscreen">

        <center>

            <img src="{{ asset('images/logoactive.png') }}" width="128">

        </center>

        @include('flash::message')

        {!!
            Form::open([
                'class' => 'm-t',
                'method' => 'POST',
                'route' => 'admin.login',
            ])
        !!}

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            {!!
                Form::email('email', old('email'), [
                    'class' => 'form-control',
                    'aria-describedby' => 'emailHelpBlock',
                    'placeholder' => trans('admin_auth_login.inputs.email.placeholder'),
                    'required' => 'required',
                ])
            !!}

            @if($errors->any() && $errors->has('email'))

                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}

            @endif

        </div>

        <div class="form-group{{ $errors->has('password') ?  'has-error' : '' }}">

            {!!
                Form::text('password', null, [
                    'class' => 'form-control',
                    'aria-describedby' => 'passwordHelpBlock',
                    'placeholder' => trans('admin_auth_login.inputs.password.placeholder'),
                    'required' => 'required',
                ])
            !!}

            @if($errors->any() && $errors->has('password'))

                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

            @endif

        </div>

        {!!
            Form::button(trans('admin_auth_login.inputs.login.label'), [
                'type' => 'submit',
                'class' => 'btn btn-primary block full-width m-b',
            ])
        !!}

        {!! Form::close() !!}

        <a class="btn btn-default block full-width m-b" href="{{ route('admin.password.showSendResetEmailForm') }}">

            @lang('admin_auth_login.inputs.forgot_password.label')

        </a>

    </diV>

@endsection

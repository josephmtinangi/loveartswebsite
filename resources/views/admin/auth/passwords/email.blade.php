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
                'route' => 'admin.password.sendResetEmail',
            ])
        !!}
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            {!!
                Form::text('email', old('email'), [
                    'class' => 'form-control',
                    'placeholder' => trans('admin_auth_passwords.inputs.email.placeholder'),
                    'required' => 'required',
                ])
            !!}

            @if ($errors->any() && $errors->has('email'))

                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}

            @endif

        </div>

        {!!
            Form::button(trans('admin_auth_passwords.inputs.send_reset_link.label'), [
                'class' => 'btn btn-primary block full-width m-b',
                'type' =>  'submit',
            ])
        !!}

        {!! Form::close() !!}

    </div>

@endsection

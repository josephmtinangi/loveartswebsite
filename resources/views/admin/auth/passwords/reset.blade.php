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
                'route' => 'password.request',
            ])
        !!}

        {{ csrf_field() }}

        {!! Form::hidden('token', $token) !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!!
                Form::email('email', old('email'), [
                    'class' => 'form-control',
                    'placeholder' => trans('admin_auth_passwords.inputs.email.placeholder'),
                    'required' => 'required',
                    'autofocus' => 'autofocus',
                ])
            !!}

            @if($errors->any() && $errors->has('email'))

                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}

            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            {!!
                Form::text('password', null, [
                    'class' => 'form-control',
                    'type' => 'password',
                    'placeholder' => trans('admin_auth_passwords.inputs.password.placeholder'),
                    'required' => 'required',
                ])
            !!}

            @if ($errors->has('password'))

                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            {!!
                Form::text('password_confirmation', null, [
                    'class' => 'form-control',
                    'type' => 'password',
                    'placeholder' => trans('admin_auth_passwords.inputs.password_confirmation.placeholder'),
                    'required' => 'required',
                ])
            !!}

            @if ($errors->has('password_confirmation'))

                {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}

            @endif
        </div>

        {!!
            Form::button(trans('admin_auth_passwords.inputs.reset.label'), [
                'type' => 'submit',
                'class' => 'btn btn-primary block full-width m-b',
            ])
        !!}
    </form>
</div>
@endsection

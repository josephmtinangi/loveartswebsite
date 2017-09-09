@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            {!!
                Form::model($instance, [
                    'class' => 'form-horizontal',
                    'route' => ['admin.street_data.update', $instance->id],
                    'method' => 'PUT',
                    'files' => true,
                ])
            !!}

            <div class="ibox">

                <div class="ibox-content">

                    <div class="page-header">

                        <div class="btn-toolbar pull-right" role="toolbar">

                            <a class="btn btn-white" href="{{ route('admin.street_data.index') }}">

                                {{ trans('admin_street_data.actions.cancel.title') }}

                            </a>

                            {!!
                                Form::button(trans('admin_street_data.actions.update.title'), [
                                    'type' => 'submit',
                                    'class' => 'btn btn-primary',
                                ])
                            !!}
                        </div>

                        <h2>
                            <small>

                                {{ trans('admin_street_data.actions.update.heading') }}

                            </small>
                        </h2>

                    </div>

                    @include('admin.street_data.form')

                </div>

            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

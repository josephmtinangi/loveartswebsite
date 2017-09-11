@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            {!!
                Form::open([
                    'class' => 'form-horizontal',
                    'route' => 'admin.events.store',
                    'files' => true,
                ])
            !!}

            <div class="ibox">

                <div class="ibox-content">

                    <div class="page-header">

                        <div class="btn-toolbar pull-right" role="toolbar">

                            <a class="btn btn-white" href="{{ route('admin.events.index') }}">

                                {{ trans('admin_events.actions.cancel.title') }}

                            </a>

                            {!!
                                Form::button(trans('admin_events.actions.create.title'), [
                                    'type' => 'submit',
                                    'class' => 'btn btn-primary',
                                ])
                            !!}
                        </div>

                        <h2>
                            <small>

                                {{ trans('admin_events.actions.create.heading') }}

                            </small>
                        </h2>

                    </div>

                    @include('admin.events.form')

                </div>

            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

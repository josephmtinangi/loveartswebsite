@extends('admin.layouts.page')

@section('page')

    <div class="row">

        <div class="col-md-12">

            {!!
                Form::open([
                    'class' => 'form-horizontal',
                    'route' => 'admin.artists.pillars.store',
                    'files' => true,
                ])
            !!}

            <div class="ibox">

                <div class="ibox-content">

                    <div class="page-header">

                        <div class="btn-toolbar pull-right" role="toolbar">

                            <a class="btn btn-white" href="{{ route('admin.artists.pillars.index') }}">

                                @lang('admin_artists_pillars.actions.cancel.title')

                            </a>

                            {!!
                                Form::button(trans('admin_artists_pillars.actions.create.title'), [
                                    'type' => 'submit',
                                    'class' => 'btn btn-primary',
                                ])
                            !!}
                        </div>

                        <h2>
                            <small>

                                @lang('admin_artists_pillars.actions.create.heading')

                            </small>
                        </h2>

                    </div>

                    @include('admin.artists.pillars.form')

                </div>

            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addMt4User'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('accounts::accounts.addMt4User') }}</h1>
    </div>
    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            @if($denyLiveAccount)
                <div class="alert alert-info alert-dark">{{ trans('accounts::accounts.fillFullDetailsToAllowLive') }} </div>
            @endif
            <span class="panel-title">{{ trans('general.user_details') }}</span>
        </div>

        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                @if(!$denyLiveAccount)
                    <li>
                        <a href="{{ route('client.accounts.addMt4User')}}">{{ trans('accounts::accounts.assign_existing_mt4') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('client.accounts.mt4LiveAccount')}}">{{ trans('accounts::accounts.mt4LiveAccount') }}</a>
                    </li>
                @endif
                <li class="active">
                    <a href="{{ route('client.accounts.mt4DemoAccount')}}">{{ trans('accounts::accounts.mt4DemoAccount') }}</a>
                </li>
            </ul>

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                        {!! Form::select('array_leverage',$array_leverage,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.group') }}</label>
                        {!! Form::select('array_group',$array_group,'',['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- row -->

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.deposit') }}</label>
                        {!! Form::select('array_deposit',$array_deposit,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->


                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.password') }}</label>
                        {!! Form::password("password",["class"=>"form-control","value"=>$mt4_user_details['password']]) !!}

                    </div>
                </div>
                <!-- col-sm-6 -->

            </div>
            <!-- row -->

            <div class="row">


            </div>
            <!-- row -->

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.investor') }}</label>
                        {!! Form::password("investor",["class"=>"form-control","value"=>$mt4_user_details['password']]) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->

            </div>
            <!-- row -->


        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="panel-footer text-right">

            <!-- TODO[moaid] convert this button to Form::button -->
            <button type="submit" class="btn btn-primary" name="edit_id"
                    value="{{ $mt4_user_details['edit_id']  or 0 }}">{{ trans('accounts::accounts.submit') }}</button>
        </div>
    </div>
        </div>
    {!! Form::close() !!}
@stop
@section("script")
    @parent
    <script>
        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="birthday"]').datepicker(options);

        });

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

    </script>
@stop
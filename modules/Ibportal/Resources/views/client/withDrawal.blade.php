@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.agentwithDrawal'))
@section('content')

    <div id="content-wrapper">
        <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.agentwithDrawal') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.agentwithDrawal') }}</span>
        </div>


        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('clients.ibportal.agentMoney')}}">{{ trans('ibportal::ibportal.agentMoney') }}</a>
                </li>

                <li >
                    <a href="{{ route('clients.ibportal.agentInternalTransfer')}}">{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                </li>

                <li class="active">
                    <a href="{{ route('client.ibportal.agentwithDrawal')}}">{{ trans('ibportal::ibportal.agentwithDrawal') }}</a>
                </li>

            </ul>



            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('ibportal::ibportal.amount') }}</label>
                        {!! Form::text('amount',$internalTransfer['amount'],['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>

            <div class="row">
                @if($Pssword==true)
                    <div class="col-sm-6">

                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('ibportal::ibportal.currentMt4Password') }}</label>
                            {!! Form::password("oldPassword",["class"=>"form-control","value"=>$internalTransfer['oldPassword']]) !!}
                        </div>
                    </div><!-- col-sm-6 -->
                    <div class="clearfix"></div>

                @endif
            </div>







            <div class="panel-footer text-right">
                {!! Form::submit(trans('ibportal::ibportal.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach
            </div>
    </div>

    </div>


    @endif

    {!! Form::close() !!}
@stop
@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.assignAgents'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.addPlan') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.addPlan') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>



                        <div class="panel">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}
                            <div class="panel-heading">
                                <span class="panel-title">{{ trans('ibportal::ibportal.assignAgents').trans('ibportal::ibportal.currentAgentMt4Is').$userInfo['login'].trans('ibportal::ibportal.liveUsre')}}</span>
                            </div>

                            <div class="panel-body">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('ibportal::ibportal.Login') }}</label>
                                            {!! Form::text('login',$userInfo['login'],['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <!-- col-sm-6 -->
                                </div>
                                <!-- row -->
                            </div>

                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                            <div class="panel-footer text-right">
                                {!! Form::hidden('agentId',$agentId) !!}
                                <button type="submit" class="btn btn-primary" name="edit_id"
                                        value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('ibportal::ibportal.assign') }}</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                                    </div>
                                    <!-- / .modal-content -->
                                </div>
                                <!-- / .modal-dialog -->
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->

@stop
@section('script')
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
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.assignAgents') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.assignAgents').trans('ibportal::ibportal.currentAgentMt4Is').$userInfo['login'].trans('ibportal::ibportal.liveUsre')}}</span>
        </div>

        <div class="panel-body">


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('ibportal::ibportal.Login') }}</label>
                        {!! Form::text('login',$userInfo['login'],['class'=>'form-control']) !!}
                    </div>
                </div>

                <!-- col-sm-6 -->
            </div>
            <!-- row -->
        </div>

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        <div class="panel-footer text-right">
            {!! Form::hidden('agentId',$agentId) !!}
            <button type="submit" class="btn btn-primary" name="edit_id"
                    value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('ibportal::ibportal.assign') }}</button>
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
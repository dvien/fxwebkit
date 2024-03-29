@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.settings'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.settings') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.settings') }}</li>
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
                <div class="col-lg-12">
                    <div class="white-box">
                        {!! Form::open(['class'=>'panel form-horizontal']) !!}
                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>

                        <div class="panel-body">

                            <div class="panel-group" id="accordion-example">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                                           href="#collapseOne">
                                            {{ trans('ibportal::ibportal.agreemment') }}
                                        </a>
                                    </div>
                                    <!-- / .panel-heading -->
                                    <div id="collapseOne" class="panel-collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('ibportal::ibportal.agreemment') }}</label>
                                                        {!! Form::textarea('agreemment',$ibportalSetting['agreemment'],['class'=>'form-control','id'=>'editor1']) !!}
                                                    </div>
                                                </div>
                                                <!-- col-sm-6 -->
                                            </div>
                                            <!-- col-sm-6 -->

                                            <hr>
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <div class="checkbox checkbox-success">
                                                        {!! Form::checkbox('is_client', 1,$ibportalSetting['is_client'], ['class'=>'px','id'=>'is_client']) !!}
                                                        <label for="is_client">{{ trans('ibportal::ibportal.is_client') }}</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div><span>{{trans('general.selectVisibleTabs')}}</span></div>

                                                @foreach(config('ibportal.client_menu') as $index=>$tab)

                                                        <div class="col-sm-4">
                                                            <div class="checkbox checkbox-success">
                                                                {!! Form::checkbox('client_menu_display['.$index.']', 1,$tab['display'], ['class'=>'px','id'=>'tab'.$tab['title']]) !!}
                                                                <label for="tab{{$tab['title']}}">{{ trans('ibportal::ibportal.'.$tab['title']) }}</label>
                                                            </div>
                                                        </div>


                                                    @endforeach

                                                            <!-- col-sm-6 -->
                                            </div>
                                        </div>
                                        <!-- / .panel-body -->
                                    </div>
                                    <!-- / .collapse -->
                                </div>
                                <!-- / .panel -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                                           href="#collapseTwo">
                                            {{ trans('ibportal::ibportal.agentInternalTransfer') }}
                                        </a>
                                    </div>
                                    <!-- / .panel-heading -->
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">


                                            <div class="row">


                                                    <div class="col-sm-4">
                                                        <div class="checkbox checkbox-success">
                                                            {!! Form::checkbox('allowAgentTransferToAll', 1,$ibportalSetting['allowAgentTransferToAll'], ['class'=>'px allow_transfer_check_box','id'=>'allowAgentTransferToAll']) !!}
                                                            <label for="allowAgentTransferToAll">{{ trans('ibportal::ibportal.allowAgentTransferToAll') }}</label>
                                                        </div>
                                                    </div>





                                                    <div class="col-sm-4">
                                                        <div class="checkbox checkbox-success">
                                                            {!! Form::checkbox('allowAgentTransferToHisAgentUsers', 1,$ibportalSetting['allowAgentTransferToHisAgentUsers'], ['class'=>'px allow_transfer_check_box','id'=>'allowAgentTransferToHisAgentUsers']) !!}
                                                            <label for="allowAgentTransferToHisAgentUsers">{{ trans('ibportal::ibportal.allowAgentTransferToHisAgentUsers') }}</label>
                                                        </div>
                                                    </div>




                                                    <div class="col-sm-4">
                                                        <div class="checkbox checkbox-success">
                                                            {!! Form::checkbox('allowAgentTransferToHisAgent', 1,$ibportalSetting['allowAgentTransferToHisAgent'], ['class'=>'px allow_transfer_check_box','id'=>'allowAgentTransferToHisAgent']) !!}
                                                            <label for="allowAgentTransferToHisAgent">{{ trans('ibportal::ibportal.allowAgentTransferToHisAgent') }}</label>
                                                        </div>
                                                    </div>



                                                <!-- col-sm-6 -->
                                            </div>
                                        </div>
                                        <!-- / .panel-body -->
                                    </div>
                                    <!-- / .collapse -->
                                </div>

                            </div>
                            <!-- / .panel-group -->

                        </div>


                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">

                            <button type="submit" class="btn btn-primary" name="edit_id"
                                    value="0">{{ trans('ibportal::ibportal.save') }}</button>
                            </a>

                            {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>

@stop
            @section("script")
                @parent
                <script src="/cms_assets/ckeditor/ckeditor.js"></script>
                <script>
                    init.push(function () {
                        var options = {
                            format: "yyyy-mm-dd",
                            todayBtn: "linked",
                            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                        }

                        $('input[name="birthday"]').datepicker(options);

                    });

                    $('#jq-validation-select2').select2({
                        allowClear: true,
                        placeholder: 'Select a country...'
                    }).change(function () {
                        $(this).valid();
                    });

                    //CKEDITOR.replace( textarea );
                    CKEDITOR.replace('editor1', {
                        filebrowserBrowseUrl: " {{ asset('/cms/articles/file-browser') }}",
                        filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
                    });

                    $('#allowAgentTransferToAll').change(function() {
                        if($(this).is(':checked')){
                            $('#allowAgentTransferToHisAgentUsers').prop('checked',false);
                            $('#allowAgentTransferToHisAgent').prop('checked',false);
//                        $('#allowAgentTransferToHisAgentUsers').attr("disabled", true);
//                        $('#allowAgentTransferToHisAgent').attr("disabled", true);
                        }
                    });
                    //                $('#allowAgentTransferToAll').click(function(){ $(this).removeAttr("disabled");});
                    //                $('#allowAgentTransferToHisAgentUsers,#allowAgentTransferToHisAgent').click(function(){
                    //
                    //                    $('#allowAgentTransferToAll,#allowAgentTransferToAll').removeAttr("disabled");});
                    $('#allowAgentTransferToHisAgentUsers,#allowAgentTransferToHisAgent').change(function() {
                        if($(this).is(':checked')){
                            $('#allowAgentTransferToAll').prop('checked',false);
//                                $('#allowAgentTransferToAll').attr("disabled", true);

                        }
                    });

                </script>
            @stop

@section('hidden')



    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('ibportal::ibportal.settings') }}</h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('ibportal::ibportal.settings') }}</span>
            </div>

            <div class="panel-body">

                <div class="panel-group" id="accordion-example">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                               href="#collapseOne">
                                {{ trans('ibportal::ibportal.agreemment') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('ibportal::ibportal.agreemment') }}</label>
                                            {!! Form::textarea('agreemment',$ibportalSetting['agreemment'],['class'=>'form-control','id'=>'editor1']) !!}
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                                <!-- col-sm-6 -->

                                <hr>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('is_client', 1,$ibportalSetting['is_client'], ['class'=>'px','id'=>'is_client']) !!}
                                                <span class="lbl">{{ trans('ibportal::ibportal.is_client') }}</span>
                                            </label>
                                        </div>
                                    </div>





                                </div>

                                <hr>
                                <div class="row">
                                    <div><span>{{trans('general.selectVisibleTabs')}}</span></div>

                                    @foreach(config('ibportal.client_menu') as $index=>$tab)
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('client_menu_display['.$index.']', 1,$tab['display'], ['class'=>'px','id'=>'tab'.$tab['title']]) !!}
                                                    <span class="lbl">{{ trans('ibportal::ibportal.'.$tab['title']) }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach

                                    <!-- col-sm-6 -->
                                </div>
                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example"
                               href="#collapseTwo">
                                {{ trans('ibportal::ibportal.agentInternalTransfer') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">


                                <div class="row">


                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('allowAgentTransferToAll', 1,$ibportalSetting['allowAgentTransferToAll'], ['class'=>'px allow_transfer_check_box','id'=>'allowAgentTransferToAll']) !!}
                                                <span class="lbl">{{ trans('ibportal::ibportal.allowAgentTransferToAll') }}</span>
                                            </label>
                                        </div>
                                    </div>





                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('allowAgentTransferToHisAgentUsers', 1,$ibportalSetting['allowAgentTransferToHisAgentUsers'], ['class'=>'px allow_transfer_check_box','id'=>'allowAgentTransferToHisAgentUsers']) !!}
                                                <span class="lbl">{{ trans('ibportal::ibportal.allowAgentTransferToHisAgentUsers') }}</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('allowAgentTransferToHisAgent', 1,$ibportalSetting['allowAgentTransferToHisAgent'], ['class'=>'px allow_transfer_check_box','id'=>'allowAgentTransferToHisAgent']) !!}
                                                <span class="lbl">{{ trans('ibportal::ibportal.allowAgentTransferToHisAgent') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- col-sm-6 -->
                                </div>
                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>

                </div>
                <!-- / .panel-group -->

            </div>


            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
            <div class="panel-footer text-right">

                <button type="submit" class="btn btn-primary" name="edit_id"
                        value="0">{{ trans('ibportal::ibportal.save') }}</button>
                </a>

                {!! Form::close() !!}
            </div>
        </div>
        </div>
        @stop
        @section("script")
            @parent
            <script src="/cms_assets/ckeditor/ckeditor.js"></script>
            <script>
                init.push(function () {
                    var options = {
                        format: "yyyy-mm-dd",
                        todayBtn: "linked",
                        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                    }

                    $('input[name="birthday"]').datepicker(options);

                });

                $('#jq-validation-select2').select2({
                    allowClear: true,
                    placeholder: 'Select a country...'
                }).change(function () {
                    $(this).valid();
                });

                //CKEDITOR.replace( textarea );
                CKEDITOR.replace('editor1', {
                    filebrowserBrowseUrl: " {{ asset('/cms/articles/file-browser') }}",
                    filebrowserUploadUrl: "{{ asset('/cms/articles/upload-image' ).'?_token='. csrf_token() }}"
                });

                $('#allowAgentTransferToAll').change(function() {
                    if($(this).is(':checked')){
                        $('#allowAgentTransferToHisAgentUsers').prop('checked',false);
                        $('#allowAgentTransferToHisAgent').prop('checked',false);
//                        $('#allowAgentTransferToHisAgentUsers').attr("disabled", true);
//                        $('#allowAgentTransferToHisAgent').attr("disabled", true);
                    }
                });
//                $('#allowAgentTransferToAll').click(function(){ $(this).removeAttr("disabled");});
//                $('#allowAgentTransferToHisAgentUsers,#allowAgentTransferToHisAgent').click(function(){
//
//                    $('#allowAgentTransferToAll,#allowAgentTransferToAll').removeAttr("disabled");});
                        $('#allowAgentTransferToHisAgentUsers,#allowAgentTransferToHisAgent').change(function() {
                            if($(this).is(':checked')){
                                $('#allowAgentTransferToAll').prop('checked',false);
//                                $('#allowAgentTransferToAll').attr("disabled", true);

                            }
                        });

            </script>
@stop

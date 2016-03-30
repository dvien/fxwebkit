@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.settings'))
@section('content')
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





                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('is_client', 1,$ibportalSetting['is_client'], ['class'=>'px','id'=>'is_client']) !!}
                                                <span class="lbl">{{ trans('ibportal::ibportal.is_client') }}</span>
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
                    <!-- / .panel -->

                </div>
                <!-- / .panel-group -->

            </div>


            @if($errors->any())
                <div class="alert alert-danger alert-dark">
                    @foreach($errors->all() as $key=>$error)
                        <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                    @endforeach

                </div>
            @endif
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

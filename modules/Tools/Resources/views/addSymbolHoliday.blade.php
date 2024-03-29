@extends('admin.layouts.main')
@section('title', trans('tools::tools.addContract'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('tools::tools.futureContract') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('tools::tools.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('tools::tools.futureContract') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('tools::tools.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('tools::tools.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('tools::tools.tableDescription') }}</p>

                        <div class="panel-body">

                            <div class="table-light">


                                <table id="symbolsListTable" class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch >
                                    <thead>
                                    <tr>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{{trans('tools::tools.symbols')}}</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2"></th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>


                                <div class="table-footer">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#myModal">{{ trans('ibportal::ibportal.add_symbol') }}</button>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('tools::tools.date') }}</label>
                                        {!! Form::text('date',$holidayInfo['date'],['class'=>'form-control mydatepicker']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->

                                <div class="col-sm-4">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('tools::tools.start_time') }}</label>
                                        {!! Form::text('start_hour',$holidayInfo['start_hour'],['class'=>'form-control myclockpicker']) !!}
                                    </div>
                                </div>
                                <!-- col-sm-6 -->

                                <div class="col-sm-4">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('tools::tools.end_time') }}</label>
                                        {!! Form::text('end_hour',$holidayInfo['end_hour'],['class'=>'form-control myclockpicker']) !!}

                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                            <!-- row -->


                        </div>
                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary" name="holiday_id"
                                    value="{{ $holidayInfo['id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">{{ trans('tools::tools.select_symbols') }}</h4>
                                </div>
                                <div class="modal-body">

                                    {!! Form::open() !!}
                                    <div class="row form-group">
                                        <label class="col-sm-4 control-label">{{ trans('tools::tools.symbols') }} </label>

                                        <div class="col-sm-8">
                                            {!! Form::select('symbols',$symbols,'',['id'=>'symbolsMultiSelect','multiple'=>'multiple','class'=>'form-control']) !!}

                                        </div>
                                    </div>


                                    {!! Form::close() !!}
                                </div>
                                <!-- / .modal-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">{{ trans('tools::tools.close') }}</button>
                                    <button type="button" class="btn btn-primary"
                                            id="addSymbolsToListButton">{{ trans('tools::tools.add') }}</button>
                                </div>
                            </div>
                            <!-- / .modal-content -->
                        </div>
                        <!-- / .modal-dialog -->
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
@section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">

    <script>



        $('#addSymbolsToListButton').click(function () {
            var html = '';
            var selectedSymbols = $('#symbolsMultiSelect').val();

            if (selectedSymbols != null) {
                var type = $('#symbolsType').val();
                var value = $('#symbolsValue').val();
                for (var i = 0; i < selectedSymbols.length; i++) {
                    var symbolLabel = $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').text();
                    $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').remove();
                    html = '<tr id="tr_' + selectedSymbols[i] + '">' +
                            '<td><input type="hidden" name="selectedSymbols[]" value="' + selectedSymbols[i] + '" />' + symbolLabel + '</td>' +
                            '<td><i class="fa fa-trash-o" onclick="removeSelectedSymbolFromTable(' + selectedSymbols[i] + ',\'' + symbolLabel + '\')"></i> </td>' +
                            '</tr>';

                    $('#symbolsListTable tbody').append(html);
                }
                $('#s2id_symbolsMultiSelect .select2-search-choice').remove();
            }


        });

        function removeSelectedSymbolFromTable(symbol, symbolLabel) {
            $('#tr_' + symbol).remove();
            $('#symbolsMultiSelect').append('<option value="' + symbol + '">' + symbolLabel + '</option>');
        }
    </script>
@stop
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('tools::tools.trading_hours_over_the').' '. $holidayInfo['name']  }} </h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}


    <div class="panel-body">

        <div class="table-light">

            <table id="symbolsListTable" class="table table-bordered table-striped" style="display: table  ">
                <thead>
                <tr>

                    <th class="no-warp">{{trans('tools::tools.symbols')}}</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>


                </tbody>

            </table>

            <div class="table-footer">

                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#myModal">{{ trans('ibportal::ibportal.add_symbol') }}</button>


            </div>
        </div>



        <div class="row">
            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.date') }}</label>
                    {!! Form::text('date',$holidayInfo['date'],['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->

            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.start_time') }}</label>
                    {!! Form::text('start_hour',$holidayInfo['start_hour'],['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->

            <div class="col-sm-4">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.end_time') }}</label>
                    {!! Form::text('end_hour',$holidayInfo['end_hour'],['class'=>'form-control']) !!}

                </div>
            </div>
            <!-- col-sm-6 -->
        </div>
        <!-- row -->


    </div>
        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="holiday_id"
                value="{{ $holidayInfo['id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
    </div>
</div>
    {!! Form::close() !!}


    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('tools::tools.select_symbols') }}</h4>
                </div>
                <div class="modal-body">

                    {!! Form::open() !!}
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">{{ trans('tools::tools.symbols') }} </label>

                        <div class="col-sm-8">
                            {!! Form::select('symbols',$symbols,'',['id'=>'symbolsMultiSelect','multiple'=>'multiple','class'=>'form-control']) !!}

                        </div>
                    </div>


                    {!! Form::close() !!}
                </div>
                <!-- / .modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ trans('tools::tools.close') }}</button>
                    <button type="button" class="btn btn-primary"
                            id="addSymbolsToListButton">{{ trans('tools::tools.add') }}</button>
                </div>
            </div>
            <!-- / .modal-content -->
        </div>
        <!-- / .modal-dialog -->
    </div>

@stop
@section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">

    <script>
        {{-- TODO [mohammad] check if the start hour less than end hour --}}
        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="date"]').datepicker(options);
        });

        var options2 = {
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            showInputs: false,
            orientation: $('body').hasClass('right-to-left') ? {x: 'right', y: 'auto'} : {x: 'auto', y: 'auto'}
        }
        $('input[name="end_hour"],input[name="start_hour"]').timepicker(options2);


        $('.securitiesCheckbox').change(function () {
            var security_id = $(this).val();

            if ($(this).prop("checked")) {
                $(".symbols_tr_" + security_id + " .symbolsCheckbox").prop("checked", true);
            } else {

                $(".symbols_tr_" + security_id + " .symbolsCheckbox").prop("checked", false);
            }
        });


        $('#addSymbolsToListButton').click(function () {
            var html = '';
            var selectedSymbols = $('#symbolsMultiSelect').val();

            if (selectedSymbols != null) {
                var type = $('#symbolsType').val();
                var value = $('#symbolsValue').val();
                for (var i = 0; i < selectedSymbols.length; i++) {
                    var symbolLabel = $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').text();
                    $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').remove();
                    html = '<tr id="tr_' + selectedSymbols[i] + '">' +
                            '<td><input type="hidden" name="symbols[]" value="' + selectedSymbols[i] + '" />' + symbolLabel + '</td>' +
                            '<td><i class="fa fa-trash-o" onclick="removeSelectedSymbolFromTable(\'' + selectedSymbols[i] + '\',\'' + symbolLabel + '\')"></i> </td>' +
                            '</tr>';
                    $('#symbolsListTable tbody').append(html);
                }
                $('#s2id_symbolsMultiSelect .select2-search-choice').remove();
            }


        });

        function removeSelectedSymbolFromTable(symbol, symbolLabel) {
            $('#tr_' + symbol).remove();
            $('#symbolsMultiSelect').append('<option value="' + symbol + '">' + symbolLabel + '</option>');
        }
    </script>
@stop
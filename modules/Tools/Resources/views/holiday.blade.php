@extends('admin.layouts.main')
@section('title', trans('tools::tools.holiday'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('tools::tools.holiday') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('tools::tools.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('tools::tools.holiday') }}</li>
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
                        
                        <a href="{{ route('tools.addHoliday') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                   value="{{ trans('tools::tools.add_holiday') }}"> </a>

                        <h3 class="box-title m-b-0">{{ trans('tools::tools.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('tools::tools.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('tools::tools.start_date'), 'symbol', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('tools::tools.end_date'), 'exchange', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{{ $oResult->name }}</td>
                                        <td>{{ $oResult->start_date }}</td>
                                        <td>{{ $oResult->end_date }}</td>
                                        <td>
                                            <a href="{{ route('tools.editHoliday').'?edit_id='.$oResult->id }}"
                                               class="fa fa-edit tooltip_number" data-original-title="{{trans('tools::tools.editHoliday')}}"></a>
                                            <a href="{{ route('tools.deleteHoliday').'?delete_id='.$oResult->id }}"
                                               class="fa fa-trash-o tooltip_number" data-original-title="{{trans('tools::tools.deleteHoliday')}}"></a>


                                            <a href="{{ route('tools.addSymbolHoliday').'?holiday_id='.$oResult->id }}"
                                               class="fa fa-plus-square tooltip_number" data-original-title="{{trans('tools::tools.addSymbolHoliday')}}"></a>

                                            <a href="{{ route('tools.holidayDetails').'?holiday_id='.$oResult->id }}"
                                               class="fa fa-file-text-o tooltip_number" data-original-title="{{trans('tools::tools.holidayDetails')}}"></a>

                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('tools::tools.showing')}} {{ $oResults->firstItem() }} {{trans('tools::tools.to')}} {{ $oResults->lastItem() }} {{trans('tools::tools.of')}} {{ $oResults->total() }} {{trans('tools::tools.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->
        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('mt4configrations::mt4configrations.search') }}</h3>

                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}



                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('tools::tools.name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('start_date', $aFilterParams['start_date'], ['placeholder'=>trans('tools::tools.start_date'),'class'=>'form-control input-sm mydatepicker']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('end_date', $aFilterParams['end_date'], ['placeholder'=>trans('tools::tools.end_date'),'class'=>'form-control input-sm mydatepicker']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('tools::tools.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close()!!}
            </div>
        </div>


        @stop
        @section('hidden')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('tools::tools.search') }} </a>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('tools::tools.name'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('start_date', $aFilterParams['start_date'], ['placeholder'=>trans('tools::tools.start_date'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('end_date', $aFilterParams['end_date'], ['placeholder'=>trans('tools::tools.end_date'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('tools::tools.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}

            </div>
        </div>

        <div class="mail-container ">

            <div class="mail-container-header">
                {{ trans('tools::tools.tools') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">

                        <div class="table-caption">
                            {{ trans('tools::tools.holiday') }}

                            <a href="{{ route('tools.addHoliday') }}" style="float:right;">
                                <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                       value="{{ trans('tools::tools.add_holiday') }}"> </a>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped" style="display: table">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.start_date'), 'symbol', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.end_date'), 'exchange', $oResults) !!}</th>
                            <th class="no-warp"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $oResult->name }}</td>
                                    <td>{{ $oResult->start_date }}</td>
                                    <td>{{ $oResult->end_date }}</td>
                                    <td>
                                        <a href="{{ route('tools.editHoliday').'?edit_id='.$oResult->id }}"
                                           class="fa fa-edit tooltip_number" data-original-title="{{trans('tools::tools.editHoliday')}}"></a>
                                        <a href="{{ route('tools.deleteHoliday').'?delete_id='.$oResult->id }}"
                                           class="fa fa-trash-o tooltip_number" data-original-title="{{trans('tools::tools.deleteHoliday')}}"></a>


                                        <a href="{{ route('tools.addSymbolHoliday').'?holiday_id='.$oResult->id }}"
                                           class="fa fa-plus-square tooltip_number" data-original-title="{{trans('tools::tools.addSymbolHoliday')}}"></a>

                                        <a href="{{ route('tools.holidayDetails').'?holiday_id='.$oResult->id }}"
                                           class="fa fa-file-text-o tooltip_number" data-original-title="{{trans('tools::tools.holidayDetails')}}"></a>

                                    </td>


                                </tr>
                            @endforeach
                        @endif

                        </tbody>

                    </table>

                    <div class="table-footer">


                        @if (count($oResults))

                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('tools::tools.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('tools::tools.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                </div>
                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('tools::tools.showing')}} {{ $oResults->firstItem() }} {{trans('tools::tools.to')}} {{ $oResults->lastItem() }} {{trans('tools::tools.of')}} {{ $oResults->total() }} {{trans('tools::tools.entries')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <script>
        init.push(function () {


            $('.tooltip_number').tooltip();
        });
    </script>

@stop
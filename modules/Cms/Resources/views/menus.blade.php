@extends(Config::get('cms.admin_theme'))

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('cms::cms.pagesList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('cms::cms.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('cms::cms.pagesList') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('cms::cms.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>


            {!! Form::hidden('selected_id',$selected_id) !!}
            {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
            {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}

            {!! Form::close() !!}

            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">

                        {!! Form::button(trans('cms::cms.add_link'),["id"=>'show_add_menu_item_button','onclick'=>'window.location.href="/cms/menus/edit-menu-item/0/'.$selected_id.'";','class'=>'btn btn-primary btn-flat' ]) !!}

                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                            {!! Form::open() !!}
                            {!! Form::hidden('selected_id',$selected_id) !!}

                        <h3 class="box-title m-b-0">{{ trans('cms::cms.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('cms::cms.tableDescription') }}</p>
                        @if($selected_language==1)
                            {!! Form::open() !!}
                            {!! Form::hidden('selected_id',$selected_id) !!}
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{{ trans('cms::cms.id') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{ trans('cms::cms.name') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{ trans('cms::cms.parent') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{{ trans('cms::cms.disable') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{{ trans('cms::cms.hide') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{{ trans('cms::cms.link_to') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7"></th>

                            </tr>
                            </thead>
                            <tbody>


                            {{--@if (count($oResults))--}}
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($menu_items as $item)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                @if($item->type == 1 && $item->article['title']=='')
                                @else
                                    <tr class='{{ $class }}'>

                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->cms_menus_items['name']}}</td>
                                        <td>{{ $disable_icons[$item->disable] }}</td>
                                        <td>{{ $hide_icons[$item->hide] }}</td>
                                        <td>
                                            @if($item->type == 0)
                                                page  ({{ $item->page['title'] }})
                                            @elseif($item->type == 1)
                                                article ({{ $item->article['title'] }})
                                            @elseif($item->type == 2)
                                                form ({{ $item->form['name'] }})
                                            @endif
                                        </td>
                                        <td>
                                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete  link")) return false;','class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                                            {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_menu_item_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$item->id ]) !!}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['url'=>'/cms/menus/save-items-translate']) !!}
                            {!! Form::hidden('selected_id',$selected_id) !!}
                            <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                <thead>
                                <tr>


                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{{ trans('cms::cms.id') }}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{ trans('cms::cms.name') }}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                                        {!! Form::hidden('selected_language',$selected_language) !!}
                                        {!! Form::submit('save '.$languages[$selected_language].' translate',["name"=>'save_menu_name_translate','class'=>'btn btn-primary btn-flat' ]) !!}</th>
                                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"></th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($menu_items as $item)
                                    @if($item->type == 1 && $item->article['title']=='')
                                    @else
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>


                                            <td>
                                                {!! Form::text('translate_name['.$item->id.']',(isset($item->cms_menus_items_languages->first()->translate))? $item->cms_menus_items_languages->first()->translate:'',['placeholder'=>$item->name .' ( '.$languages[$selected_language].' ) ']) !!}</td>


                                            <td>
                                                {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {!! Form::close() !!}
                        @endif


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
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('cms::cms.menuBuilder') }}</h1>

        {!! Form::open(['url'=>asset('cms/menus/menus'),'method'=>'get','class'=>'language_select_form']) !!}
        {!! Form::hidden('selected_id',$selected_id) !!}
        {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
        {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}

        {!! Form::close() !!}
    </div>


    @if($selected_id != 0)


        <div class="table-light">
            <div class="table-header">
                <div class="table-caption">

                    {!! Form::button(trans('cms::cms.add_link'),["id"=>'show_add_menu_item_button','onclick'=>'window.location.href="/cms/menus/edit-menu-item/0/'.$selected_id.'";','class'=>'btn btn-primary btn-flat' ]) !!}

                    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                </div>
            </div>
            @if($selected_language==1)
                {!! Form::open() !!}
                {!! Form::hidden('selected_id',$selected_id) !!}



                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">

                                <div class="th">{{ trans('cms::cms.id') }}</div>
                                <div class="th">{{ trans('cms::cms.name') }}</div>
                                <div class="th">{{ trans('cms::cms.parent') }}</div>
                                <div class="th">{{ trans('cms::cms.disable') }}</div>
                                <div class="th">{{ trans('cms::cms.hide') }}</div>
                                <div class="th">{{ trans('cms::cms.link_to') }}</div>
                                <div class="th"></div>
                            </div>
                        </div>






                        <div class="tbody">

                            {{--@if (count($oResults))--}}
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($menu_items as $item)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}

                                    @if($item->type == 1 && $item->article['title']=='')
                                    @else
                                    <div class="tr {{ $class }}">

                                        <div class="td"><label>{!! trans('cms::cms.id') !!} : </label><p>{{ $item->id }}</p></div>
                                        <div class="td"><label>{!! trans('cms::cms.name') !!} : </label><p>{{ $item->name }}</p></div>
                                        <div class="td"><label>{!! trans('cms::cms.parent') !!} : </label><p>{{ $item->cms_menus_items['name'] }}</p></div>
                                        <div class="td"><label>{!! trans('cms::cms.disable') !!} : </label><p><i class="{{ $disable_icons[$item->disable] }}"></i></p></div>
                                        <div class="td"><label>{!! trans('cms::cms.hide') !!} : </label><p><i class="{{ $hide_icons[$item->hide] }}"></i></p></div>
                                        <div class="td"><label>{!! trans('cms::cms.link_to') !!} : </label>
                                            @if($item->type == 0)
                                            page  ({{ $item->page['title'] }})
                                            @elseif($item->type == 1)
                                            article ({{ $item->article['title'] }})
                                            @elseif($item->type == 2)
                                            form ({{ $item->form['name'] }})
                                            @endif
                                            </div>

                                        <div class="td">
                                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete  link")) return false;','class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_menu_item_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$item->id ]) !!}
                                        </div>

                                        </div>
                                    @endif
                                    @endforeach

                            </div>
                    </div>

                    <div class="tableFooter">

                    </div>
                </div>
                {!! Form::close() !!}
            @else

                {!! Form::open(['url'=>'/cms/menus/save-items-translate']) !!}
                {!! Form::hidden('selected_id',$selected_id) !!}
                <table border="0" class="table table-bordered">
                    <thead>
                    <th>{{ trans('cms::cms.id') }}</th>
                    <th>{{ trans('cms::cms.name') }}</th>
                    <th>

                        {!! Form::hidden('selected_language',$selected_language) !!}
                        {!! Form::submit('save '.$languages[$selected_language].' translate',["name"=>'save_menu_name_translate','class'=>'btn btn-primary btn-flat' ]) !!}
                    </th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($menu_items as $item)
                        @if($item->type == 1 && $item->article['title']=='')
                        @else
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>


                                <td>
                                    {!! Form::text('translate_name['.$item->id.']',(isset($item->cms_menus_items_languages->first()->translate))? $item->cms_menus_items_languages->first()->translate:'',['placeholder'=>$item->name .' ( '.$languages[$selected_language].' ) ']) !!}</td>


                                <td>
                                    {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                {!! Form::close() !!}



            @endif
        </div>


        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('cms::cms.the_render_menu') }}</span>
            </div>
            <div class="panel-body" id="preview_menu_div">


                <div class="dropdown" style="position:relative">

                    {!! $menu_preview !!}

                </div>


            </div>

            <div class="panel-body">
                {!! $render_menu_html !!}
            </div>
        </div>
</div>
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>
@stop
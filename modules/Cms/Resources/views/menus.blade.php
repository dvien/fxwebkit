@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.menuBuilder') }}</h1>
                
{!! Form::open(['url'=>asset('cms/menus/menus'),'method'=>'get','class'=>'language_select_form']) !!}
    {!! Form::hidden('selected_id',$selected_id) !!}
    {!! Form::select('selected_language',$languages,$selected_language,['class'=>'language_select']) !!}
    {!! Form::submit('translate',["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}
    
{!! Form::close() !!}
	</div>


@if($selected_id != 0)


<div class="table-info">
    <div class="table-header">
        <div class="table-caption">

            {!! Form::button('add link',["id"=>'show_add_menu_item_button','onclick'=>'window.location.href="/cms/menus/edit-menu-item/0/'.$selected_id.'";','class'=>'btn btn-primary btn-flat' ]) !!}
                  
                        @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                        </div>
                        @endif
        </div>
    </div>
    @if($selected_language==1)
    {!! Form::open() !!}
    {!! Form::hidden('selected_id',$selected_id) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>parent </th>
            <th> disable</th>
            <th>hide</th>
            <th>link to page</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($menu_items as $item)
                <tr>
                    <td >{{ $item->id }}</td>
                    <td >{{ $item->name }}</td>
                    <td> {{ $item->cms_menus_items['name'] }}</td>
                    <td ><i class="{{ $disable_icons[$item->disable] }}"></i></td>
                    <td ><i class="{{ $hide_icons[$item->hide] }}"></i></td>
                    <td >
                        @if($item->type == 0)
                        page  ({{ $item->page['title'] }})
                        @else
                        article ({{ $item->article['title'] }})
                        @endif
                    </td>
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete  link")) return false;','class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_menu_item_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$item->id ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
        @else

    {!! Form::open(['url'=>'/cms/menus/save-items-translate']) !!}
    {!! Form::hidden('selected_id',$selected_id) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>
                
                {!! Form::hidden('selected_language',$selected_language) !!}
                {!! Form::submit('save '.$languages[$selected_language].' translate',["name"=>'save_menu_name_translate','class'=>'btn btn-primary btn-flat' ]) !!}
            </th>
            <th></th>
            </thead>
            <tbody>
                @foreach($menu_items as $item)
                <tr>
                    <td >{{ $item->id }}</td>
                    <td >{{ $item->name }}</td>
                    
                
                         <td>
         {!! Form::text('translate_name['.$item->id.']',(isset($item->cms_menus_items_languages->first()->translate))? $item->cms_menus_items_languages->first()->translate:'',['placeholder'=>$item->name .' ( '.$languages[$selected_language].' ) ']) !!}</td>
                  
                    
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_menu_item_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$item->id ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!} 
        
        
        
        @endif
</div>


<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">the render menu preview  </span>
    </div>
    <div class="panel-body" id="preview_menu_div">
        
        
        
        <div class="dropdown" style="position:relative">
            
   {!! $menu_preview !!}
   
</div>
   
        
    </div>
    
    <div class="panel-body"  >
        {!! $render_menu_html !!}
    </div>
</div>

@endif
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>
@stop
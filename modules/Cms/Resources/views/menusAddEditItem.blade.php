@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.menuBuilder') }}</h1>
                
	</div>


@if($selected_id != 0)
<div id="add_menu_item_form_all_div">
     
    {!! Form::open(['url'=>asset('cms/menus/insert-new-menu-item'),'class'=>'form']) !!}
    <div class="form_head_div">
        add link to this menu
    </div>
    
    <div class="form_body_div">
        
        <div class="from_row_div">
            <label class="form_lable">
            {!! Form::radio('type', 0, ($menu_item===0 || $menu_item->type)? false:true,['checked'=>'true']) !!}
            </label>
            {!! Form::select('page_id',$pages,($menu_item===0 || $menu_item->type)? 0:$menu_item->page_id,['class'=>'form-control ']) !!}
        </div>
                
        <div class="from_row_div">
            <label class="form_lable">
               link to article
                {!! Form::radio('type',1, ($menu_item!==0 && $menu_item->type)? true:false ) !!}
            </label>
            {!! Form::select('article_id',$articles,($menu_item!==0 && $menu_item->type)? $menu_item->page_id:0,['class'=>'form-control ']) !!}
        </div>
        
        <div class="from_row_div">
            {!! Form::label('item_name_input','link name',['class'=>'form_lable']) . Form::text('item_name_input',  ($menu_item===0)? '':$menu_item->name,  ['placeholder' => 'menu item name']) !!}
        </div>
        
        <div class="from_row_div">
            {!!  Form::label('parent_item_id','the parent link',['class'=>'form_lable']) .Form::select('parent_item_id',array_add(($menu_items)?$menu_items->lists('name','id'):[],0,'select parent'),($menu_item===0)? 0:$menu_item->parent_item_id,['class'=>'form-control ']) !!}
        </div>

        <div class="from_row_div">
            {!!  Form::label('disable',' disable or enable',['class'=>'form_lable']) .Form::select('disable',$disable_array, ($menu_item===0)? 0:$menu_item->disable,['class'=>'form-control ']) !!}
        </div>

        <div class="from_row_div">
            {!!   Form::label('hide','hide or show',['class'=>'form_lable']) .Form::select('hide',$hide_array, ($menu_item===0)? 0:$menu_item->hide,['class'=>'form-control ']) !!}
        </div>

        <div class="form_row_div">
            {!! Form::hidden('selected_id',$selected_id ) !!}
            @if($menu_item === 0)
            {!! Form::submit('add link',["name"=>'add_menu_item_submit','class'=>'btn btn-primary' ]) !!}
            @else
            {!! Form::button('save edit',["type"=>"submit","value"=>$menu_item->id ,"name"=>'edit_menu_item_id','class'=>'btn btn-primary' ]) !!}
            
            @endif
        </div>
        
    </div><!-- .form_body_div -->
{!! Form::close() !!}
</div>


@endif
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>
@stop
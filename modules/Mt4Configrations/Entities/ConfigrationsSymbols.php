<?php namespace Modules\Mt4Configrations\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ConfigrationsSymbols extends Model {

    protected $table = 'configrations_symbols';
    public $timestamps = false;
    protected $fillable = ['id',
       // 'name',
        'securities_id',
        'symbol',
        'description',
        'source',
        'currency',
        'type',
        'digits',
        'trade',
        'background_color',
        'count',
        'count_original',
        'external_unused',
        'realtime',
        'starting',
        'expiration',
   //     'sessions',
        'profit_mode',
        'profit_reserved',
        'filter',
        'filter_counter',
        'filter_limit',
        'filter_smoothing',
        'filter_reserved',
        'logging',
        'spread',
        'spread_balance',
        'exemode',
        'swap_enable',
        'swap_type',
        'swap_long',
        'swap_short',
        'swap_rollover3days',
        'contract_size',
        'tick_value',
        'tick_size',
        'stops_level',
        'gtc_pendings',
        'margin_mode',
        'margin_initial',
        'margin_maintenance',
        'margin_hedged',
        'margin_divider',
        'point',
        'multiply',
        'bid_tickvalue',
        'ask_tickvalue',
        'long_only',
        'instant_max_volume',
        'margin_currency',
        'freeze_level',
        'margin_hedged_strong',
        'value_date',
        'quotes_delay',
        'swap_openprice',
        'swap_variation_margin',
      //      'unused'
    ];




}
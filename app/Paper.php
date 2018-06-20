<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

use Carbon\Carbon; 


class Paper extends Model {

    use Translatable;

    public $translatedAttributes = ['title', 'text_preview', 'text'];

    public $translationModel = 'App\PaperTranslation';

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */

    protected $table    = 'papers';
    
    protected $guarded = [];


//    public static function boot()
//    {
//        parent::boot();
//
//        Paper::observe(new UserActionsObserver);
//    }
    
    public function tag()
    {
        return $this->hasOne('App\Tags', 'id', 'tag_id');
    }

    public function albumImages()
    {
        return $this->hasMany('App\Album', 'paper_id', 'id');
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if($input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['date'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }

}
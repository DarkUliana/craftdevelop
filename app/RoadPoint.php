<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 



class RoadPoint extends Model {

    use Translatable;

    public $translatedAttributes = ['name'];

    public $translationModel = 'App\RoadPointTranslation';

    public $translationForeignKey = 'roadpoint_id';

    protected $table = 'roadpoints';
    protected $guarded = [];


    public static function boot()
    {
        parent::boot();

        RoadPoint::observe(new UserActionsObserver);
    }
    
    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if($input != '') {
            $this->attributes['date'] = Carbon::createFromFormat('m/Y', $input)->format('Y-m-d');
        }else{
            $this->attributes['date'] = '';
        }
    }

    public function setDoneAttribute($value)
    {
        $this->attributes['done'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {

        return new Carbon($input);
    }

    public function tag()
    {
        return $this->hasOne('App\Tags', 'id', 'tag_id');
    }

    public function cards()
    {
        return $this->hasMany('App\RoadCard', 'roadpoint_id', 'id');
    }
    
}
<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

class RoadCard extends Model {

    use Translatable;

    public $translatedAttributes = ['title', 'text'];

    public $translationModel = 'App\RoadCardTranslation';

    public $translationForeignKey = 'roadcard_id';

    protected $table = 'roadcards';

    protected $guarded = [];
    

    public static function boot()
    {
        parent::boot();

        RoadCard::observe(new UserActionsObserver);
    }

    public function setDoneAttribute($value)
    {
        $this->attributes['done'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public function roadpoint()
    {
        return $this->hasOne('App\RoadPoint', 'id', 'roadpoint_id');
    }

    public function translations()
    {
        return $this->hasMany('App\RoadCardTranslation', 'roadcard_id', 'id');
    }

}
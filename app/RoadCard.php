<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

class RoadCard extends Model {

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
    
    
    
}
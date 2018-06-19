<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Album extends Model {

    

    

    protected $table    = 'album';
    
    protected $fillable = ['image'];
    

    public static function boot()
    {
        parent::boot();

        Album::observe(new UserActionsObserver);
    }
    
    
    
    
}
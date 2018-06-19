<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Tags extends Model {

    

    

    protected $table    = 'tags';
    
    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        Tags::observe(new UserActionsObserver);
    }
    
    
    
    
}
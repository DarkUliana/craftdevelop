<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Messages extends Model {

    

    

    protected $table    = 'messages';
    
    protected $fillable = [
          'name',
          'email',
          'message'
    ];
    

    public static function boot()
    {
        parent::boot();

        Messages::observe(new UserActionsObserver);
    }
    
    
    
    
}
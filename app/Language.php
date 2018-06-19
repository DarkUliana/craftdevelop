<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'language';
    
    protected $fillable = [
          'code',
          'name',
          'active'
    ];
    

    public static function boot()
    {
        parent::boot();

        Language::observe(new UserActionsObserver);
    }
    
    
    
    
}
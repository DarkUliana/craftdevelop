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
    
    public function roadpoints()
    {
        return $this->hasMany('App\Roadpoint', 'tag_id', 'id');
    }
    
    
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AlbumImage extends Model {

    

    

    protected $table    = 'albumimage';
    
    protected $fillable = [
          'paper_id',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        AlbumImage::observe(new UserActionsObserver);
    }
    
    
    
    
}
<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


class Key extends Model {

    use Translatable;

    public $translatedAttributes = ['name'];

    public $translationModel = 'App\KeyTranslation';

    public $translationForeignKey = 'key_id';

    protected $table    = 'key';
    
    protected $guarded = [];
    

    public static function boot()
    {
        parent::boot();

        Key::observe(new UserActionsObserver);
    }
    
    
    
    
}
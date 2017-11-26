<?php

namespace App;
use Translatable;
use Illuminate\Database\Eloquent\Model;

class Translations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'translations';

    protected $fillable = [
        'slug', 'status'
    ];

    public $translatedAttributes = ['name','content'];
}

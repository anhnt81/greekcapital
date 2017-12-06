<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gcapital extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gcapital';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content','icon','locale'
    ];
}

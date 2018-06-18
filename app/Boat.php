<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $table = 'boats';

    protected $primaryKey = 'bid';

    protected $fillable = [
        'bid',
        'name',
        'model',
        'length',
        'width',
    ];

    public function clients()
    {
        return $this->belongsTo('App\Boat');
    }
}

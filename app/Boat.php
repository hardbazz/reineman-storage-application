<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $table = 'boats';

    protected $primaryKey = 'bid';

    protected $fillable = [
        'bid',
        'sid',
        'name',
        'model',
        'length',
        'width'
    ];

    public function clients()
    {
        return $this->belongsTo('App\Boat');
    }

    public function storage()
    {
        return $this->belongsTo('App\Boat');
    }
}

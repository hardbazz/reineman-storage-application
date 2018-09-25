<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    protected $table = 'boats';

    protected $primaryKey = 'bid';

    protected $fillable = [
        'bid',
        'cid',
        'name',
        'model',
        'length',
        'width',
        'photo'
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Storage extends Model
{
    protected $table = 'storage';

    protected $primaryKey = 'sid';

    protected $fillable = [
        'bid',
        'spot',
        'reserved'
    ];

    public function clients()
    {
        return $this->belongsTo('App\Storage');
    }

    public function boats()
    {
        return $this->belongsTo('App\Storage');
    }
}

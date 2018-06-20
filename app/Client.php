<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $primaryKey = 'cid';

    protected $fillable = [
        'bid',
        'firstname',
        'lastname',
        'street',
        'housenumber',
        'zipcode',
        'city',
        'phone',
        'email'
    ];

    public function boats()
    {
        return $this->belongsTo('App\Client');
    }

    public function storage()
    {
        return $this->belongsTo('App\Client');
    }
}

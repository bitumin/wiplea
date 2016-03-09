<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'religion_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /* Relationships */
    public function recipients()
    {
        return $this->belongsTo('App\Religion');
    }

    /* Accessors */

    /* Mutators */

    /* Scopes */
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
        return $this->hasMany('App\Recipient');
    }

    /* Accessors */

    /* Mutators */

    /* Scopes */
}

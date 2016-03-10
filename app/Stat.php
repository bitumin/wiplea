<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '', '', '',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    /* Relationships */

    /* Accessors */

    /* Mutators */

    /* Scopes */
}

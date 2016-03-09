<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'curator_email', 'check_date',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'curator_email',
    ];

    /* Relationships */
    public function pleas()
    {
        return $this->hasMany('App\Plea');
    }

    /* Accessors */

    /* Mutators */

    /* Scopes */
}

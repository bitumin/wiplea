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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['check_at', 'created_at', 'updated_at', 'deleted_at'];


    /* Relationships */
    public function pleas()
    {
        return $this->hasMany('App\Plea');
    }

    /* Accessors */

    /* Mutators */

    /* Scopes */
}

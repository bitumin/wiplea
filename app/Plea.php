<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'goal_id', 'recipient_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    /* Relationships */
    public function recipient()
    {
        return $this->belongsTo('App\Recipient');
    }

    public function goal()
    {
        return $this->belongsTo('App\Goal');
    }

    /* Accessors */

    /* Mutators */

    /* Scopes */
}

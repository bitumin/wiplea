<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plea extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'is_public', 'goal_id', 'recipient_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['is_public'];

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

    /**
     * Scope a query to only include public pleas.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsPublic($query)
    {
        return $query->where('is_public', true);
    }
}

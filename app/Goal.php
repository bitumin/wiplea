<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'text', 'curator_email', 'check_at' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'curator_email', 'check_token' ];

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
    /**
     * Set the correctly formatted check at date.
     *
     * @param  string  $value
     * @return string
     */
    public function setCheckAtAttribute($value)
    {
        $this->attributes['check_at'] = Carbon::createFromTimestampUTC(strtotime($value));
    }

    /* Scopes */
}

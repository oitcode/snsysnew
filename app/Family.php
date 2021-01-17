<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'family';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'family_id';

    protected $fillable = [
        'family_head',
        'family_code',
        'check_digit',
        'address',
        'creator_id',
        'comment',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    /*
     * family table.
     *
     */
    public function worker()
    {
        return $this->hasOne('App\Worker', 'family_id', 'family_id');
    }
}

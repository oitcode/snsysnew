<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'worker';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'worker_id';

    protected $fillable = [
        'name', 'family_id',
        'address', 'email', 'contact_number', 'country',
        'diksha_date', 'ritwik_name', 'swastyayani_date',
        'citizenship_number', 'pan_number',
        'worker_type', 'panja_issue_date',
        'last_panja_renew_date', 'next_panja_renew_date',
        'creator_id', 'comment',
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
    public function family()
    {
        return $this->belongsTo('App\Family', 'family_id', 'family_id');
    }

    /*
     * oblate table.
     *
     */
    public function oblates()
    {
        return $this->hasMany('App\Oblate', 'worker_id', 'worker_id');
    }


    /*-------------------------------------------------------------------------
     * More
     *-------------------------------------------------------------------------
     *
     */

    public function getTotalOblates()
    {
        return count($this->oblates);
    }
}

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
        'name', 'dob', 'contact_number', 'email', 'address',
        'nationality', 'worker_type', 'comment', 'creator_id',
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
}

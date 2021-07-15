<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oblate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oblate';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'oblate_id';

    protected $fillable = [
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * family table.
     *
     */
    public function family()
    {
        return $this->belongsTo('App\Family', 'family_id', 'family_id');
    }

    /*
     * worker table.
     *
     */
    public function worker()
    {
        return $this->belongsTo('App\Worker', 'worker_id', 'worker_id');
    }

    /*
     * remittance_line table.
     *
     */
    public function remittanceLines()
    {
        return $this->hasMany('App\RemittanceLine', 'oblate_id', 'oblate_id');
    }
}

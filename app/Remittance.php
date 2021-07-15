<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'remittance';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'remittance_id';

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
     * remittance_line table.
     *
     */
    public function remittanceLines()
    {
        return $this->hasMany('App\RemittanceLine', 'remittance_id', 'remittance_id');
    }
}

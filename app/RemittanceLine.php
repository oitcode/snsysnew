<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemittanceLine extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'remittance_line';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'remittance_line_id';

    protected $fillable = [
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * remittance table.
     *
     */
    public function remittance()
    {
        return $this->belongsTo('App\Remittance', 'remittance_id', 'remittance_id');
    }

    /*
     * oblate table.
     *
     */
    public function oblate()
    {
        return $this->belongsTo('App\Oblate', 'oblate_id', 'oblate_id');
    }
}

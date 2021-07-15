<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MiscTrait;

class Family extends Model
{
    use MiscTrait;

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
     * worker table.
     *
     */
    public function worker()
    {
        return $this->hasOne('App\Worker', 'family_id', 'family_id');
    }

    /*
     * oblate table.
     *
     */
    public function oblates()
    {
        return $this->hasMany('App\Oblate', 'family_id', 'family_id');
    }

    /*
     * remittance table.
     *
     */
    public function remittances()
    {
        return $this->hasMany('App\Remittance', 'family_id', 'family_id');
    }

    /* Other methods */
    public function getTenDFamCode()
    {
        $checkDigit = $this->familyCodeCheckDigit($this->family_code);

        $tenDFamCode = $this->family_code . $checkDigit;

        return $tenDFamCode;
    }
}

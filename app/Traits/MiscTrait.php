<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;


use App\Worker;
use App\Family;
use App\Oblate;
use App\Remittance;
use App\RemittanceLine;

trait MiscTrait
{
    /**
     * Return total amount for a given remittance line.
     *
     * @param object remittanceLine
     *
     * @return decimal
     */
    public function getRmtLineTotalAmount($remittanceLine)
    {
        $total = 0.0;

        $total += $remittanceLine->swastyayani;
        $total += $remittanceLine->istavrity;
        $total += $remittanceLine->acharyavrity;
        $total += $remittanceLine->dakshina;
        $total += $remittanceLine->sangathani;
        $total += $remittanceLine->ananda_bazar;
        $total += $remittanceLine->pranami;
        $total += $remittanceLine->swastyayani_awasista;
        $total += $remittanceLine->ritwiki;
        $total += $remittanceLine->utsav;
        $total += $remittanceLine->diksha_pranami;
        $total += $remittanceLine->acharya_pranami;
        $total += $remittanceLine->parivrity;
        $total += $remittanceLine->misc;

	return $total;
    }

    /**
     * Get the total amount for a given remittance.
     *
     * @param integer rmtId
     *
     * @return decimal
     */
    public function getRmtTotalAmount($rmtId)
    {
	$total = 0.0;

	if (($remittance = Remittance::find($rmtId)) === null) {
	    /* Todo: Do something senssible instead of just dying. */
	    die("Error: Cannot find remiitance with id: $rmtId<br/>");
	}

	$remittanceLines = $remittance->remittance_lines;

	foreach ($remittanceLines as $remittanceLine) {
	    $total += $this->getRmtLineTotalAmount($remittanceLine);
	}

	return $total;
    }

    /* Calculate check digit of a family code */
    public function familyCodeCheckDigit($familyCode)
    {
        $familyCode = strval($familyCode);

        /* See that the family code is of correct pattern */
        $nineDFamCodePattern = '/^4700[0-9]{5,5}$/';
        if (! preg_match($nineDFamCodePattern, $familyCode)) {
            return -1;
        }

        /**
         * Below algorithm to compute the check digit 
         * for a family code has been taken from 
         * Satsang Deoghar cobol code.
         */

        $checkDigit = -1;

        /* Pay careful attention:
         *
         * 1. First two digits are ignored.
         * 2. wsMship starts from rightside
         *    so, wsMship2 is familyCode[8].
         */
        $wsMship1 = $familyCode[9-1];
        $wsMship2 = $familyCode[9-2];
        $wsMship3 = $familyCode[9-3];
        $wsMship4 = $familyCode[9-4];
        $wsMship5 = $familyCode[9-5];
        $wsMship6 = $familyCode[9-6];
        $wsMship7 = $familyCode[9-7];

        $wsDgtTot = $wsMship1 * 2 + $wsMship2 * 3 +
            $wsMship3 * 4 + $wsMship4 * 5 +
            $wsMship5 * 6 + $wsMship6 * 7 +
            $wsMship7 * 8;

        $wsRemainder = $wsDgtTot % 11;

        if ($wsRemainder == 0 || $wsRemainder == 1) {
          $checkDigit = 0;
        } else {
          $checkDigit = 11 - $wsRemainder;
        }

        return $checkDigit;
    }

    public function createNewFamily($familyInfo, $isNew = true)
    {
        /* Get the highes family code. */
        $highest = Family::max('family_code');

        $family = new Family;

        if ($isNew == true) {
            $family->family_code = $highest + 1;
            $family->check_digit = $this->familyCodeCheckDigit($highest + 1);
        } else {

            if (!$this->isValidTenDFamCode($familyInfo['family_code'])) {
                return null;
            }
            
            $tenDFamCode = $familyInfo['family_code'];
	          $nineDFamCode = substr($tenDFamCode, 0, 9);
	          $checkDigit = substr($tenDFamCode, 9, 1);

            $family->family_code = $nineDFamCode;
            $family->check_digit = $checkDigit;
        }


        $family->family_head = $familyInfo['submitter_name'];
        $family->address = $familyInfo['address'];

        $family->creator_id = Auth::id();
        $family->comment = 'auto generated';

        $family->save();

        return $family;
    }

    public function getOblateFromAFamily($oblateName, $family)
    {
        $oblates = $family->oblates;

        foreach ($oblates as $oblate) {
            if ($oblate->name == $oblateName) {
                return $oblate;
            }
        }

        return null;
    }

    public function addOblateToAFamily($oblateName, $worker, $family)
    {
        $oblate = new Oblate;

        $oblate->name = $oblateName;
        $oblate->worker_id = $worker->worker_id;
        $oblate->family_id = $family->family_id;

        $oblate->save();

        return $oblate;
    }

    public function getRitwikByName($searchName)
    {
        $ritwiks = Worker::where('worker_type', 'r')->get();

        foreach ($ritwiks as $ritwik) {
            if ($ritwik->name == $searchName) {
                return $ritwik;
            }
        }

        return null;
    }

    public function createNewRitwik($ritwikName)
    {
        $familyInfo = [
            'submitter_name' => $ritwikName,
            'address' => 'UNKNOWN',
        ];

        $family = $this->createNewFamily($familyInfo);

        $worker = new Worker;
        $worker->family_id = $family->family_id;


        $worker->name = $ritwikName;
        $worker->address = 'UNKNOWN';
        //$worker->email = 'unknown@example.com';
        $worker->contact_number = '00000';
        $worker->country = 'UNKNOWN';

        $worker->diksha_date = '2000-01-01';
        $worker->ritwik_name = 'DMY_SPR';
        $worker->swastyayani_date = '2000-01-01';

        $worker->citizenship_number = '00000';
        $worker->pan_number = '00000';

        $worker->worker_type = 'r';
        $worker->panja_issue_date = '2000-01-01';
        $worker->last_panja_renew_date = '2000-01-01';
        $worker->next_panja_renew_date = '2050-01-01';

        $worker->creator_id = Auth::id();

        $worker->save();

        return $worker;
    }

    public function isValidTenDFamCode($familyCode)
    {
        $tenDFamCodePattern = '/^4700[0-9]{6,6}$/';
        if (! preg_match($tenDFamCodePattern, $familyCode)) {
            return false;
        }

        $tenDFamCode = $familyCode;
	      $nineDFamCode = substr($tenDFamCode, 0, 9);
	      $checkDigit = substr($tenDFamCode, 9, 1);


        if ($checkDigit == $this->familyCodeCheckDigit($nineDFamCode)) {
            return true;
        }

        return false;
    }
}

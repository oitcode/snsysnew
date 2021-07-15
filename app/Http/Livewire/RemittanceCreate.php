<?php

namespace App\Http\Livewire;

use App\Traits\MiscTrait;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Family;
use App\Remittance;
use App\RemittanceLine;

class RemittanceCreate extends Component
{
    use MiscTrait;

    public $totalNumOfRows = 1;

    public $remittanceLines = array();

    public $family_code;
    public $submitter_name;
    public $address;
    public $total;

    public function render()
    {
        return view('livewire.remittance-create');
    }

    public function addRow()
    {
        $this->totalNumOfRows++;
    }

    public function store()
    {
        $family = null;

	      /*
	      |----------------------------------------------------------------------
	      | Steps:
	      |----------------------------------------------------------------------
	      |
	      | 1. Validate input data
	      | 2. Create bank voucher record
	      | 3. If new family, create one.
	      |    Else, check if family exists, else create one.
	      | 4. Check if main submitter oblate exist in family. Else create one.
	      | 5. Create remittance with foreign keys to bank voucher, family and
	      |    submitter oblate .
	      |
	      | By now the main info part is done. Now individual lines need to be
	      | stored.
	      |
	      | 6. Check if individual oblate exists in family. Else create one.
	      |    While doing so check if ritwik exists, else create one.
	      | 7. Create remittance_line record with foreign keys to remittance
	      |    and oblate.
	      | 8. Fill in the amounts and save to database.
	      |
	      | 9. Repeat steps 6-8 for all individual lines.
	      |
	      */

        $validatedData = $this->validate([
            'family_code' => 'required',
            'submitter_name' => 'required',
            'address' => 'required',
            'total' => 'required',


            /* TODO: Remittancelines validation */
            'remittanceLines.0.swastyayani' => 'nullable|integer',
        ]);


        if ($validatedData['family_code'] == 'new') {
            ;
        } else if (! $this->isValidTenDFamCode($validatedData['family_code'])) {
            session()->flash('message', 'Ouch. Invalid Family Code');
            return;
        }

        DB::beginTransaction();

        try {
            /* Create Family if needed. */
            if ($validatedData['family_code'] == 'new') {
                $family = $this->createNewFamily($validatedData);
            } else {
                $family = Family::firstWhere('family_code', substr($validatedData['family_code'], 0, 9));
                if ($family == null) {
                    $familyInfo = [
                        'family_code' => $validatedData['family_code'],
                        'submitter_name' => $validatedData['submitter_name'],
                        'address' => $validatedData['address'],
                    ];
                    $family = $this->createNewFamily($familyInfo, false);
                }
            }

            /* Create Remittance. */
            $remittance = $this->createRemittance($family, $validatedData);

            /* Create Remittance Lines. */
            foreach ($this->remittanceLines as $remittanceLine) {
                $this->createRemittanceLine($remittance, $remittanceLine);
            }

            DB::commit();
            $this->resetInputFields();
            session()->flash('message', 'Remittance Added.');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('message', 'Whoops catched.');
        }

        return;
    }

    public function createOblate($name, $workerName)
    {
        $oblate = new Oblate;

        $oblate->name = $name;
    }

    public function checkOblateInFamily()
    {

    }

    public function checkRitwikExists($ritwikName)
    {

    }

    public function createRitwik($ritwikName)
    {

    }

    public function createRemittance($family, $validateData)
    {
        $remittance = new Remittance; 

        $remittance->family_id = $family->family_id;
        $remittance->submitted_date = '2020-10-10';
        $remittance->total_amount = $validateData['total'];

        $remittance->save();

        return $remittance;
    }

    public function createRemittanceLine($remittance, $remittanceLineInfo)
    {
        $ritwik = null;
        $oblate = null;
        $family = $remittance->family;

        $oblateName = $remittanceLineInfo['oblate_name'];
        $ritwikName = $remittanceLineInfo['ritwik_name'];

        if (($ritwik = $this->getRitwikByName($ritwikName)) == null) {
            $ritwik = $this->createNewRitwik($ritwikName);
        }

        if (($oblate = $this->getOblateFromAFamily($oblateName, $family)) == null) {
            $oblate = $this->addOblateToAFamily($oblateName, $ritwik, $family);
        }

        $remittanceLine = new RemittanceLine; 

        $remittanceLine->remittance_id = $remittance->remittance_id;
        $remittanceLine->oblate_id = $oblate->oblate_id;

        $remittanceLine->istavrity = $remittanceLineInfo['istavrity'];

        if (array_key_exists('swastyayani', $remittanceLineInfo)) {
            $remittanceLine->swastyayani = $remittanceLineInfo['swastyayani'];
        }

        if (array_key_exists('acharyavrity', $remittanceLineInfo)) {
            $remittanceLine->acharyavrity = $remittanceLineInfo['acharyavrity'];
        }

        if (array_key_exists('dakshina', $remittanceLineInfo)) {
            $remittanceLine->dakshina = $remittanceLineInfo['dakshina'];
        }

        if (array_key_exists('sangathani', $remittanceLineInfo)) {
            $remittanceLine->sangathani = $remittanceLineInfo['sangathani'];
        }

        if (array_key_exists('ananda_bazar', $remittanceLineInfo)) {
            $remittanceLine->ananda_bazar = $remittanceLineInfo['ananda_bazar'];
        }

        if (array_key_exists('pranami', $remittanceLineInfo)) {
            $remittanceLine->pranami = $remittanceLineInfo['pranami'];
        }

        if (array_key_exists('swastyayani_awasista', $remittanceLineInfo)) {
            $remittanceLine->swastyayani_awasista = $remittanceLineInfo['swastyayani_awasista'];
        }

        if (array_key_exists('ritwiki', $remittanceLineInfo)) {
            $remittanceLine->ritwiki = $remittanceLineInfo['ritwiki'];
        }

        if (array_key_exists('utsav', $remittanceLineInfo)) {
            $remittanceLine->utsav = $remittanceLineInfo['utsav'];
        }

        if (array_key_exists('diksha_pranami', $remittanceLineInfo)) {
            $remittanceLine->diksha_pranami = $remittanceLineInfo['diksha_pranami'];
        }

        if (array_key_exists('acharya_pranami', $remittanceLineInfo)) {
            $remittanceLine->acharya_pranami = $remittanceLineInfo['acharya_pranami'];
        }

        if (array_key_exists('parivrity', $remittanceLineInfo)) {
            $remittanceLine->parivrity = $remittanceLineInfo['parivrity'];
        }

        if (array_key_exists('misc', $remittanceLineInfo)) {
            $remittanceLine->misc = $remittanceLineInfo['misc'];
        }

        $remittanceLine->save();

        return $remittanceLine;
    }

    public function getPreviousRemittanceData()
    {
        $validatedData = $this->validate([
            'family_code' => 'required',
        ]);

        /*
         * Check if family code is valid
         */

        $tenDFamCode = $validatedData['family_code'];
	      $nineDFamCode = substr($tenDFamCode, 0, 9);
	      $checkDigit = substr($tenDFamCode, 9, 1);

        if ($this->familyCodeCheckDigit($nineDFamCode) == -1) {
            session()->flash('message', 'Family Code Not Valid.' . $validatedData['family_code']);
            return;
        }

        if ($this->familyCodeCheckDigit($nineDFamCode) != $checkDigit) {
            session()->flash('message', 'Check digit invalid');
            return;
        }

        $family = Family::where('family_code', $nineDFamCode)->first();

        $remittances = $family->remittances;
        foreach ($remittances as $remittance) {
            $i = 0;
            foreach ($remittance->remittanceLines as $remittanceLine){
                $this->remittanceLines[$i]['oblate_name'] = $remittanceLine->oblate->name;
                $this->remittanceLines[$i]['ritwik_name'] = $remittanceLine->oblate->worker->name;
                $this->remittanceLines[$i]['swastyayani'] = $remittanceLine->swastyayani;
                $this->remittanceLines[$i]['istavrity'] = $remittanceLine->istavrity;
                $this->remittanceLines[$i]['misc'] = $remittanceLine->misc;
                
                $i++;
                $this->totalNumOfRows++;
            }
            break;
        }
    }

    public function resetInputFields()
    {
        $this->totalNumOfRows = 1;

        $this->family_code = "";
        $this->submitter_name = "";
        $this->address = "";
        $this->total = "";

        $this->remittanceLines = array();
    }
}

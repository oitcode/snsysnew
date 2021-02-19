<div>
    <!-- Toolbar -->
    <div class="bg-alert" style="background-color: #eee; margin-bottom: 10px; padding: 5px; font-size: 10px;">
      <span id="id_prev_rmt">Previous</span>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <span id="id_next_rmt">Next</span>
      &nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <div class="row">
      <div class="col-sm-6">
        <table class="table table-striped table-bordered table-condensed pwo-form-table">
          <thead>
            <tr>
              <th>Family code</th>
              <th>Person name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" class="nwo-std-frminp" name="family-code" id="id_mi_fcode" value="{{ old('family-code') }}"/></td>
              <td><input type="text" class="nwo-std-name nwo-std-frminp nwo-std-frminp-lx" name="submitter-name" id="id_mi_sname" value="{{ old('submitter-name') }}"/></td>
            </tr>
            <tr>
              <td class=""><strong>Address</strong></td>
              <td>
                <input type="text" class="nwo-std-upper nwo-std-frminp nwo-std-frminp-lx" name="submitter-address" id="id_mi_saddress" value="{{ old('submitter-address') }}"/>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    
      <div class="col-sm-4">
        <table class="table table-condensed table-bordered">
          <thead>
            <tr>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="number" step="1" min="1" class="nwo-std-frminp" name="submitted-total" id="id_mi_total" value="{{ old('submitted-total') }}"/>
              </td>
            </tr>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    
    </div>


    <!-- Remittance Lines -->
    <h4>Breakdown</h4>

    <!-- Toolbar -->
    <div class="bg-alert" style="background-color: #eee; margin-bottom: 10px; padding: 5px; font-size: 10px;">
      <button class="btn btn-sm" wire:click="clearSheet">
        <i class="fas fa-eraser"></i>
        Clear
      </button>
      <button class="btn btn-sm" wire:click="addRow">
        <i class="fas fa-plus"></i>
        Person
      </button>
    </div>


    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="">Person</th>
            <th class="">Ritwik Name</th>
            <th class="">Swst</th>
            <th class="">Ist</th>
            <th class="">Acvt</th>
            <th class="">Dks</th>
            <th class="">Sng</th>
            <th class="">Rit</th>
            <th class="">Pra</th>
            <th class="">Swaw</th>
            <th class="">AB</th>
            <th class="">Pvt</th>
            <th class="">Msc</th>
            <th class="">Uts</th>
            <th class="">Dpr</th>
            <th class="">Apr</th>
      
            <th class="">---</th>
          </tr>
        </thead>

        <tbody>
		      <!-- New way: Use 2D Array -->
          @for ($i=0; $i < $totalNumOfRows; $i++)
            <tr class="m-0 p-0">
              <td class="m-0 p-0 border">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.oblateName" />
              </td>
              <td class="m-0 p-0 border">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.ritwikName" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" min="1" step="1" class="border-0" wire:model="remittanceLines.{{ $i }}.swastyayani" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.istavrity" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.acharyavrity" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.dakshina" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.sangathani" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.ritwiki" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.pranami" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.swastyayani_awasista" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.ananda_bazar" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.parivrity" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.misc" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.utsav" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.diksha_pranami" />
              </td>
              <td class="m-0 p-0 border">
                <input type="number" class="border-0" wire:model="remittanceLines.{{ $i }}.acharya_pranami" />
              </td>
              <td class="m-0 p-0 border">
		            <span class="nwo-rmc-rc">C</span>
              </td>
            </tr>
          @endfor
          <!-- Additional rows go here -->
        </tbody>
      </table>
    </div>

    <br />

    <!-- For multiple months -->
    <label for="id_for_months">Months</label>
    <input type="number" min="1" step="1" class="nwo-std-5pc swo-std-frm-inp" id="id_for_months" name="for-months" value="1" required />
    <input type="submit"  id="submit_remit" class="btn btn-success btn-sm" value="Submit"> <br />
</div>

<div class="card card-outline card-primary">
  <div class="card-header">
    <h2 class="card-title h5">Remittance Create</h2>
    <div class="card-tools">
      <button class="btn btn-sm btn-danger" wire:click="$emit('exitRemittanceCreateMode')">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <div class="card-body">

    <div>
      @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
      @if (session()->has('message1'))
        <div class="alert alert-success">
          {{ session('message1') }}
        </div>
      @endif
    </div>


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
              <td>
                <input type="text" class="nwo-std-frminp" wire:model="family_code"/>
                @error('family_code') <span class="error">{{ $message }}</span> @enderror
                <a href="" wire:click.prevent="getPreviousRemittanceData">
                  Get old
                </a>
              </td>

              <td>
                <input type="text" class="nwo-std-name nwo-std-frminp nwo-std-frminp-lx" wire:model="submitter_name" />
                @error('submitter_name') <span class="error">{{ $message }}</span> @enderror
              </td>
            </tr>
            <tr>
              <td class=""><strong>Address</strong></td>
              <td>
                <input type="text" class="nwo-std-upper nwo-std-frminp nwo-std-frminp-lx" wire:model="address"/>
                @error('address') <span class="error">{{ $message }}</span> @enderror
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
                <input type="number" step="1" min="1" class="nwo-std-frminp" wire:model="total"/>
                @error('total') <span class="error">{{ $message }}</span> @enderror
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
    <div class="bg-alert" style="background-color: #eee; margin-bottom: 10px; padding: 5px; font-size: 10px; width: 25%;">
      <button class="btn btn-sm" wire:click="clearSheet">
        <i class="fas fa-eraser"></i>
        Clear
      </button>
      <button class="btn btn-sm" wire:click="addRow">
        <i class="fas fa-plus"></i>
        Person
      </button>
    </div>


    <div class="table-responsive" style="overflow: auto;">
      <table class="" style="">
        <thead>
          <tr class="border p-1">
            <th class="border p-2" style="max-width: 11vw !important;">Person</th>
            <th class="border p-2" style="max-width: 11vw !important;">Ritwik Name</th>
            <th class="border p-2" style="max-width: 4vw !important;">Swst</th>
            <th class="border p-2" style="max-width: 4vw !important;">Ist</th>
            <th class="border p-2" style="max-width: 4vw !important;">Acvt</th>
            <th class="border p-2" style="max-width: 4vw !important;">Dks</th>
            <th class="border p-2" style="max-width: 4vw !important;">Sng</th>
            <th class="border p-2" style="max-width: 4vw !important;">Rit</th>
            <th class="border p-2" style="max-width: 4vw !important;">Pra</th>
            <th class="border p-2" style="max-width: 4vw !important;">Swaw</th>
            <th class="border p-2" style="max-width: 4vw !important;">AB</th>
            <th class="border p-2" style="max-width: 4vw !important;">Pvt</th>
            <th class="border p-2" style="max-width: 4vw !important;">Msc</th>
            <th class="border p-2" style="max-width: 4vw !important;">Uts</th>
            <th class="border p-2" style="max-width: 4vw !important;">Dpr</th>
            <th class="border p-2" style="max-width: 4vw !important;">Apr</th>
      
            <th class="border p-2" style="max-width: 4vw !important;">---</th>
          </tr>
        </thead>

        <tbody>
		      <!-- New way: Use 2D Array -->
          @for ($i=0; $i < $totalNumOfRows; $i++)
            <tr class="m-0 p-0" style="">
              <td class="m-0 p-1 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.oblate_name" style="width: 11vw; font-color: blue;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.ritwik_name" style="width: 11vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" min="1" step="1" class="border-0" wire:model="remittanceLines.{{ $i }}.swastyayani"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.istavrity"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.acharyavrity"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.dakshina"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.sangathani"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.ritwiki"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.pranami"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.swastyayani_awasista"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.ananda_bazar"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.parivrity"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.misc"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.utsav"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.diksha_pranami"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-0 border" style="max-width: 100%;">
                <input type="text" class="border-0" wire:model="remittanceLines.{{ $i }}.acharya_pranami"  style="width: 4vw;"/>
              </td>
              <td class="m-0 p-2 border" style="max-width: 100%;">
                <i class="fas fa-trash text-danger"></i>
                @if (false)
		            <span class="nwo-rmc-rc">
                C</span>
                @endif
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
    <input type="submit" class="btn btn-success btn-sm" value="Submit" wire:click="store">
    <input type="submit" class="btn btn-danger btn-sm" value="Cancel" wire:click="$emit('exitRemittanceCreateMode')">
</div>

  </div>
</div>

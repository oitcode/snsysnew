<x-card-component>
  <x-slot name="cardTitle">
    Remittance Detail
  </x-slot>

  <x-slot name="cardToolBox">
    <small class="text-muted">
    </small>
  </x-slot>




	<table class="table table-condensed table-striped table-bordered">
	  <thead>
	  </thead>
	  <tbody>
	    <tr>
	      <th class="col-sm-2">Family Code</th>
	      <td>{{ $remittance->family->getTenDFamCode() }}</td>
	    </tr>
	    <tr>
	      <th>Serial Num</th>
	      <td>{{ $remittance->remittance_id }}</td>
	    </tr>
	    <tr>
	      <th>Submitter</th>
	      <td style="color: #444;">
	        {{ $remittance->family->family_head }}
        </td>
	    </tr>
	    <tr>
	      <th>Address</th>
	      <td>
	        {{ $remittance->family->address }}
        </td>
	    </tr>
	    <tr>
	      <th>Date</th>
	      <td>{{ $remittance->created_at }}</td>
	    </tr>
	    <tr>
	      <th>Total</th>
	      <td>{{ $remittance->total_amount }}</td>
	    </tr>
	  </tbody>
	</table>





      <div class="table-responsive">
	      <table class="table table-condensed table-bordered table-hover">
	        <thead>
	          <tr class="info" style="font-size: 12px;">
	            <th>Name</th>
	            <th>Ritwik name</th>
	            <th>Swst</th>
	            <th>Ist</th>
	            <th>Acvt</th>
	            <th>Dks</th>
	            <th>Sng</th>
	            <th>AB</th>
	            <th>Pra</th>
	            <th>Swaw</th>
	            <th>Rit</th>
	            <th>Uts</th>
	            <th>Dpr</th>
	            <th>Apr</th>
	            <th>Pvt</th>
	            <th>Msc</th>
	          </tr>
	        </thead>
	        <tbody>
	          @foreach ( $remittance->remittanceLines as $remittanceLine)
		    <tr>
		      <td style="font-size:13px;">
		        {{ $remittanceLine->oblate->name }}
		      </td>
		      <td style="font-size:13px;">
		        {{ $remittanceLine->oblate->worker->name }}
		      </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->swastyayani != null && $remittanceLine->swastyayani > 0)
			      {{ $remittanceLine->swastyayani }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			      {{ $remittanceLine->istavrity }}
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->acharyavrity != null && $remittanceLine->acharyavrity > 0)
			      {{ $remittanceLine->acharyavrity }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->dakshina != null && $remittanceLine->dakshina > 0)
			      {{ $remittanceLine->dakshina }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->sangathani != null && $remittanceLine->sangathani > 0)
			      {{ $remittanceLine->sangathani }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->ananda_bazar != null && $remittanceLine->ananda_bazar > 0)
			      {{ $remittanceLine->ananda_bazar }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->pranami != null && $remittanceLine->pranami > 0)
			      {{ $remittanceLine->pranami }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->swastyayani_awasista != null && $remittanceLine->swastyayani_awasista > 0)
			      {{ $remittanceLine->swastyayani_awasista }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->ritwiki != null && $remittanceLine->ritwiki > 0)
			      {{ $remittanceLine->ritwiki }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->utsav != null && $remittanceLine->utsav > 0)
			      {{ $remittanceLine->utsav }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->diksha_pranami != null && $remittanceLine->diksha_pranami > 0)
			      {{ $remittanceLine->diksha_pranami }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->acharya_pranami != null && $remittanceLine->acharya_pranami > 0)
			      {{ $remittanceLine->acharya_pranami }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->parivrity != null && $remittanceLine->parivrity > 0)
			      {{ $remittanceLine->parivrity }}
                @else
			    @endif
			  </td>
		      <td class="nwo-sm-num">
			    @if ($remittanceLine->misc != null && $remittanceLine->misc > 0)
			      {{ $remittanceLine->misc }}
                @else
			    @endif
			  </td>
		    </tr>
	          @endforeach
	        </tbody>
	      </table>
      </div>




  @if (false)
  <div class="px-2">
    <div class="row p-2 border">
      <div class="col-md-3">
        Family Code
      </div>
      <div class="col-md-9">
        {{ $family->family_code }}
      </div>
    </div>

    <div class="row p-2 border">
      <div class="col-md-3">
        Family Head
      </div>
      <div class="col-md-6">
        @if (! $editFamilyHeadFlag)
          {{ $family->family_head }}
        @else
          <input type="text" class="form-control" wire:model="familyHeadUpdatedName" />
        @endif
      </div>
      <div class="col-md-3">
        @if (! $editFamilyHeadFlag)
          <button class="btn btn-sm btn-outline-primary rounded-circle" wire:click="editFamilyHead">
            <i class="fas fa-pencil-alt"></i>
          </button>
        @else
          <button class="btn btn-sm btn-success" wire:click="updateFamilyHead">
            Save
          </button>
          <button class="btn btn-sm btn-danger" wire:click="exitEditFamilyHeadMode">
            Cancel
          </button>
        @endif
      </div>
    </div>

    <div class="row p-2 border">
      <div class="col-md-3">
        Address
      </div>
      <div class="col-md-6">
        @if (! $editFamilyAddressFlag)
          {{ $family->address }}
        @else
          <input type="text" class="form-control" wire:model="familyUpdatedAddress" />
        @endif
      </div>
      <div class="col-md-3">
        @if (! $editFamilyAddressFlag)
          <button class="btn btn-sm btn-outline-primary rounded-circle" wire:click="editFamilyAddress">
            <i class="fas fa-pencil-alt"></i>
          </button>
        @else
          <button class="btn btn-sm btn-success" wire:click="updateFamilyAddress">
            Save
          </button>
          <button class="btn btn-sm btn-danger" wire:click="exitEditFamilyAddressMode">
            Cancel
          </button>
        @endif
      </div>
    </div>
  </div>
  @endif
</x-card-component>

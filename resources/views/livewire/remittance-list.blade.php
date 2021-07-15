<div>
  <div class="clearfix">
    <div class="float-left">
      @if (false and $searchToolboxDisplay)
        <button class="btn btn-sm px-3 text-info" wire:click="hideSearchToolbox">
          <i class="fas fa-ban"></i>
          Hide Filter
        </button>

        <button class="btn btn-sm btn-info px-3" wire:click="">
          <i class="fas fa-sign-in-alt"></i>
          Go
        </button>
      @else
        <button class="btn btn-sm px-3 text-info" wire:click="showSearchToolbox">
          <i class="fas fa-search"></i>
          Show Filter
        </button>
      @endif
    </div>

    <div class="float-left">
      <button class="btn btn-sm px-3 text-info" wire:click="">
        Export To Excel
      </button>
    </div>
  </div>
  
  @if (false and $searchToolboxDisplay or false)
    <div class="row bg-light border" style="margin: auto;">
      <div class="col-md-4 border p-0">
        <div class="px-2 py-1">
          Name
        </div>
        <div>
          <input type="text" class="form-control rounded-0" wire:model.defer="searchWorkerName" />
        </div>
      </div>

      <div class="col-md-2 border p-0">
        <div class="px-2 py-1">
          Type
        </div>
        <div>
          <select class="form-control rounded-0" wire:mode.defer="searchWorkerType">
            <option>---</option>
            <option>SPR</option>
            <option>Adharjyu</option>
            <option>Jajak</option>
          </select>
        </div>
      </div>

      <div class="col-md-3 border p-0">
        <div class="px-2 py-1">
          Phone
        </div>
        <div>
          <input type="text" class="form-control rounded-0" wire:model.defer="searchWorkerPhone" />
        </div>
      </div>

      <div class="col-md-3 border p-0">
        <div class="px-2 py-1">
          Email
        </div>
        <div>
          <input type="email" class="form-control rounded-0" wire:model.defer="searchWorkerEmail" />
        </div>
      </div>
    </div>
  @endif
  
  <div>
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-muted">
            <th>Date</th>
            <th>ID</th>
            <th>Family Code</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Action</th>
          </tr>
        </thead>
        @if (true)
        <tbody>
          @if ($remittances != null && count($remittances) > 0)
            @foreach ($remittances as $remittance)
              <tr>
                <td>
                  {{ $remittance->created_at }}
                </td>
                <td>
                  {{ $remittance->remittance_id }}
                </td>
                <td>
                  <a href="" wire:click.prevent="$emit('displayRemittance', {{ $remittance }})" class="">
                    {{ $remittance->family->getTenDFamCode() }}
                  </a>
                </td>
                <td>
                  <small class="text-muted">
                    {{ $remittance->family->family_head }}
                  </small>
                </td>
                <td>
                  <small class="text-muted">
                    {{ $remittance->total_amount }}
                  </small>
                </td>
                <td>
                  <span class="btn btn-tool btn-sm" wire:click="">
                    <i class="fas fa-pencil-alt text-info"></i>
                  </span>
  
                  <span class="btn btn-tool btn-sm" wire:click="">
                    <i class="fas fa-trash text-danger"></i>
                  </span>
                </td>
              </tr>
            @endforeach
          @else
            <small class="text-muted">
              No records
            </small>
          @endif
        </tbody>
        @endif
      </table>
    </div>
  </div>
</div>

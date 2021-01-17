<div>
  <div class="clearfix">
    <div class="float-left">
      @if ($searchToolboxDisplay)
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
  </div>
  
  @if ($searchToolboxDisplay)
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
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($workers != null && count($workers) > 0)
            @foreach ($workers as $worker)
              <tr>
                <td>
                  {{ $worker->worker_id }}
                </td>
                <td>
                  <a href="" wire:click.prevent="$emit('displayWorker', {{ $worker->worker_id }})">
                  {{ $worker->name }}
                  </a>
                </td>
                <td>
                  <small class="text-muted">
                    {{ $worker->worker_type }}
                  </small>
                </td>
                <td>
                  {{ $worker->contact_number }}
                </td>
                <td>
                  {{ $worker->email }}
                </td>
                <td>
                  {{ $worker->address }}
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
      </table>
    </div>
  </div>
</div>

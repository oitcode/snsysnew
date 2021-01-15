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

<div>
  <div class="table-responsive">
    <table class="table table-sm table-hover">
      <thead>
        <tr class="text-muted">
          <th>Family Code</th>
          <th>Family Head</th>
          <th>Address</th>
          <th>Comment</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($families as $family)
          <tr> 
            <td>
              <a href="" wire:click.prevent="$emit('displayFamily', {{ $family->family_id }})">
                {{ $family->family_code }}
              </a>
            </td>
            <td>
              {{ $family->family_head }}
            </td>
            <td>
              <small class="text-muted">
                {{ $family->address }}
              </small>
            </td>
            <td>
              {{ $family->comment }}
            </td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
</div>

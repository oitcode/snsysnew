<x-card-component>
  <x-slot name="cardTitle">
    Worker Detail
  </x-slot>

  <x-slot name="cardToolBox">
    <small class="text-muted mr-3">
      Toolbox
    </small>
    <small class="text-muted mr-3">
      SMS
    </small>
    <small class="text-muted mr-3">
      Email
    </small>
    <small class="text-muted mr-3">
      Edit
    </small>
  </x-slot>

	<table class="table table-condensed table-striped table-bordered">
	  <thead>
	  </thead>
	  <tbody>
	    <tr>
	      <th class="col-md-4">Name</th>
	      <td>{{ $worker->name }}</td>
	    </tr>
	    <tr>
	      <th>Family Code</th>
	      <td>{{ $worker->family->getTenDFamCode() }}</td>
	    </tr>
	    <tr>
	      <th>Address</th>
	      <td>{{ $worker->address }}</td>
	    </tr>
	    <tr>
	      <th>Total Oblates</th>
	      <td>{{ $worker->getTotalOblates() }}</td>
	    </tr>
	    <tr>
	      <th>Panja Issue Date</th>
	      <td>{{ $worker->panja_issue_date }}</td>
	    </tr>
	    <tr>
	      <th>Last Panja Issue Date</th>
	      <td>{{ $worker->last_panja_renew_date }}</td>
	    </tr>
	    <tr>
	      <th>Next Panja Issue Date</th>
	      <td>{{ $worker->next_panja_renew_date }}</td>
	    </tr>
	  </tbody>
	</table>

  <h2 class="p-1 m-1">Oblates</h2>
  <hr />

  <p class="p-2">
  @foreach ($worker->oblates as $oblate)
    {{  $oblate->name }}
    <br />
  @endforeach
  </p>
</x-card-component>

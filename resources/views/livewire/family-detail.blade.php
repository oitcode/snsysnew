<x-card-component>
  <x-slot name="cardTitle">
    Family Detail
  </x-slot>

  <x-slot name="cardToolBox">
    <small class="text-muted">
      &nbsp;
    </small>
  </x-slot>

  <div class="px-2">
    <div class="row p-2 border">
      <div class="col-md-3">
        Family Code
      </div>
      <div class="col-md-9">
        {{ $family->getTenDFamCode() }}
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

    <div class="p-2 my-3">
      <h2 class="h5">Oblates</h2>
      @foreach ($family->oblates as $oblate)
        <span class="text-primary">
          {{ $oblate->name }}
        </span>
        <br />
      @endforeach
      <hr />
      <h2 class="h5">Remittances</h2>
      @foreach ($family->remittances as $remittance)
        <span class="text-primary">
          {{ $remittance->remittance_id }}
        </span>
        <br />
      @endforeach
    </div>
  </div>
</x-card-component>

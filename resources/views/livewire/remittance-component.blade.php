<div wire:ignore.self>
  <div class="row">
    <div class="col-md-12">
      <x-card-component>
        <x-slot name="cardTitle">
          Remittance
        </x-slot>
      
        <x-slot name="cardToolBox">
          <button class="btn btn-sm btn-outline-info px-3" wire:click="enterCreateMode">
            <i class="fas fa-plus"></i>
          </button>
  
          <button class="btn btn-sm px-3 text-info" wire:click="">
            <i class="fas fa-search"></i>
            Search
          </button>

          <button class="btn btn-sm btn-outline-info px-3" wire:click="refreshOwn">
            <i class="fas fa-redo-alt"></i>
            Refresh
          </button>
        </x-slot>
      
        @if (true)
          @if ($createMode)
            @livewire('remittance-create')
          @elseif ($displayMode)
            @livewire('remittance-detail', ['remittance' => $displayingRemittance, ])
          @else
            @livewire('remittance-list')
          @endif
        @endif
      </x-card-component>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
    </div>
  </div>
</div>

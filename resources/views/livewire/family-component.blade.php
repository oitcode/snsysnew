<div class="row">
  <div class="col-md-6">
    <x-card-component>
      <x-slot name="cardTitle">
        Family
      </x-slot>
    
      <x-slot name="cardToolBox">
        <button class="btn btn-sm btn-outline-info px-3" wire:click="create">
          <i class="fas fa-plus"></i>
        </button>

        <button class="btn btn-sm px-3 text-info" wire:click="">
          <i class="fas fa-search"></i>
          Search
        </button>
      </x-slot>
    
      @livewire('family-list')
    </x-card-component>
  </div>
  <div class="col-md-6">
    @if (false)
      @livewire('family-create')
    @endif

    @if (false)
      @livewire('family-detail', ['family' => $displayingFamily,])
    @endif
  </div>
</div>

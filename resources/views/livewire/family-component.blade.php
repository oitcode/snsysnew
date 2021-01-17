<div wire:ignore.self>
  <div class="row">
    <div class="col-md-12">
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
  </div>
  <div class="row">
    <div class="col-md-12">
      @if (false)
        @livewire('family-create')
      @endif
  
      @if ($familyDetailMode)
        @livewire('family-detail', ['family' => $displayingFamily,], key(rand()))
      @endif
    </div>
  </div>
</div>

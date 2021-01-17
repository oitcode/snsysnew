<div>
  <div class="row">
    <div class="col-md-12">
      <x-card-component>
        <x-slot name="cardTitle">
          Worker
        </x-slot>
      
        <x-slot name="cardToolBox">
          <button class="btn btn-sm btn-outline-info px-3" wire:click="create">
            <i class="fas fa-plus"></i>
          </button>
        </x-slot>
      
        @livewire('worker-list')
      </x-card-component>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      @if ($workerCreateMode)
        @livewire('worker-create')
      @endif
  
      @if ($workerDetailMode)
        @livewire('worker-detail', ['worker' => $displayingWorker,], key(rand()))
      @endif
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h2 class="h5">{{ $cardTitle }}</h2>
  </div>
  <div class="card-body p-0">
    <div class="card-tools p-2 border">
      {{ $cardToolBox }}
    </div>

    {{ $slot }}
  </div>
</div>

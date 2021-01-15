<div class="card card-outline card-primary">
  <div class="card-header">
    <h2 class="card-title h5">Worker Create</h2>
    <div class="card-tools">
      <button class="btn btn-sm btn-danger" wire:click="$emit('exitWorkerCreateMode')">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <div class="card-body">
        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   wire:model.defer="name"
                   placeholder="Name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Ritwik name field --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('ritwikName') ? 'is-invalid' : '' }}"
                   wire:model.defer="ritwikName"
                   placeholder="Ritwik Name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @if($errors->has('ritwikName'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('ritwikName') }}</strong>
                </div>
            @endif
        </div>

        {{-- Address --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                   wire:model.defer="address"
                   placeholder="Address">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-marker-alt"></span>
                </div>
            </div>
            @if($errors->has('address'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('address') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   wire:model.defer="email"
                   placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Phone field --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('contactNumber') ? 'is-invalid' : '' }}"
                   wire:model.defer="contactNumber"
                   placeholder="Contact Number">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            @if($errors->has('contactNumber'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('contactNumber') }}</strong>
                </div>
            @endif
        </div>

        {{-- Worker type field --}}
        <div class="input-group mb-3">
            <select class="custom-control form-control" wire:model.defer="workerType">
              <option>---</option>
              <option>Ritwik</option>
              <option>Adharjyu</option>
              <option>Jajak</option>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="">Type</span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Country field --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                   wire:model.defer="country">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-flag"></span>
                </div>
            </div>
            @if($errors->has('country'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('country') }}</strong>
                </div>
            @endif
        </div>

        {{-- Comment field --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                   wire:model.defer="comment"
                   placeholder="Comment">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-flag"></span>
                </div>
            </div>
            @if($errors->has('comment'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('comment') }}</strong>
                </div>
            @endif
        </div>


        {{-- Submit/Done/Save button --}}
        <button type="submit" class="btn btn-block btn-flat btn-primary" wire:click="store">
            <span class="fas fa-user-plus"></span>
            Done
        </button>
  </div>
</div>

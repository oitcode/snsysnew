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
    <div class="row">
      <div class="col-md-6">
        <h2 class="h6">Personal Details</h2>
        {{-- Name field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   wire:model.defer="name"
                   placeholder="Name" autofocus>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Address --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-marker-alt"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                   wire:model.defer="address"
                   placeholder="Address">
            @if($errors->has('address'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('address') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   wire:model.defer="email"
                   placeholder="Email">
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Phone field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('contactNumber') ? 'is-invalid' : '' }}"
                   wire:model.defer="contactNumber"
                   placeholder="Contact Number">
            @if($errors->has('contactNumber'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('contactNumber') }}</strong>
                </div>
            @endif
        </div>


        {{-- Country field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-flag"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                   wire:model.defer="country">
            @if($errors->has('country'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('country') }}</strong>
                </div>
            @endif
        </div>
      </div>
      <div class="col-md-6 pt-4">
        {{-- Citizenship field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-arrow-right"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('citizenshipNumber') ? 'is-invalid' : '' }}"
                   wire:model.defer="citizenshipNumber"
                   placeholder="Citizenship Number">
            @if($errors->has('citizenshipNumber'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('citizenshipNumber') }}</strong>
                </div>
            @endif
        </div>

        {{-- PAN field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-arrow-right"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('panNumber') ? 'is-invalid' : '' }}"
                   wire:model.defer="panNumber"
                   placeholder="PAN Number">
            @if($errors->has('panNumber'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('panNumber') }}</strong>
                </div>
            @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h2 class="h6">Oblation Details</h2>

        <h3 class="h6"><small>Diksha</small></h3>
        {{-- Initiation Date --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                </div>
            </div>
            <input type="date" class="form-control {{ $errors->has('dikshaDate') ? 'is-invalid' : '' }}"
                   wire:model.defer="dikshaDate">
            @if($errors->has('dikshaDate'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('dikshaDate') }}</strong>
                </div>
            @endif
        </div>

        {{-- Ritwik name field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('ritwikName') ? 'is-invalid' : '' }}"
                   wire:model.defer="ritwikName"
                   placeholder="Ritwik Name" autofocus>
            @if($errors->has('ritwikName'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('ritwikName') }}</strong>
                </div>
            @endif
        </div>

        <h3 class="h6"><small>Swastyayani</small></h3>
        {{-- Initiation Date --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                </div>
            </div>
            <input type="date" class="form-control {{ $errors->has('swastyayaniDate') ? 'is-invalid' : '' }}"
                   wire:model.defer="swastyayaniDate">
            @if($errors->has('swastyayaniDate'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('swastyayaniDate') }}</strong>
                </div>
            @endif
        </div>

        {{-- Ritwik name field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('swastyayaniRitwikName') ? 'is-invalid' : '' }}"
                   wire:model.defer="swastyayaniRitwikName"
                   placeholder="Ritwik Name">
            @if($errors->has('swastyayaniRitwikName'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('swastyayaniRitwikName') }}</strong>
                </div>
            @endif
        </div>
      </div>
      <div class="col-md-6">
        <h2 class="h6">Panja Details</h2>
        <h3 class="h6"><small>Worker Type</small></h3>
        {{-- Worker type field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <small>
                  Type
                </small>
              </div>
            </div>
            <select class="custom-control form-control" wire:model.defer="workerType">
              <option>---</option>
              <option>SPR</option>
              <option>Adharjyu</option>
              <option>Jajak</option>
            </select>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
        <h2 class="h6"><small>Panja Dates</small></h2>
        {{-- Panja Issue Date field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    @if (false)
                      <span class="fas fa-user"></span>
                    @endif
                    <small>
                      Panja issue Date
                    </small>
                </div>
            </div>
            <input type="date" class="form-control {{ $errors->has('panjaIssueDate') ? 'is-invalid' : '' }}"
                   wire:model.defer="panjaIssueDate" />
            @if($errors->has('panjaIssueDate'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('panjaIssueDate') }}</strong>
                </div>
            @endif
        </div>

        {{-- Las Panja Renew Date field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    @if (false)
                      <span class="fas fa-user"></span>
                    @endif
                    <small>
                      Last Renew Date
                    </small>
                </div>
            </div>
            <input type="date" class="form-control {{ $errors->has('lastPanjaRenewDate') ? 'is-invalid' : '' }}"
                   wire:model.defer="lastPanjaRenewDate" />
            @if($errors->has('lastPanjaRenewDate'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('lastPanjaRenewDate') }}</strong>
                </div>
            @endif
        </div>

        {{-- Next Panja Renew Date field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    @if (false)
                      <span class="fas fa-user"></span>
                    @endif
                    <small>
                      Next Renew Date
                    </small>
                </div>
            </div>
            <input type="date" class="form-control {{ $errors->has('nextPanjaRenewDate') ? 'is-invalid' : '' }}"
                   wire:model.defer="nextPanjaRenewDate" />
            @if($errors->has('nextPanjaRenewDate'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('nextPanjaRenewDate') }}</strong>
                </div>
            @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <hr />
        {{-- Comment field --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-flag"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                   wire:model.defer="comment"
                   placeholder="Comment">
            @if($errors->has('comment'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('comment') }}</strong>
                </div>
            @endif
        </div>
      </div>
    </div>

    {{-- Submit/Done/Save button --}}
    <button type="submit" class="btn btn-block btn-flat btn-primary" wire:click="store">
        <span class="fas fa-user-plus"></span>
        Done
    </button>

  </div>
</div>

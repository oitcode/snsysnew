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

    <div>
      @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
      @if (session()->has('message1'))
        <div class="alert alert-success">
          {{ session('message1') }}
        </div>
      @endif
    </div>

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

        {{-- Family Code --}}
        <div class="input-group mb-3">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            <input type="text" class="form-control {{ $errors->has('family_code') ? 'is-invalid' : '' }}"
                   wire:model.defer="family_code"
                   placeholder="Family Code" autofocus>
            @if($errors->has('family_code'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('family_code') }}</strong>
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
            <input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}"
                   wire:model.defer="contact_number"
                   placeholder="Contact Number">
            @if($errors->has('contact_number'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('contact_number') }}</strong>
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
            <input type="text" class="form-control {{ $errors->has('citizenship_number') ? 'is-invalid' : '' }}"
                   wire:model.defer="citizenship_number"
                   placeholder="Citizenship Number">
            @if($errors->has('citizenship_number'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('citizenship_number') }}</strong>
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
            <input type="text" class="form-control {{ $errors->has('pan_number') ? 'is-invalid' : '' }}"
                   wire:model.defer="pan_number"
                   placeholder="PAN Number">
            @if($errors->has('pan_number'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('pan_number') }}</strong>
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
            <input type="date" class="form-control {{ $errors->has('diksha_date') ? 'is-invalid' : '' }}"
                   wire:model.defer="diksha_date">
            @if($errors->has('diksha_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('diksha_date') }}</strong>
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
            <input type="text" class="form-control {{ $errors->has('ritwik_name') ? 'is-invalid' : '' }}"
                   wire:model.defer="ritwik_name"
                   placeholder="Ritwik Name" autofocus>
            @if($errors->has('ritwik_name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('ritwik_name') }}</strong>
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
            <input type="date" class="form-control {{ $errors->has('swastyayani_date') ? 'is-invalid' : '' }}"
                   wire:model.defer="swastyayani_date">
            @if($errors->has('swastyayani_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('swastyayani_date') }}</strong>
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
            <select class="custom-control form-control" wire:model.defer="worker_type">
              <option>---</option>
              <option>SPR</option>
              <option>Adharjyu</option>
              <option>Jajak</option>
            </select>
            @if($errors->has('worker_type'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('worker_type') }}</strong>
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
            <input type="date" class="form-control {{ $errors->has('panja_issue_date') ? 'is-invalid' : '' }}"
                   wire:model.defer="panja_issue_date" />
            @if($errors->has('panja_issue_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('panja_issue_date') }}</strong>
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
            <input type="date" class="form-control {{ $errors->has('last_panja_renew_date') ? 'is-invalid' : '' }}"
                   wire:model.defer="last_panja_renew_date" />
            @if($errors->has('last_panja_renew_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('last_panja_renew_date') }}</strong>
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
            <input type="date" class="form-control {{ $errors->has('next_panja_renew_date') ? 'is-invalid' : '' }}"
                   wire:model.defer="next_panja_renew_date" />
            @if($errors->has('next_panja_renew_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('next_panja_renew_date') }}</strong>
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

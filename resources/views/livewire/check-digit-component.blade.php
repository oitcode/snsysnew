<div wire:ignore.self>
  <div class="row">
    <div class="col-md-12">
      <x-card-component>
        <x-slot name="cardTitle">
          Check Digit
        </x-slot>
      
        <x-slot name="cardToolBox">
          <button class="btn btn-sm px-3 text-info" wire:click="resetInputFields">
            <i class="fas fa-redo-alt"></i>
            Reset
          </button>
        </x-slot>

        <div class="row p-3">
          <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <input type="text" class="form-control {{ $errors->has('tenDFamCode') ? 'is-invalid' : '' }}"
                       wire:model.defer="tenDFamCode"
                       placeholder="10 Digit Family Code" autofocus>
                @if($errors->has('tenDFamCode'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('tenDFamCode') }}</strong>
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary" wire:click="checkIfValid">
                <span class="fas fa-user-plus"></span>
                Check Validity
            </button>
            @if ($displayResult1)
              @if ($valid)
                <span class="text-success">
                  Valid
                </span>
              @else
                <span class="text-danger">
                  Wrong
                </span>
              @endif
            @endif
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <input type="text" class="form-control {{ $errors->has('nineDFamCode') ? 'is-invalid' : '' }}"
                       wire:model.defer="nineDFamCode"
                       placeholder="9 Digit Family Code" autofocus>
                @if($errors->has('nineDFamCode'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('nineDFamCode') }}</strong>
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary" wire:click="getCheckDigit">
                <span class="fas fa-user-plus"></span>
                Get Check Digit
            </button>
            @if ($displayResult2)
              <strong class="text-primary">
              {{ $checkDigit }}
              </strong>
            @endif
          </div>
        </div>
      
      </x-card-component>
    </div>
  </div>
</div>

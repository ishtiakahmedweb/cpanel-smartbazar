@push('styles')
<style>
    /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #28a745;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #28a745;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
</style>
@endpush

<div class="tab-pane active" id="item-fraud" role="tabpanel">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="fraud[allow_per_hour]">Allow orders per hour per IP</label>
                <x-input name="fraud[allow_per_hour]" :value="$fraud->allow_per_hour ?? 3" />
                <x-error field="fraud[allow_per_hour]" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fraud[allow_per_day]">Allow orders per day per IP</label>
                <x-input name="fraud[allow_per_day]" :value="$fraud->allow_per_day ?? 7" />
                <x-error field="fraud[allow_per_day]" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fraud[max_qty_per_product]">Max quantity each product</label>
                <x-input name="fraud[max_qty_per_product]" :value="$fraud->max_qty_per_product ?? 3" />
                <x-error field="fraud[max_qty_per_product]" />
            </div>
        </div>
    </div>
    
    <hr>
    <h5>Security & Duplicate Prevention</h5>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="d-block">Block Duplicate Orders</label>
                <input type="hidden" name="fraud[block_duplicates]" value="0">
                <label class="switch">
                    <input type="checkbox" name="fraud[block_duplicates]" value="1" {{ ($fraud->block_duplicates ?? false) ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
                <small class="d-block text-muted">Prevent users with same phone from ordering again.</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="d-block">IP Lockout After Order</label>
                <input type="hidden" name="fraud[ip_lockout_enabled]" value="0">
                <label class="switch">
                    <input type="checkbox" name="fraud[ip_lockout_enabled]" value="1" {{ ($fraud->ip_lockout_enabled ?? false) ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
                <small class="d-block text-muted">Prevent same IP from ordering for a fixed duration.</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fraud[ip_lockout_hours]">Lockout Duration (Hours)</label>
                <x-input name="fraud[ip_lockout_hours]" :value="$fraud->ip_lockout_hours ?? 72" />
                <x-error field="fraud[ip_lockout_hours]" />
            </div>
        </div>
    </div>
</div>

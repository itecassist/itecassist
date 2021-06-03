<div class="card">
    <div class="card-header">
        Profile Information
    </div>

<div class="card-body">
    <form wire:submit.prevent="saveForm">
        <div class="form-group">
            <label for="reference">References</label>
            <input type="text" class="form-control" wire:model="reference" id="reference">
            @error('reference') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" wire:model="company_name" id="company_name">
            @error('company_name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" wire:model="address" id="address" rows="5"></textarea>
            @error('address') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" class="form-control" wire:model="contact_person" id="contact_person">
            @error('contact_person') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" class="form-control" wire:model="contact_number" id="contact_number">
            @error('contact_number') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" wire:model="email" id="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" wire:model="password" id="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="is_active">Is Active</label>
            <select class="form-select form-select-sm" wire:model="is_active">
                <option value="">Select</option>
                <option value="0">No</option>
                <option value="1" selected >Yes</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </form>
</div>

</div>

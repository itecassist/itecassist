<div>
    <div class="cardmt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">Invoice</div>
                <div class="col-md-2"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInvoice">
  +
</button></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ref.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Retail</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
<div class="modal fade" id="modalInvoice" tabindex="-1" wire:ignore.self aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $modal_title }} {{ session()->get('company_name')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="@if($action=='delete') d-none @else d-block @endif">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="action_date" class="form-label">Action Date</label>
                    <input type="date" class="form-control form-control-sm" wire:model="action_date" >
                    @error('action_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control form-control-sm" wire:model="due_date" >
                    @error('action_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <input type="text" class="form-control form-control-sm" wire:model="note" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select class="form-select form-select-sm" id="product_id" wire:model="product_id">
                        <option value="">Select</option>
                        @foreach ($products as $prod)
                        <option value="{{ $prod->id }}">{{ $prod->name }} ({{ $prod->retail_price }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control form-control-sm" wire:model="description" >
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control form-control-sm" wire:model="quantity" >
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control form-control-sm" wire:model="unit" >
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="retail_price" class="form-label">Retail Price</label>
                    <input type="text" class="form-control form-control-sm" wire:model="retail_price" >
                </div>
            </div>
            <div class="col text-end">
                <br><br>
                <a href="#" wire:click="addItem">Add</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Ref.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>
        </table>
            @if($action=='delete')  Are you sure you want to delete this record? @endif

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>

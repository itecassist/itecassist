<div></div>
<div class="card mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">Email Accounts</div>
            <div class="col-md-2 text-end"><a href="#" data-bs-toggle="modal" data-bs-target="#formEmail">Create</a></div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Email</th>
                <th>Password</th>
                <th>Incoming</th>
                <th>SMTP</th>
                <th>SMTP Port</th>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->email_address }}</td>
                        <td>{{ $item->email_password }}</td>
                        <td>{{ $item->email_incoming }}</td>
                        <td>{{ $item->email_smtp }}</td>
                        <td>{{ $item->email_smtp_port }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $data->links() }}</div>
</div>
<div class="modal fade" id="formEmail" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ $modal_title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="@if($action=='delete') d-none @else d-block @endif">
                <div class="mb-3">
                    <label for="email_address" class="form-label">email_address</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_address" >
                </div>
                <div class="mb-3">
                    <label for="email_username" class="form-label">email_username</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_username" >
                </div>
                <div class="mb-3">
                    <label for="email_password" class="form-label">email_password</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_password" >
                </div>
                <div class="mb-3">
                    <label for="email_incoming" class="form-label">email_incoming</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_incoming" >
                </div>
                <div class="mb-3">
                    <label for="email_smtp" class="form-label">email_smtp</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_smtp" >
                </div>
                <div class="mb-3">
                    <label for="email_smtp_auth" class="form-label">email_smtp_auth</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_smtp_auth" >
                </div>
                <div class="mb-3">
                    <label for="email_smtp_port" class="form-label">email_smtp_port</label>
                    <input type="text" class="form-control form-control-sm" wire:model="email_smtp_port" >
                </div>
            </div>
            @if($action=='delete')  Are you sure you want to delete this record? @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn {{ $modal_btn}} btn-sm" wire:click="recordAction">{{ $modal_btn_title }}</button>
        </div>
      </div>
    </div>
  </div>
</div>

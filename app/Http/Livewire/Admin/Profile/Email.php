<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\Email as EmailDB;
use Livewire\WithPagination;

class Email extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    /** Modal */
    public $action;
    public $modal_title;
    public $modal_btn_title;
    public $modal_btn;
    /** Model */
    public $row_id;
    public $customer_id;
    public $email_address;
    public $email_username;
    public $email_password;
    public $email_incoming;
    public $email_smtp;
    public $email_smtp_auth;
    public $email_smtp_port;

    public function mount()
    {
        $this->row_id=0;
        $this->modal_title = 'Add new record';
        $this->modal_btn_title = 'Create Record';
        $this->modal_btn = 'btn-primary';
        $this->action='add';
    }

    public function render()
    {
        $data = EmailDB::where('customer_id', session()->get('id'))->orderBy('email_username', 'asc')->paginate(12);
        return view('livewire.admin.profile.email', compact('data'));
    }
}

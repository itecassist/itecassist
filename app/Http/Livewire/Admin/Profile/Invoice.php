<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Invoice as Inv;
use App\Models\InvoiceItem;
use App\Models\Product;
use Livewire\Component;


class Invoice extends Component
{

    /** Modal */
    public $action;
    public $modal_title;
    public $modal_btn_title;
    public $modal_btn;
    public $products = [];
    /**Model  Invoice*/
    public $inv_id;
    public $reference;
    public $customer_id;
    public $action_date;
    public $due_date;
    public $notes;
    /** Model InvoiceItems */
    public $item=[];


    public function mount()
    {
        $this->row_id=0;
        $this->modal_title = 'Add new record';
        $this->modal_btn_title = 'Create Record';
        $this->modal_btn = 'btn-primary';
        $this->action='add';
        $this->products = Product::orderBy('name')->get();
    }

    public function render()
    {
        if($this->inv_id>0)
        {
            $data = InvoiceItem::where('invoice_id', $this->inv_id)->get();
        }else{
            $data=collect();
        }

        return view('livewire.admin.profile.invoice', ['data'=>$data]);
    }
}

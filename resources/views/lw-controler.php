<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\RecurringInvoiceItem;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Recuring extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $products;
    /** Modal */
    public $action;
    public $modal_title;
    public $modal_btn_title;
    public $modal_btn;
    /** Model */
    public $row_id;
    public $customer_id;
    public $product_id;
    public $product_reference;
    public $name;
    public $description;
    public $unit;
    public $amount;
    /** Additional */
    public $total;

    public function mount()
    {
        $this->row_id=0;
        $this->modal_title = 'Add new record';
        $this->modal_btn_title = 'Create Record';
        $this->modal_btn = 'btn-primary';
        $this->action='add';
        $this->products =Product::orderBy('name', 'asc')->get();
    }

    public function updatedProductId()
    {
        $rec = Product::findOrFail($this->product_id);
        $this->product_reference=$rec->reference;
        $this->name=$rec->name;
        $this->description=$rec->description;
        $this->unit=$rec->unit;
        $this->amount=$rec->retail_price;
    }

    public function recordAction()
    {
        if($this->action=='delete')
        {
            RecurringInvoiceItem::destroy($this->row_id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        }else{
            $this->validate();
            $record = RecurringInvoiceItem::where('id', $this->row_id)->first();
            $fields = [
                'customer_id'=>session()->get('id'),
                'product_id'=>$this->product_id,
                'product_reference'=>$this->product_reference,
                'name'=>$this->name,
                'description'=>$this->description,
                'unit'=>$this->unit,
                'amount'=>$this->amount
            ];
            if($record !== null){
                // Update
                $record->update($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
            }else{
                // Insert
                RecurringInvoiceItem::create($fields);
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Created']);
            }
        }

        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'hide']);
    }

    public function loadModal($val, $id)
    {
        $this->loadForm($id);
        switch($val)
        {
            case 'add':
                $this->modal_btn_title = 'Add new record';
                $this->modal_title = 'Create Record';
                $this->action='add';
                $this->modal_btn = 'btn-primary';
                break;
            case 'edit':
                $this->action='edit';
                // Modal
                $this->modal_btn_title = 'Update';
                $this->modal_title = 'Update Record';
                $this->modal_btn = 'btn-primary';
                break;
            case 'delete':
                $this->action='delete';
                // Modal
                $this->modal_btn_title = 'Delete';
                $this->modal_title = 'Delete Record';
                $this->modal_btn = 'btn-danger';
                break;
        }
        $this->dispatchBrowserEvent('modal', ['modal'=>'formModal', 'action'=>'show']);
    }

    public function loadForm($id)
    {
        $rec = RecurringInvoiceItem::find($id);
        $this->row_id=$id;
        $this->product_id=$rec->product_id;
        $this->product_reference=$rec->product_reference;
        $this->name=$rec->name;
        $this->description=$rec->description;
        $this->unit=$rec->unit;
        $this->amount=$rec->amount;
    }

    public function render()
    {
        $data = RecurringInvoiceItem::where('customer_id', session()->get('id'))->get();
        return view('livewire.admin.profile.recuring', ['data'=>$data, 'products'=>$this->products]);
    }
}

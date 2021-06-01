<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Invoice as Inv;
use App\Models\InvoiceItem;
use App\Models\Product;
use Livewire\Component;
use App\Models\Counter;

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
    public $action_date;
    public $due_date;
    public $notes;
    /** Model InvoiceItems */
    public $item=[];
    public $invoice_id;
    public $product_id;
    public $product_reference;
    public $name;
    public $description;
    public $unit;
    public $quantity;
    public $retail_price;
    public $total;


    public function mount()
    {
        $this->row_id=0;
        $this->modal_title = 'Add new record';
        $this->modal_btn_title = 'Create Record';
        $this->modal_btn = 'btn-primary';
        $this->action='add';
        $this->products = Product::orderBy('name')->get();
    }

    public function updatedProductId()
    {
        $rec = Product::findOrFail($this->product_id);
        //dd($rec);
        $this->product_reference=$rec->reference;
        $this->name=$rec->name;
        $this->description=$rec->description;
        $this->unit=$rec->unit;
        $this->quantity=1;
        $this->retail_price=$rec->retail_price;
    }

    public function addItem()
    {
        if($this->inv_id==0)
        {
            $this->validate([
                'action_date'=>'required|date',
                'due_date'=>'required|date',
            ]);
            // Create Invoice
            $ref = Counter::where('name', 'invoice')->first();
            $nr = date('Y').'/'.$ref->number;
            $ref->number++;
            $ref->save();
            $inv = Inv::create([
                'reference'=>$nr,
                'customer_id'=>session()->get('id'),
                'action_date'=>$this->action_date,
                'due_date'=>$this->due_date,
                'amount'=>0,
                'is_paid'=>0,
                'notes'=>$this->notes
            ]);
            $this->inv_id=$inv->id;
        }

        InvoiceItem::create([
            'invoice_id'=>$this->inv_id,
            'product_id'=>$this->product_id,
            'product_reference'=>$this->product_reference,
            'name'=>$this->name,
            'description'=>$this->description,
            'unit'=>$this->unit,
            'quantity'=>$this->quantity,
            'retail_price'=>$this->retail_price,
            'total'=>($this->quantity * $this->retail_price)
        ]);
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

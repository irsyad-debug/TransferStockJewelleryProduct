<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Team;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use App\Models\StockTransfer as TransferringStock;
use Livewire\WithPagination;

class StockTransfer extends Component
{
    use WithPagination;
    public $product_id = "", $team_id = "", $total_transfer, $total_avail;
    public $currentPage = 1, $searchTerm;

    protected $rules = [
        'product_id' => 'required',
        'team_id' => 'required',
        'total_transfer' => 'required',
    ];

    protected $messages = [
        'product_id.required' => 'Jewellery is required.',
        'team_id.required' => 'Team is required.',
        'total_transfer.required' => 'Total transfer is required.',
    ];

    public function render()
    {
        return view('livewire.stock-transfer', [
            'teams' => Team::all(),
            'products' => Product::where('quantity_in_stock', '!=', 0)->get(),
            'transfers' => TransferringStock::with('team', 'product')->where(function ($sub_query) {
                $sub_query->whereHas('team', function($q){
                    $q->where('name', 'like', '%' . $this->searchTerm . '%');
                })->orWhereHas('product', function($q){
                    $q->where('name', 'like', '%' . $this->searchTerm . '%');
                });
            })->paginate(5),
            'search' => $this->searchTerm,
        ]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function updatedProductId()
    {
        if ($this->product_id) {
            $this->total_avail = Product::find($this->product_id)->quantity_in_stock;
        }
    }

    public function resetInputFields()
    {
        $this->product_id = "";
        $this->team_id = "";
        $this->total_transfer = "";
        $this->total_avail = "";
    }

    public function store()
    {
        $validated_data = $this->validate();

        $product = Product::find($this->product_id);

        if ($this->total_transfer > $product->quantity_in_stock) {
            session()->flash('error', 'Invalid amount! Please enter the suitable amount to be transferred.');
        } else {

            $new_total_in_stock = $product->quantity_in_stock - $this->total_transfer;
            $new_total_in_transfer = $product->quantity_in_transfer + $this->total_transfer;

            $product->update([
                'quantity_in_stock' => $new_total_in_stock,
                'quantity_in_transfer' => $new_total_in_transfer,
            ]);

            TransferringStock::create($validated_data);

            $this->resetInputFields();

            session()->flash('message', 'Stock Transferred Successfully');
        }
    }


}

<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $name, $quantity_in_stock, $description;
    public $searchTerm, $product_id;
    public $currentPage = 1, $modeAction = 'CreateMode', $disabled = "";

    protected $rules = [
      'name' => 'required',
      'quantity_in_stock' => 'required',
      'description' => 'required',
    ];

    protected $messages = [
      'name.required' => 'Jewellery Name is required.',
      'quantity_in_stock.required' => 'Total Stock for the Jewellery is required.',
      'description.required' => 'Description is required.',
    ];

    public function render()
    {
        return view('livewire.products', [
            'products' => Product::where(function ($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('description', 'like', '%'.$this->searchTerm.'%');
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

    public function resetInputFields()
    {
        $this->name = "";
        $this->quantity_in_stock = "";
        $this->description = "";
        $this->modeAction = "CreateMode";
        $this->disabled = "";
    }

    public function store()
    {
        $validatedData = $this->validate();

        Product::create($validatedData);

        session()->flash('message', 'Products Created Successfully');

        $this->resetInputFields();
    }

    public function showProduct($id)
    {
        $this->modeAction = "UpdateMode";
        $this->disabled = "disabled";
        $product = Product::find($id);

        $this->name = $product->name;
        $this->product_id = $product->id;
        $this->quantity_in_stock = $product->quantity_in_stock;
        $this->description = $product->description;
    }

    public function update()
    {
        $validatedData = $this->validate();

        $product = Product::find($this->product_id);
        $product->update($validatedData);

        session()->flash('message', 'Products Updated Successfully');
      ;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        if($id){
            Product::where('id',$id)->delete();
            session()->flash('message', 'Products Deleted Successfully.');
        }
    }



}

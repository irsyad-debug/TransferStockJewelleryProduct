<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-2">
            <input type="text" wire:model="product_id" hidden="">
            <label for="exampleFormControlInput1">Jewellery Product Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" {{ $disabled }}
                   wire:model="name">
            @error('name') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Jewellery in Stock:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Number"
                   wire:model="quantity_in_stock">
            @error('quantity_in_stock') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1">Description of Jewellery:</label>
        <textarea rows="4" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
                  wire:model="description"></textarea>
        @error('description') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
    </div>
    <div class="text-center mt-2">
        @if($modeAction == "CreateMode")
            <button wire:click.prevent="store" class="btn btn-primary">
                Add Product
            </button>
        @endif
        @if($modeAction == "UpdateMode")
            <button wire:click.prevent="resetInputFields" class="btn btn-warning">
                Reset
            </button>
            <button wire:click.prevent="update" class="btn btn-primary">
                Save Product
            </button>
        @endif
    </div>
</div>

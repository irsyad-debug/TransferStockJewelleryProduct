<div>
    @include('livewire.product.create')

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif

    <div class="input-group mt-2">
        <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" >
    </div>
    <table class="table table-bordered mt-2">
        <thead>
        <tr>
            <th>No.</th>
            <th>Product Name </th>
            <th>Desc</th>
            <th>Total in Stock </th>
            <th>Total in Transfer</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $index => $value)
            <tr>
                <td>{{ ++$index}}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->quantity_in_stock }}</td>
                <td>{{ $value->quantity_in_transfer }}</td>
                <td>
                    <button wire:click="showProduct({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links('livewire.product.products-pagination',['search' => $search]) }}
</div>

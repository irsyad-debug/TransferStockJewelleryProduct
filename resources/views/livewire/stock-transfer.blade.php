<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @include('livewire.stock-transfer.transfer')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger" style="margin-top:30px;">x
            {{ session('error') }}
        </div>
    @endif

    <div class="input-group mt-2">
        <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" >
    </div>
    <table class="table table-bordered mt-2">
        <thead>
        <tr>
            <th>No.</th>
            <th>Jewellery Product </th>
            <th>Been transferred to Team </th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transfers as $index => $value)
            <tr>
                <td>{{ ++$index}}</td>
                <td>{{ $value->product->name }}</td>
                <td>{{ $value->team->name }}</td>
                <td>{{ $value->total_transfer }}</td>
{{--                <td>--}}
{{--                    <button wire:click="showProduct({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>--}}
{{--                    <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $transfers->links('livewire.product.products-pagination',['search' => $search]) }}
</div>

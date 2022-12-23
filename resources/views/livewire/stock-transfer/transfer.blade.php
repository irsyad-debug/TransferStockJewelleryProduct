<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-2">
            <input type="text" wire:model="team_id" hidden="">
            <label for="exampleFormControlInput1">Select Jewellery to be transfer:</label>
            <select class="form-control" id="exampleFormControlInput1"
                   wire:model="product_id">
                <option value="" selected disabled> - Please Choose -
                @foreach($products as $pro)
                    <option value="{{ $pro->id }}"> {{ $pro->name }} </option>
                @endforeach
            </select>
            @error('product_id') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Select Team to receive the Jewellery:</label>
            <select class="form-control" id="exampleFormControlInput1"
                    wire:model="team_id">
                <option value="" selected disabled> - Please Choose -</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}"> {{ $team->name }} </option>
                @endforeach
            </select>
            @error('team_id') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Total Availability in Stock:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Will display total in stock of the product" disabled
                   wire:model="total_avail">
            {{--            @error('phone_num') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror--}}
        </div>
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Enter the total transfer:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Number"
                   wire:model="total_transfer">
            @error('total_transfer') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="text-center mt-2">
{{--        @if($createMode)--}}
            <button wire:click.prevent="store" class="btn btn-primary">
                Add Transfer Details
            </button>
{{--        @else--}}
{{--            <button wire:click.prevent="resetInputFields" class="btn btn-warning">--}}
{{--                Reset--}}
{{--            </button>--}}
{{--            <button wire:click.prevent="update" class="btn btn-primary">--}}
{{--                Edit Team--}}
{{--            </button>--}}
{{--        @endif--}}
    </div>
</div>

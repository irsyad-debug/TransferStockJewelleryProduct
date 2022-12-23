<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-2">
            <input type="text" wire:model="team_id" hidden="">
            <label for="exampleFormControlInput1">Team Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
            wire:model="name">
            @error('name') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Team Leader:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Leader Name"
                   wire:model="team_leader">
            @error('team_leader') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-2">
            <label for="exampleFormControlInput1">Phone Number:</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Number"
                   wire:model="phone_num">
            @error('phone_num') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1">Description of Team:</label>
        <textarea rows="4" class="form-control" id="exampleFormControlInput1" placeholder="Enter Description"
                  wire:model="description"></textarea>
        @error('description') <span class="text-danger fw-bold error">{{ $message }}</span>@enderror
    </div>
    <div class="text-center mt-2">
        @if($createMode)
            <button wire:click.prevent="store" class="btn btn-primary">
                Add Team
            </button>
        @else
            <button wire:click.prevent="resetInputFields" class="btn btn-warning">
                Reset
            </button>
            <button wire:click.prevent="update" class="btn btn-primary">
                Edit Team
            </button>
         @endif
    </div>
</div>

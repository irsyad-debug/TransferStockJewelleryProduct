<div>
    @include('livewire.product-team.create')

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
            <th>Team Name </th>
            <th>Leader</th>
            <th>Phone Number </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $index => $value)
            <tr>
                <td>{{ ++$index}}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->team_leader }}</td>
                <td>{{ $value->phone_num }}</td>
                <td>
                    <button wire:click="showTeam({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $teams->links('livewire.product-team.teams-pagination',['search' => $search]) }}
</div>

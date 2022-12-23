<?php

namespace App\Http\Livewire\ProductTeam;

use App\Models\Product;
use App\Models\Team;
use Livewire\Component;

class Teams extends Component
{
    public $name, $team_leader, $description, $phone_num, $team_id;

    public $createMode = true, $disabled = "";

    public $searchTerm;

    protected $rules = [
        'name' => 'required',
        'team_leader' => 'required',
        'phone_num' => 'required',
        'description' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Team Name is required.',
        'team_leader.required' => 'Name of Team Leader is Required.',
        'phone_num.required' => 'Phone Number is required.',
        'description.required' => 'Description is required.',
    ];

    public function render()
    {
        return view('livewire.product-team.teams', [
            'teams' => Team::where(function ($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('team_leader', 'like', '%'.$this->searchTerm.'%');
            })->paginate(5),
            'search' => $this->searchTerm,
        ]);
    }

    public function resetInputFields()
    {
        $this->name = "";
        $this->team_leader = "";
        $this->phone_num = "";
        $this->description = "";
        $this->createMode = true;
        $this->disabled = "";
    }

    public function store()
    {
        $validatedData = $this->validate();

        Team::create($validatedData);

        session()->flash('message', 'Team Created Successfully');

        $this->resetInputFields();
    }

    public function showTeam($id)
    {
        $this->createMode = false;
        $this->disabled = "disabled";
        $team = Team::find($id);

        $this->name = $team->name;
        $this->team_id = $team->id;
        $this->team_leader = $team->team_leader;
        $this->phone_num = $team->phone_num;
        $this->description = $team->description;
    }

    public function update()
    {
        $validated_data = $this->validate();

        $team = Team::find($this->team_id);
        $team->update($validated_data);

        session()->flash('message', 'Team Details Updated Successfully');

        $this->resetInputFields();
    }

    public function delete($id)
    {
        if($id){
            Team::where('id',$id)->delete();
            session()->flash('message', 'Team Deleted Successfully.');
        }
    }
}

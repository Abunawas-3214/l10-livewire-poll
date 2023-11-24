<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll as PollModel;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{

    #[On('pollCreated')]
    public function render()
    {
        $polls = PollModel::with('options.votes')->latest()->get();


        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}

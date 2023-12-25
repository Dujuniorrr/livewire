<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{
    Tweet, Like
};
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content;
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function store(){
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = '';
    }

    public function like(Tweet $tweet){
        $tweet->likes()->create(
            ['user_id' => auth()->user()->id]
        );
    }

    public function unlike(Tweet $tweet){
        $tweet->likesByUser()->delete();
    }

    public function render()
    {
        return view('livewire.show-tweets', [
            'tweets' => Tweet::with('user')->latest()->paginate(20)
        ]);
    }

}

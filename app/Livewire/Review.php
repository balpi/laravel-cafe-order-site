<?php

namespace App\Livewire;

use App\Models\Comments;
use Livewire\Component;

class Review extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $product;
    public $hideForm;
    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];
    public function mount($id)
    {

        if (auth()->user()) {
            $rating = Comments::where('user_ID', auth()->user()->id)->where('Product_ID', $id)->first();
            if (!empty($rating)) {
                $this->rating = $rating->rate;
                $this->comment = $rating->comment;
                $this->currentId = $rating->ID;
            }
            $this->product = $id;

        }
        return view('livewire.review');
    }
    public function render()
    {
        $comments = Comments::where('product_ID', $this->product)->where('status', 'New')->with('user')->get();
        return view('livewire.review'/* , compact('comments') */);
    }

    public function delete($id)
    {
        $ratings = Comments::where('ID', $id)->first();
        if ($ratings && ($ratings->user_ID == auth()->user()->id)) {
            $ratings->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating = '';
            $this->comment = '';
        }
    }
    public function Rate()
    {
        error_log('------------>>Rate e geldi sonunda' . $this->rating);
        $ratings = Comments::where('user_ID', auth()->user()->id)->where('product_ID', $this->product)->first();
        $this->validate();
        if (!empty($ratings)) {
            $ratings->user_ID = auth()->user()->id;
            $ratings->product_ID = $this->product;
            $ratings->rate = $this->rating;
            $ratings->comment = $this->comment;
            $ratings->Status = 'New';
            try {
                $ratings->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $ratings = new Comments();
            $ratings->user_ID = auth()->user()->id;
            $ratings->product_ID = $this->product;
            $ratings->rate = $this->rating;
            $ratings->comment = $this->comment;
            $ratings->Status = 'New';
            try {
                $ratings->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
}

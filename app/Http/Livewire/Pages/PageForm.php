<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Pages;
use Illuminate\Support\Str;

class PageForm extends Component
{

    public $parent, $title, $content;

    protected $rules = [
        'title' => 'required|unique:pages',
        'content' => 'required'
    ];

    public function render()
    {
        return view('livewire.pages.page-form', ['pages' => Pages::all() ]);
    }

    public function submit() {

        $this->validate();

        try {
           
            $page = new Pages();
            $page->parent_id = $this->parent;
            $page->title = $this->title;
            $page->content = $this->content;
            $page->slug =  Str::slug($this->title, '-');

            if($page->save()) {
                
                $this->parent = null;
                $this->title = null;
                $this->content = null;
    
                session()->flash('success', 'Successfully added!');
                return;
            }
    
            session()->flash('error', 'Something went wrong.');
            return;

        } catch (\Throwable $th) {
           session()->flash('error', $th);
        }

  

    }

}

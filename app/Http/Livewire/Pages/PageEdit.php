<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Pages;
use Illuminate\Support\Str;

class PageEdit extends Component
{
    public $parent, $title, $content, $page_id, $pages;
    
    protected $rules = [
        'content' => 'required'
    ];

    public function render()
    {
        return view('livewire.pages.page-edit');
    }

    public function mount($page) {

        $this->pages = Pages::where('id', '!=', $page->id)->get();
        
        $this->page_id = $page->id;
        $this->parent = $page->parent_id;
        $this->title = $page->title;
        $this->content = $page->content;

    }

    public function submit() {
        
        $this->validate();

        try {
            
            $pages = Pages::where('id', $this->page_id)->update([
                'parent_id' => $this->parent === '' ? NULL : $this->parent,
                'title' => $this->title,
                'content' => $this->content,
                'slug' =>  Str::slug($this->title, '-')
            ]);

            if($pages) {
                session()->flash('success', 'Successfully updated!');
                return true;
            }

            session()->flash('error', 'Something went wrong.');
            return false;
            
        } catch (\Throwable $th) {
            session()->flash('error', $th);
        }


    }
}

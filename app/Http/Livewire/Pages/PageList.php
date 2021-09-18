<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Pages;

class PageList extends Component
{

    public $pages;

    public function render()
    {
        return view('livewire.pages.page-list', []);
    }

    public function mount() {
        $this->pages = self::getPages();
    }

    public function getPages() {
        $pages = Pages::all();

        $mainPages = $pages->whereNull('parent_id') ;
        self::formatPages($mainPages, $pages);
        return $mainPages;
    }

    private function formatPages($pages, $mainPages) {
        foreach ($pages as $key => $subpage) {
            $subpage->page = $mainPages->where('parent_id', $subpage->id)->values();
            if ($subpage->page->isNotEmpty()) {
                self::formatPages($subpage->page, $mainPages);
            }
        }
    }

    public function deletePage($pageId) {

        $deleted = Pages::where('id', $pageId)->delete();
        if($deleted) {
            $this->pages = self::getPages();
            session()->flash('success', 'Successfully deleted!');
            return true;
        }
        session()->flash('error', 'Something went wrong.');
        return false;
        
    }

    public function viewPage($pageId) {
      $page = Pages::where('id', $pageId)->first();
      return redirect()->to(route('page.view', ['sluq_parent' => $page->slug]));
    }

}

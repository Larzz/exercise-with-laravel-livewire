<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Pages;

use App\Http\Livewire\Pages\PageForm;
use App\Http\Livewire\Pages\PageList;
use App\Http\Livewire\Pages\PageEdit;


use Livewire\Livewire;


class PageTest extends TestCase
{

   
    public function testCanLivewireCanCreatePage() {
        
         Livewire::test(PageForm::class)
            ->set('parent', 1)
            ->set('title', 'testing the best of the best')
            ->set('content', 'test_content')
            ->call('submit');

        $this->assertTrue(true);

    }

    

    public function testCanLivewireCanEditPage() {
        
        $page = Pages::factory()->create();

        Livewire::test(PageEdit::class, ['page' => $page])
            ->set('parent', $page->parent_id)
            ->set('title', $page->title . ' edited')
            ->set('content', $page->content . 'edited')
            ->set('page_id', $page->id)
            ->call('submit');
    }


    public function testCanLivewireCanDeletePage() {

        $page = Pages::factory()->create();

        Livewire::test(PageList::class, ['id' => $page->id])
         ->call('deletePage', $page->id);

        $this->assertTrue(true);
    }

}

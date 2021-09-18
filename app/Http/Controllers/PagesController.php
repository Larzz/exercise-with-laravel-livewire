<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;

class PagesController extends Controller
{

    public function index() {
        return view('pages.index');
    }

    public function new() {
        return view('pages.new');
    }

    public function edit($page_id) {
        return view('pages.edit', ['page' => Pages::where('id', $page_id)->first()]);
    }

    public function show($parent_slug, $child_slug='', $sub_child_slug='') {

        if (!empty($sub_child_slug)) {
            return view('pages.view', ['page' => Pages::where('slug', $sub_child_slug)->first() ]);
        }

        if (!empty($child_slug)) {
            return view('pages.view', ['page' => Pages::where('slug', $child_slug)->first() ]);
        }

        if (!empty($parent_slug)) {
            return view('pages.view', ['page' => Pages::where('slug', $parent_slug)->first() ]);
        }

        abort(404);

    }



}

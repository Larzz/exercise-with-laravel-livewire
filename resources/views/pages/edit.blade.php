@extends('layout.layout')
@section('content')
    <div class="container mx-auto px-4">
        @livewire('pages.page-edit', ['page' => $page])
    </div>
@endsection
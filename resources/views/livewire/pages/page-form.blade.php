<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    <form action="javascript:;" class="form bg-white p-6 my-10 relative">
        <a href="{{ route('page.index') }}" class="float-right px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-gray-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300" type="submit">Back</a>

        <h3 class="text-2xl text-gray-900 font-semibold">Create Page</h3>
        <p class="text-gray-600"> To help you choose your property</p>

        <x-error></x-error>
        <x-success></x-success>

        <select wire:model="parent" class="border p-2 w-full mt-3">
            <option value="">No Parent Page</option>
            @foreach ($pages as $item)
                 <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>

        <input type="text" wire:model="title" placeholder="Title" class="border p-2 w-full mt-3">
        
        @error('title')
        <div class="alert alert-danger text-red-500	text-xs" role="alert">
            {{ $message }}
        </div>
        @enderror
        
        <textarea wire:model="content" cols="10" rows="10" placeholder="Content"
            class="border p-2 mt-3 w-full"></textarea>

        @error('content')
        <div class="alert alert-danger text-xs text-red-500" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div wire:loading wire:target="submit">
            <x-loading></x-loading>
        </div>
        
        <input type="submit" wire:click="submit" value="Submit"
            class="w-full mt-6 bg-blue-600 hover:bg-blue-500 text-white font-semibold p-3">

    </form>

</div>

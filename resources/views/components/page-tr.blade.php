@forelse ($data as $item)


<tr class="{{ $item->parent_id != null ? 'bg-green-300 text-gray-500 p-5' : 'text-gray-700' }}">
    <td class="px-4 w-2 py-3 border">
        <div class="flex items-center text-sm">
            <p class="font-semibold text-black">{{ $item->title }}</p>
        </div>
    </td>
    <td class="px-4 py-3 w-7 text-ms font-semibold border">{{ $item->content }}</td>
    <td class="px-4 py-3 w-3 text-xs border">
        <a href="{{ route('page.view', ['slug_parent' => $item->slug]) }}"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-gray-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">View</a>
        <a href="javascript:;" wire:click="deletePage({{$item->id}})"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-red-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">Delete</a>
        <a href="{{ route('page.edit', ['id' => $item->id ]) }}"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">Edit</a>
    </td>

    @if ($item->page->isNotEmpty())

    @foreach ($item->page as $child_item)

<tr class="text-gray-700">
    <td class="px-4 w-2 py-3 border">
        <div class="flex items-center text-sm">
            <p class="font-semibold text-black">{{ $child_item->title }}</p>
        </div>
    </td>
    <td class="px-4 py-3 w-7 text-ms font-semibold border">{{ $child_item->content }}</td>
    <td class="px-4 py-3 w-3 text-xs border">
        <a href="{{ route('page.view', ['slug_parent' => $item->slug, 'slug_child' => $child_item->slug]) }}"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-gray-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">View</a>
        <a href="javascript:;" wire:click="deletePage({{$child_item->id}})"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-red-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">Delete</a>
        <a href="{{ route('page.edit', ['id' => $child_item->id ]) }}"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">Edit</a>
    </td>

    @if ($child_item->page->isNotEmpty())

    @foreach ($child_item->page as $subchild_item)
<tr class="text-gray-700">
    <td class="px-4 w-2 py-3 border">
        <div class="flex items-center text-sm">
            <p class="font-semibold text-black">{{ $subchild_item->title }}</p>
        </div>
    </td>
    <td class="px-4 py-3 w-7 text-ms font-semibold border">{{ $subchild_item->content }}</td>
    <td class="px-4 py-3 w-3 text-xs border">
        <a href="{{ route('page.view', ['slug_parent' => $item->slug, 'slug_child' => $child_item->slug, 'slug_sub_child' => $subchild_item->slug]) }}"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-gray-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">View</a>
        <a href="javascript:;" wire:click="deletePage({{$subchild_item->id}})"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-red-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">Delete</a>
        <a href="{{ route('page.edit', ['id' => $subchild_item->id ]) }}"
            class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300"
            type="submit">Edit</a>
    </td>
    @endforeach

    @endif

    @endforeach


</tr>


@endif
</tr>

{{-- i want to make a recursion here, however due to time the routiug
@if ($item->page->isNotEmpty())
    <div class="mr-8">
        <x-page-tr :parent="$item ?? NULL" :data='$item->page'> </x-page-tr>
     </div>
@endif --}}

@empty
<p>No record found</p>
@endforelse

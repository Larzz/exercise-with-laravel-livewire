<section class="container mx-auto p-6 font-mono">
<a href="{{ route('page.new') }}" class="float-right px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-gray-500 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300" type="submit">New</a>
   
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">

            <x-error></x-error>
            <x-success></x-success>
            
            <table class="w-full">
                <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Content</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                </thead>
                <tbody class="bg-white">
                    <x-page-tr :parent='NULL' :data='$pages'> </x-page-tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

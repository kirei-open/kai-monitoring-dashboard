<div>
    @section('title')
        @lang('messages.devices monitoring title')
    @endsection
    <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">@lang('messages.devices monitoring')</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:mt-[20px] mt-[100px] lg:ml-[60px] lg:w-11/12">
        <div class="bg-white lg:w-full lg:h-24 dark:bg-gray-900">
            <div class="flex justify-between">
                <div class="lg:mt-7 lg:ml-5">
                    <div class="relative w-full">
                        <span class="absolute my-2 mx-2 text-[#878686]">
                            <x-icon name="magnifying-glass" />
                        </span>
                        <input style="font-family: 'Poppins', sans-serif;" wire:model.live.debounce.300ms="search" 
                        type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-72 ps-10 p-2.5 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                        dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="@lang('messages.search')"/>
                    </div>
                </div>
                <div class="lg:mt-7">
                    <form wire:submit.prevent="save">
                        <select wire:model.live="sortBy" wire:change="applyFilter($event.target.value)" 
                        id="sort" name="sort" style="font-family: 'Poppins', sans-serif;" 
                        type="text" class="bg-white border border-gray-300 pr-10 text-[#878686] rounded-xl bg-[#f2f2f8] 
                        focus:ring-blue-500 focus:border-blue-500 text-[12px] lg:text-[14px] lg:mr-[30px] 
                        lg:w-72 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="#" selected disabled>Filter</option>
                            <option value="latest" selected>@lang('messages.latest')</option>
                            <option value="oldest">@lang('messages.oldest')</option>
                        </select>            
                    </form>
                </div>
            </div>
        </div>
        @php
            $lastNumber = ($locations->currentPage() - 1) * $locations->perPage();
        @endphp
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            @lang('messages.no')
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang('messages.serial number')
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang('messages.latitude')
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang('messages.longitude')
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang('messages.timestamp')
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @lang('messages.action')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 
                    dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            {{ ++$lastNumber }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $location->device_id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $location->latitude }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $location->longitude }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $location->datetime }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/table/detail/{{ $location->device_id }}" wire:navigate class="font-medium 
                                text-blue-600 dark:text-blue-500 hover:underline">
                                Detail
                            </a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                    @lang('messages.showing') <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->firstItem() }}</span> - 
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->lastItem() }}</span> 
                    @lang('messages.of')
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->total() }}</span>
                </span>
                {{ $locations->links() }}
            </nav>
        </div>
    </div>
</div>

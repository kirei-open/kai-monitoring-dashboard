<div>
    @section('title',$device->serial_number)
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <span class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                    Device
                </span>
                <div class="grid grid-cols-3">
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-white text-left lg:mt-3">Serial Number</h1>
                        <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px] text-left">{{ $device->serial_number }}</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-white text-left lg:mt-3">Code</h1>
                        <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px] text-left">{{ $device->code }}</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white text-left lg:ml-[-120px] lg:mt-3">Last Monitored Value</p>
                        @if ($device->last_monitored_value != null)
                        <ul class="text-left">
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] lg:ml-[-120px]">Datetime <span class="lg:ml-4">:</span> <span class="lg:ml-3">{{ $device->last_monitored_value['datetime'] }}</span></li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] lg:ml-[-120px]">Key <span class="lg:ml-14">:</span> <span class="lg:ml-3">{{ $device->last_monitored_value['key'] }}</span> </li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] lg:ml-[-120px]">Value <span class="lg:ml-11">:</span> <span class="lg:ml-3">{{ $device->last_monitored_value['value'] }}</span> </li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] lg:ml-[-120px]">Unit <span class="lg:ml-[54px]">:</span> <span class="lg:ml-3">{{ $device->last_monitored_value['unit'] }}</span> </li>
                        </ul>
                        @else
                        <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]"></span>
                        @endif
                    </div>
                    <div class="flex flex-col mt-[-120px]">
                        <p class="text-xl font-bold text-gray-500 dark:text-white text-left lg:mt-8">Last Location</p>
                        <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px] text-left">Latitude &nbsp;&nbsp;&nbsp; : &nbsp;{{ $device->latitude }} </span>
                        <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px] text-left">Longitude : &nbsp;{{ $device->longitude }} </span>
                    </div>
                    <div class="flex flex-col mt-[-120px]">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-white text-left lg:mt-8">Name</h1>
                        <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px] text-left">{{ $device->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:mt-[-80px]">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <span class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                    Location
                </span>
                <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-[1150px] lg:mt-4">
                    <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                DATE TIME
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SERIAL NUMBER
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LATITUDE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LONGITUDE
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$location->created_at}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$location->device_id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$location->latitude}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$location->longitude}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 lg:w-[1150px]" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                        Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->firstItem() }}</span> - <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->total() }}</span>
                    </span>
                    {{ $locations->links(data: ['scrollTo' => false]) }}
                </nav>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:mt-[-50px]">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <span class="bg-red-100 text-red-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 mb-2">
                    Measurement
                </span>
                <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-[1150px] lg:mt-4">
                    <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                DEVICE ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                DATETIME
                            </th>
                            <th scope="col" class="px-6 py-3">
                                KEY
                            </th>
                            <th scope="col" class="px-6 py-3">
                                VALUE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                UNIT
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($measurements as $measurement)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$measurement->device_id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$measurement->datetime}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$measurement->key}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$measurement->value}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$measurement->unit}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 lg:w-[1150px]" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                        Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->firstItem() }}</span> - <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->total() }}</span>
                    </span>
                    {{ $measurements->links(data: ['scrollTo' => false]) }}
                </nav>
            </div>
        </div>
    </section>
</div>
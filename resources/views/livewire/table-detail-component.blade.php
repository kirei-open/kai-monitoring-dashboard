<div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 lg:ml-[205px] lg:mt-[100px]">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="device-tab" data-tabs-target="#device" type="button" role="tab" aria-controls="device" aria-selected="false">Device</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="location-tab" data-tabs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="false">Location</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="measurement-tab" data-tabs-target="#measurement" type="button" role="tab" aria-controls="measurement" aria-selected="false">Measurement</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg lg:w-[1300px] lg:ml-[350px] bg-gray-50 dark:bg-gray-800 drop-shadow-xl" id="device" role="tabpanel" aria-labelledby="device-tab">
            <div class="container lg:w-[1200px]">
                <div class="grid grid-cols-3">
                    <div class="flex flex-col">
                      <h1 class="text-xl font-bold text-gray-700 dark:text-white text-center">Serial Number</h1>
                      <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px] ml-[135px]">{{ $device->serial_number }}</p>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-white text-center">Code</h1>
                        <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px] ml-[175px]">{{ $device->code }}</p>
                      </div>
                      <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white text-center">Last Monitored Value</p>
                        @if ($device->last_monitored_value != null)
                        <ul class="ml-[155px]">
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[-50px]">Datetime: {{ $device->last_monitored_value['datetime'] }}</li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[-50px]">Key : {{ $device->last_monitored_value['key'] }} </li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[-50px]">Key : {{ $device->last_monitored_value['key'] }} </li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[-50px]">Value : {{ $device->last_monitored_value['value'] }}</li>
                            <li class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[-50px]">Unit : {{ $device->last_monitored_value['unit'] }}</li>
                        </ul>
                        @else
                        <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]"></span>
                        @endif
                      </div>
                    <div class="flex flex-col mt-[-120px]">
                      <p class="text-xl font-bold text-gray-500 dark:text-white text-center">Last Location</p>
                      <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[140px]">Latitude : {{ $device->latitude }} </span>
                      <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px] ml-[140px]">Longitude : {{ $device->longitude }} </span>
                    </div>
                    <div class="flex flex-col mt-[-120px]">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-white text-center">Name</h1>
                        <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px] ml-[175px]">{{ $device->name }}</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="hidden p-0 rounded-lg lg:w-[1300px] lg:ml-[350px] bg-gray-50 dark:bg-gray-800 drop-shadow-xl" id="location" role="tabpanel" aria-labelledby="location-tab">
            <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-full">
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
        </div>
        <div class="hidden p-0 rounded-lg lg:w-[1300px] lg:ml-[350px] bg-gray-50 dark:bg-gray-800 drop-shadow-xl" id="measurement" role="tabpanel" aria-labelledby="measurement-tab">
            <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-full">
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
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$measurement->datetime}}
                            </th>
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
        </div>
    </div>
</div>
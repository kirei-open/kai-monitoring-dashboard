<div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 lg:ml-[205px] lg:mt-[100px]">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Device</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Location</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Measurement</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="block max-w-full p-6 bg-white rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 lg:ml-[180px]">
                <div class="card rounded-lg bg-white dark:bg-gray-800">
                    <div class="grid gap-x-8 gap-y-8 grid-cols-3">
                      <div class="flex flex-col">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-white">Serial Number</h1>
                        <p class="text-gray-500 dark:text-white mt-4 lg:text-[16px]">{{ $device->serial_number }}</p>
                      </div>
                      <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white">Last Location</p>
                        <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">Latitude : {{ $device->latitude }} </span>
                        <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">Longitude : {{ $device->longitude }} </span>
                      </div>
                      <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white">Last Monitored Value</p>
                        @if ($device->last_monitored_value != null)
                            <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">Datetime : {{ \Carbon\Carbon::createFromFormat('m-d-Y H:i:s', $device->last_monitored_value['datetime'])->format('d F Y') }} </span>
                            <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">Key : {{ $device->last_monitored_value['key'] }} </span>
                            <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">Value : {{ $device->last_monitored_value['value'] }} </span>
                            <span class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">Unit : {{ $device->last_monitored_value['unit'] }} </span>
                        @endif
                      </div>
                      <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white">Name</p>
                        <p class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">{{ $device->name }}</p>
                      </div>
                      <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white">Code</p>
                        <p class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">{{ $device->code }}</p>                           
                      </div>
                      <div class="flex flex-col">
                        <p class="text-xl font-bold text-gray-500 dark:text-white">API Key</p>
                        <p class="text-gray-700 dark:text-white mt-4 lg:text-[16px]">{{ $device->api_key }}</p>
                      </div>
                    </div>
                </div>                      
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:ml-[180px]">
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
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:ml-[180px]">
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
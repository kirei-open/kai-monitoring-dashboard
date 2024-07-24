<div>
  @section('title', $device->serial_number)
  <section class="bg-white dark:bg-gray-900 lg:mt-16">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
          Device
        </span>
        <div class="relative overflow-x-auto lg:mt-4">
          <table class="lg:w-[1150px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Serial Number
                </th>
                <th scope="col" class="px-6 py-3">
                  Code
                </th>
                <th scope="col" class="px-6 py-3">
                  Name
                </th>
                <th scope="col" class="px-6 py-3">
                  Last Location
                </th>
                <th scope="col" class="px-6 py-3">
                  Last Monitored Value
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                  {{ $device->serial_number }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $device->code }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $device->name }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $device->latitude ?? 'Belum Ada Data' }} , {{ $device->longitude ?? 'Belum Ada Data' }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  @if ($device->last_monitored_value != null)
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li class="font-medium text-gray-900 dark:text-white">
                        Datetime <span class="lg:ml-5">:</span> &nbsp; {{ $device->last_monitored_value['datetime'] }}
                      </li>
                      <li class="font-medium text-gray-900 dark:text-white">
                        Key <span class="lg:ml-14">:</span> &nbsp; {{ $device->last_monitored_value['key'] }}
                      </li>
                      <li class="font-medium text-gray-900 dark:text-white">
                        Value <span class="lg:ml-11">:</span> &nbsp; {{ $device->last_monitored_value['value'] }}
                      </li>
                      <li class="font-medium text-gray-900 dark:text-white">
                        Unit <span class="lg:ml-[53px]">:</span> &nbsp; {{ $device->last_monitored_value['unit'] }}
                      </li>
                    </ul>
                  @else
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li class="font-medium text-gray-900 dark:text-white">
                        Datetime <span class="lg:ml-2">:</span> &nbsp; Belum Ada Data
                      </li>
                      <li class="font-medium text-gray-900 dark:text-white">
                        Key <span class="lg:ml-11">:</span> &nbsp; Belum Ada Data
                      </li>
                      <li class="font-medium text-gray-900 dark:text-white">
                        Value <span class="lg:ml-8">:</span> &nbsp; Belum Ada Data
                      </li>
                      <li class="font-medium text-gray-900 dark:text-white">
                        Unit <span class="lg:ml-10">:</span> &nbsp; Belum Ada Data
                      </li>
                    </ul>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:mt-[-80px]">
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
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
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->created_at }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->device_id }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->latitude }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->longitude }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 lg:w-[1150px]"
          aria-label="Table navigation">
          <span
            class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
            Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->firstItem() }}</span> -
            <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->lastItem() }}</span> of <span
              class="font-semibold text-gray-900 dark:text-white">{{ $locations->total() }}</span>
          </span>
          {{ $locations->links(data: ['scrollTo' => false]) }}
        </nav>
      </div>
    </div>
  </section>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:mt-[-50px]">
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-red-100 text-red-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 mb-2">
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
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $measurement->device_id }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $measurement->datetime }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $measurement->key }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"">
                  {{ $measurement->value }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $measurement->unit }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 lg:w-[1150px]"
          aria-label="Table navigation">
          <span
            class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
            Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->firstItem() }}</span> -
            <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->lastItem() }}</span> of <span
              class="font-semibold text-gray-900 dark:text-white">{{ $measurements->total() }}</span>
          </span>
          {{ $measurements->links(data: ['scrollTo' => false]) }}
        </nav>
      </div>
    </div>
  </section>
</div>

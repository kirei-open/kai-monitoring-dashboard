@extends('pdf.layout.layout')
@push('title')
    <title>Report All Devices</title>
@endpush
@section('main')
    <table class="w-full border-b border-black">
        <tr>
            <td>
                <img src="https://www.kai.id/static/konten/logokai_main.png" alt="">
            </td>
            <td>
                <span class="text-[18px] font-bold font-serif">
                    Device Report {{ $startDate . ' - ' . $endDate }}
                </span>
            </td>
        </tr>
    </table>
    <span class="bg-indigo-100 text-indigo-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
            rounded-md dark:bg-indigo-900 dark:text-indigo-400 mb-4 mt-4">
            Train Info
    </span>
    <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-neutral-100 uppercase bg-[#2d2a6f] border-b border-gray-300 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="border border-gray-300 px-6 py-3">
            Serial Number
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
            Train Name
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
            Train Image
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
            Train Stations
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="border border-gray-300 px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $train->device_id }}
                    </th>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      @if(!empty($train->name))
                        {{ $train->name }}
                      @else
                        No Name Data
                      @endif
                    </td>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-whit">
                      @if($train->image)
                      <img class="ml-[130px]" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/$train->image"))) }}"
                            width="100" />
                      @else
                          <p>No Image Data</p>
                      @endif
                    </td>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      @if($train->stations->isNotEmpty())
                        {{ $train->stations->pluck('name')->join(', ') }}
                      @else
                        No Stations Data
                      @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bg-yellow-100 text-yellow-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
        rounded-md dark:bg-indigo-900 dark:text-indigo-400 mb-4 mt-4">
        Calculated Measurements
    </span>
    @php
        $groupedMeasurements = $calculatedMeasurements->groupBy('device_id');
    @endphp

    @foreach ($groupedMeasurements as $deviceId => $calculatedMeasurements)
        <h3 class="text-black font-bold text-[14px] mb-2 mt-2">Device ID: {{ $deviceId }}</h3>
        <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-center text-neutral-100 uppercase bg-[#2d2a6f] border-b border-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="border border-gray-300 px-6 py-3">
                        Key
                    </th>
                    <th scope="col" class="border border-gray-300 px-6 py-3">
                        Minimum
                    </th>
                    <th scope="col" class="border border-gray-300 px-6 py-3">
                        Maximum
                    </th>
                    <th scope="col" class="border border-gray-300 px-6 py-3">
                        Average
                    </th>
                    <th scope="col" class="border border-gray-300 px-6 py-3">
                        Unit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calculatedMeasurements as $cm)
                <tr class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                    <th scope="row" class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $cm->key }}
                    </th>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $cm->minimum }}
                    </td>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $cm->maximum }}
                    </td>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $cm->average }}
                    </td>
                    <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $cm->unit }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

    <span class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
            rounded-md dark:bg-gray-700 dark:text-blue-400 mb-4 mt-4">
            Device
    </span>
    <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-neutral-100 uppercase border-b border-gray-300 bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              Serial Number
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              Code
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              Last Location
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              Last Monitored Value
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($devices as $device)
                <tr class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class=" text-center border border-gray-300 px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ $device->serial_number }}
                </th>
                <td class="text-center border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $device->code }}
                </td>
                <td class="text-center border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $device->latitude ?? 'Belum Ada Data' }} , {{ $device->longitude ?? 'Belum Ada Data' }}
                </td>
                <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if ($device->last_monitored_value != null)
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <li class="text-center font-medium text-gray-900 dark:text-white">
                        Datetime <span class="">:</span> &nbsp; {{ $device->last_monitored_value['datetime'] }}
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white ml-[80px]">
                        Key <span class="">:</span> &nbsp; {{ $device->last_monitored_value['key'] }}
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white ml-[80px]">
                        Value <span class="">:</span> &nbsp; {{ $device->last_monitored_value['value'] }}
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white ml-[80px]">
                        Unit <span class="">:</span> &nbsp; {{ $device->last_monitored_value['unit'] }}
                        </li>
                    </ul>
                    @else
                    <ul class="text-center max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <li class="font-medium text-gray-900 dark:text-white">
                        Datetime <span class="">:</span> &nbsp; Belum Ada Data
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white">
                        Key <span class="">:</span> &nbsp; Belum Ada Data
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white">
                        Value <span class="">:</span> &nbsp; Belum Ada Data
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white">
                        Unit <span class="">:</span> &nbsp; Belum Ada Data
                        </li>
                    </ul>
                    @endif
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
                  rounded-md dark:bg-gray-700 dark:text-green-400 mb-4 mt-4">
                  Location
    </span>
    <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-full">
        <thead class="text-center text-xs text-neutral-100 uppercase border-b border-gray-300 bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              SERIAL NUMBER
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              LATITUDE
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              LONGITUDE
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              DATETIME
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($locations as $location)
            <tr
              class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
              <th scope="row" class=" border border-gray-300px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $location->device_id }}
              </th>
              <th scope="row" class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $location->latitude }}
              </th>
              <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $location->longitude }}
              </td>
              <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $location->datetime }}
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <span class="bg-red-100 text-red-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
        rounded-md dark:bg-gray-700 dark:text-red-400 mb-4 mt-4">
        Measurement
    </span>
    <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-full">
        <thead class="text-center text-xs text-neutral-100 uppercase border-b border-gray-300 bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              SERIAL NUMBER
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              KEY
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              VALUE
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              UNIT
            </th>
            <th scope="col" class="border border-gray-300 px-6 py-3">
              DATETIME
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($measurements as $measurement)
            <tr
              class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
              <th scope="row" class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $measurement->device_id }}
              </th>
              <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $measurement->key }}
              </td>
              <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $measurement->value }}
              </td>
              <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"">
                {{ $measurement->unit }}
              </td>
              <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $measurement->datetime }}
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
@endsection
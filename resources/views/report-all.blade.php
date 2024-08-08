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
      <tr class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="border border-gray-300 px-6 py-4 font-medium text-gray-900 dark:text-white">
          {{ $trains->device_id }}
        </th>
        <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $trains->name }}
        </td>
        <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-whit">
          <img class="ml-[130px]" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/$trains->image"))) }}"
          width="100" />
        </td>
        <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $trains->stations->pluck('name')->join(', ') }}
        </td>
      </tr>
    </tbody>
</table>

@endsection
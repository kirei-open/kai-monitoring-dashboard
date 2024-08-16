@extends('pdf.layout.layout')
@push('title')
    <title>Laporan {{ $devices->serial_number }}</title>
@endpush
@section('main')
  <table class="w-full border-b border-black">
        <tr>
            <td>
                <img src="https://www.kai.id/static/konten/logokai_main.png" alt="">
            </td>
            <td>
                <span class="text-[18px] font-bold font-serif">
                    Laporan Perangkat {{ $devices->serial_number }} Tanggal {{ $startDate . ' - ' . $endDate }}
                </span>
            </td>
        </tr>
  </table>
  <span class="bg-indigo-100 text-indigo-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
              rounded-md dark:bg-indigo-900 dark:text-indigo-400 mb-4 mt-4">
              Informasi Kereta
  </span>
  <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-center text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Nomor Seri
        </th>
        <th scope="col" class="px-6 py-3">
          Nama Kereta
        </th>
        <th scope="col" class="px-6 py-3">
          Foto Kereta
        </th>
        <th scope="col" class="px-6 py-3">
          Stasiun Pemberhentian
        </th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-b text-center bg-white">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
          {{ $train->device_id }}
        </th>
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          @if(!empty($train->name))
            {{ $train->name }}
          @else
            TIdak Ada Data Nama Kereta
          @endif
        </td>
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-whit">
          @if($train->image)
            <img class="ml-[10px]" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/$train->image"))) }}"
            width="100" />
          @else
              <p>Tidak Ada Data Foto Kereta</p>
          @endif
        </td>
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          @if($train->stations->isNotEmpty())
            {{ $train->stations->pluck('name')->join(', ') }}
          @else
            Tidak Ada Data Stasiun
          @endif
        </td>
      </tr>
    </tbody>
  </table>
  <span class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
      rounded-md dark:bg-gray-700 dark:text-blue-400 mb-4 mt-4">
      Peralatan
  </span>
  <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Nomor Seri
        </th>
        <th scope="col" class="px-6 py-3">
          Kode
        </th>
        <th scope="col" class="px-6 py-3">
          Lokasi Terakhir
        </th>
        <th scope="col" class="px-6 py-3">
          Nilai Pantau Terakhir
        </th>
      </tr>
    </thead>
    <tbody>
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
          {{ $devices->serial_number }}
        </th>
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $devices->code }}
        </td>
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $devices->latitude ?? 'Belum Ada Data' }} , {{ $devices->longitude ?? 'Belum Ada Data' }}
        </td>
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          @if ($devices->last_monitored_value != null)
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
              <li class="font-medium text-gray-900 dark:text-white">
                Tanggal <span class="lg:ml-5">:</span> &nbsp; {{ $devices->last_monitored_value['datetime'] }}
              </li>
              <li class="font-medium text-gray-900 dark:text-white">
                Kunci <span class="lg:ml-[35px]">:</span> &nbsp; {{ $devices->last_monitored_value['key'] }}
              </li>
              <li class="font-medium text-gray-900 dark:text-white">
                Nilai <span class="lg:ml-[41px]">:</span> &nbsp; {{ $devices->last_monitored_value['value'] }}
              </li>
              <li class="font-medium text-gray-900 dark:text-white">
                Satuan <span class="lg:ml-[27px]">:</span> &nbsp; {{ $devices->last_monitored_value['unit'] }}
              </li>
            </ul>
          @else
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
              <li class="font-medium text-gray-900 dark:text-white">
                Tanggal <span class="lg:ml-5">:</span> &nbsp; Belum Ada Data
              </li>
              <li class="font-medium text-gray-900 dark:text-white">
                Kunci <span class="lg:ml-[35px]">:</span> &nbsp; Belum Ada Data
              </li>
              <li class="font-medium text-gray-900 dark:text-white">
                Nilai <span class="lg:ml-[41px]">:</span> &nbsp; Belum Ada Data
              </li>
              <li class="font-medium text-gray-900 dark:text-white">
                Satuan <span class="lg:ml-[27px]">:</span> &nbsp; Belum Ada Data
              </li>
            </ul>
          @endif
        </td>
      </tr>
    </tbody>
  </table>
  <span class="bg-yellow-100 text-yellow-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
      rounded-md dark:bg-indigo-900 dark:text-indigo-400 mb-4 mt-4">
      Kalkulasi Pengukuran
  </span>
  <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-center text-neutral-100 uppercase bg-[#2d2a6f] border-b border-gray-300 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="border border-gray-300 px-6 py-3">
            Kunci
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
            Minimal
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
            Maksimal
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
            Rata - Rata
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
            Satuan
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($calculatedMeasurements as $cm)
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
      @empty
        <tr>
          <td colspan="5" class="text-center py-4 text-gray-900">Tidak Ada Data Pengukuran Terhitung yang Tersedia</td>
        </tr>
      @endforelse
    </tbody>    
  </table>
  <span class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
                  rounded-md dark:bg-gray-700 dark:text-green-400 mb-4 mt-4">
                  Lokasi
  </span>
  <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-full">
    <thead class="text-center text-xs text-neutral-100 uppercase border-b border-gray-300 bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          LINTANG
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          BUJUR
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          TANGGAL
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($locations as $location)
        <tr class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
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
      @empty
        <tr>
          <td colspan="3" class="text-center py-4 text-gray-900">Tidak Ada Data Lokasi Tersedia</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  <span class="bg-red-100 text-red-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
                rounded-md dark:bg-gray-700 dark:text-red-400 mb-4 mt-4">
                Pengukuran
  </span>
  <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-full">
    <thead class="text-center text-xs text-neutral-100 uppercase border-b border-gray-300 bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          KUNCI
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          NILAI
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          SATUAN
        </th>
        <th scope="col" class="border border-gray-300 px-6 py-3">
          TANGGAL
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($measurements as $measurement)
        <tr class="text-center bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
          <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $measurement->key }}
          </td>
          <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $measurement->value }}
          </td>
          <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $measurement->unit }}
          </td>
          <td class="border border-gray-300 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $measurement->datetime }}
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center py-4 text-gray-900">Tidak Ada Data Pengukuran yang Tersedia</td>
        </tr>
      @endforelse
    </tbody>    
  </table>
@endsection
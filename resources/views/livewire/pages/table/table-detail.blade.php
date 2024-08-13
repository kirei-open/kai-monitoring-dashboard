<div>
  @section('title', $device->serial_number)
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.8);
    }
    
    .modal-content {
      margin: auto;
      padding: 10px;
      margin-top: 250px;
      border: 1px solid #888;
      width: 30%;
    }
    
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      margin-top: -15px;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
  <section class="lg:mt-[7rem] lg:ml-[330px]">
    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium 
            rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none 
            dark:focus:ring-blue-800" id="myBtn">
            Generate Report
    </button>
      <!-- The Modal -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="bg-white dark:bg-gray-800 modal-content">
          <span class="close">&times;</span>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white ml-2 mt-4">
            Generate Report By Date
          </h3>
          <div class="flex items-center ml-2">
            <div class="relative mt-8">
              <input wire:model="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 
                    focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                    dark:focus:border-blue-500 lg:w-[230px]"
                    type="datetime-local" name="startDate">
            </div>
            <span class="mx-4 text-gray-500 mt-8">To</span>
            <div class="relative mt-8">
              <input wire:model="endDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md 
                      focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 
                      dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                      dark:focus:border-blue-500 lg:w-[230px]"
                      type="datetime-local" name="endDate">
            </div>
          </div>
          <div class="flex items-center p-4 md:p-5 rounded-b dark:border-gray-600 mt-4 ml-[-10px]">
            <button wire:click="createReport" type="button" class="text-white bg-blue-700 
                    hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg 
                    text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Generate
            </button>
          </div>
        </div>
      </div>
  </section>

  <section class="bg-white dark:bg-gray-900 lg:mt-[-50px]">
    <div class="pt-8 px-4 mx-auto max-w-screen-xl lg:pt-16">
      <div class="bg-slate-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span class="bg-indigo-100 text-indigo-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
              rounded-md dark:bg-indigo-900 dark:text-indigo-400 mb-2">
              Train
        </span>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Image Train
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Information
                  </th>
              </tr>
            </thead>
              <tbody>
                  <tr class="bg-white dark:bg-gray-800">
                      <td class="p-6">
                        @if($train->image)
                          <img class="w-16 md:w-32 lg:w-[500px] lg:h-[300px]" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/$train->image"))) }}" width="100" />
                        @else
                            <p>No Image Data</p>
                        @endif
                      </td>
                      <td class="px-6 py-4 pb-14">
                        <span class="bg-sky-200 text-sky-500 text-base font-medium me-2 px-2.5 py-0.5 rounded dark:bg-sky-500 dark:text-sky-100">Device ID</span>
                        <span class="lg:ml-12 text-gray-900 dark:text-white text-base">:</span><span class="text-gray-900 dark:text-white lg:ml-8 text-base">{{ $train->device_id }}</span>
                        <br>
                        <br>
                        <br>
                        <span class="bg-cyan-200 text-cyan-800 text-base font-medium me-2 px-2.5 py-0.5 rounded dark:bg-cyan-400 dark:text-cyan-50">Train Name</span>
                        <span class="lg:ml-[35px] text-gray-900 dark:text-white text-base">:</span><span class="text-gray-900 dark:text-white lg:ml-7 text-base">
                          @if(!empty($train->name))
                            {{ $train->name }}
                          @else
                            No Name Data
                          @endif
                        </span>
                        <br>
                        <br>
                        <br>
                        <span class="mb-2 bg-teal-200 text-teal-800 text-base font-medium me-2 px-2.5 py-0.5 rounded dark:bg-teal-400 dark:text-teal-50">Route Trains</span>
                        <span class="lg:ml-[25px] text-gray-900 dark:text-white text-base">:</span>
                          <ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-white lg:mt-[-20px] lg:ml-[180px]">
                            @if($train->stations->isNotEmpty())
                                @foreach ($train->stations as $station)
                                    <li>
                                        <span class="font-medium text-gray-900 dark:text-white text-base">{{ $station->name }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <span class="font-semibold text-gray-900 dark:text-white text-base">No Stations Data</span>
                                </li>
                            @endif
                          </ol>                      
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white dark:bg-gray-900">
    <div class="pb-8 px-4 mx-auto max-w-screen-xl lg:pt-4 lg:pb-16">
      <div class="bg-slate-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-blue-100 text-blue-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
              rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
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
      <div class="bg-slate-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-green-100 text-green-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
              rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
          Location
        </span>
        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-[1150px] lg:mt-4">
          <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                SERIAL NUMBER
              </th>
              <th scope="col" class="px-6 py-3">
                LATITUDE
              </th>
              <th scope="col" class="px-6 py-3">
                LONGITUDE
              </th>
              <th scope="col" class="px-6 py-3">
                DATETIME
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($locations as $location)
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->device_id }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->latitude }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->longitude }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $location->datetime }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 lg:w-[1150px]" 
            aria-label="Table navigation">
          <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
              Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->firstItem() }}</span> - 
              <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->lastItem() }}</span> of 
              <span class="font-semibold text-gray-900 dark:text-white">{{ $locations->total() }}</span>
          </span>
          {{ $locations->links(data: ['scrollTo' => false]) }}
        </nav>
      </div>
    </div>
  </section>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:mt-[-50px]">
      <div class="bg-slate-200 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-red-100 text-red-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
              rounded-md dark:bg-gray-700 dark:text-red-400 mb-2">
          Measurement
        </span>
        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 lg:w-[1150px] lg:mt-4">
          <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                SERIAL NUMBER
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
              <th scope="col" class="px-6 py-3">
                DATETIME
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
                  {{ $measurement->key }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $measurement->value }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"">
                  {{ $measurement->unit }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $measurement->datetime }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 lg:w-[1150px]" 
            aria-label="Table navigation">
          <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
              Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->firstItem() }}</span> - 
              <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->lastItem() }}</span> of 
              <span class="font-semibold text-gray-900 dark:text-white">{{ $measurements->total() }}</span>
          </span>
          {{ $measurements->links(data: ['scrollTo' => false]) }}
      </nav>
      </div>
    </div>
  </section>
</div>
@livewireScripts
@push('script')
  <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
@endpush

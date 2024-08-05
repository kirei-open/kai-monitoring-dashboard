<div>
  @section('title', $device->serial_number)
  <section class="lg:mt-[7rem] lg:ml-[325px]">
    <button wire:click="createReport" type="button"
      class="text-white bg-blue-700 
      hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
      font-medium rounded-lg text-sm px-5 py-2.5 
      me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
      focus:outline-none dark:focus:ring-blue-800">
      Generate Report
    </button>
  </section>
  {{-- <section class="lg:mt-[7rem]">
    <!-- Modal toggle -->
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
      Toggle modal
    </button>

    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Sign in to our platform
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                                </div>
                                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                            Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

  </section> --}}
  <section class="bg-white dark:bg-gray-900 lg:mt-[-50px]">
    <div class="pt-8 px-4 mx-auto max-w-screen-xl lg:pt-16">
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
        <span
          class="bg-indigo-100 text-indigo-800 text-md font-medium inline-flex items-center px-2.5 py-0.5 
              rounded-md dark:bg-indigo-900 dark:text-indigo-400 mb-2">
          Train
        </span>
        <div class="relative overflow-x-auto lg:mt-4">
          <table class="lg:w-[1150px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Serial Number
                </th>
                <th scope="col" class="px-6 py-3">
                  Train Name
                </th>
                <th scope="col" class="px-6 py-3">
                  Train Image
                </th>
                <th scope="col" class="px-6 py-3">
                  Train Stations
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                  {{ $train->device_id }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $train->name }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <img
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/$train->image"))) }}"
                    width="100" />
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $train->stations->pluck('name')->join(', ') }}
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
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
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
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
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
      </div>
    </div>
  </section>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:mt-[-50px]">
      <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
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
      </div>
    </div>
  </section>
</div>

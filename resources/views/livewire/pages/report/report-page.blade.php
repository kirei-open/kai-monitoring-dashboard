<div>
    @section('title','Report')
    <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">REPORT DATA</h1>
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
    <div class="lg:mt-[-30px] lg:ml-[1650px]">
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium 
            rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none 
            dark:focus:ring-blue-800" id="myBtn">
            @lang('messages.generate all report')
        </button>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="bg-white dark:bg-gray-800 modal-content">
              <span class="close">&times;</span>
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white ml-2 mt-4">
                @lang('messages.generate report by date')
              </h3>
              <div class="flex items-center ml-2">
                <div class="relative mt-8">
                  <span class="text-sm dark:text-white text-gray-900">@lang('messages.start date')</span>
                  <input wire:model="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 
                        focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                        dark:focus:border-blue-500 lg:w-[230px]"
                        type="datetime-local" name="startDate">
                </div>
                <span class="mx-4 text-gray-500 mt-8">@lang('messages.to')</span>
                <div class="relative mt-8">
                  <span class="text-sm dark:text-white text-gray-900">@lang('messages.end date')</span>
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
                        @lang('messages.generate')
                </button>
              </div>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:mt-[20px] mt-[100px] lg:ml-[60px] lg:w-11/12">
        @php
            $lastNumber = ($reports->currentPage() - 1) * $reports->perPage();
        @endphp
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center p-4">
                            @lang('messages.no')
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            @lang('messages.name')
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            @lang('messages.action')
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $index => $report)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4 text-center">{{ ++$lastNumber }}</td>
                        <td class="w-4 p-4 text-center">{{ $report->name }}</td>
                        <td class="w-4 p-4 text-center">
                            @if ($report->file == 'Generating report')
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 
                                        dark:text-gray-300">
                                        @lang('messages.generating')
                                </span>
                            @else
                                <a href="{{ asset($report->file) }}" target="_blank" class="bg-blue-100 text-blue-800 text-xs font-medium 
                                    me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300" disabled>
                                    @lang('messages.download')
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $reports->firstItem() }}</span> - 
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $reports->lastItem() }}</span> 
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $reports->total() }}</span>
                </span>
                {{ $reports->links() }}
            </nav>
        </div>
    </div>
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

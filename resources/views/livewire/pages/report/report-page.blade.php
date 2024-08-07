<div>
    @section('title','Report')
    <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">REPORT DATA</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:mt-[20px] mt-[100px] lg:ml-[60px] lg:w-11/12">
        @php
            $lastNumber = ($reports->currentPage() - 1) * $reports->perPage();
        @endphp
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-center p-4">
                            NO
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            ACTION
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
                                        Generating ...
                                </span>
                            @else
                                <a href="{{ asset($report->file) }}" target="_blank" class="bg-blue-100 text-blue-800 text-xs font-medium 
                                    me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300" disabled>
                                    Download
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

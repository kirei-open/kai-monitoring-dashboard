<div>
  @section('title', 'Event Logger')
  <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">EVENT LOGGER</h1>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:mt-[20px] mt-[100px] lg:ml-[60px] lg:w-11/12">
    @php
      $lastNumber = ($activity_logs->currentPage() - 1) * $activity_logs->perPage();
    @endphp
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="text-center p-4" style="width: 10%">
              NO
            </th>
            <th scope="col" class="text-center px-6 py-3">
              DESCRIPTION
            </th>
            <th scope="col" class="text-center px-6 py-3">
              CREATED AT
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activity_logs as $index => $activity)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4 text-center">{{ ++$lastNumber }}</td>
              <td class="w-4 p-4 text-center">{{ $activity->description }}</td>
              <td class="w-4 p-4 text-center">{{ $activity->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
        aria-label="Table navigation">
        <span
          class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
          Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $activity_logs->firstItem() }}</span> -
          <span class="font-semibold text-gray-900 dark:text-white">{{ $activity_logs->lastItem() }}</span>
          of
          <span class="font-semibold text-gray-900 dark:text-white">{{ $activity_logs->total() }}</span>
        </span>
        {{ $activity_logs->links() }}
      </nav>
    </div>
  </div>
</div>

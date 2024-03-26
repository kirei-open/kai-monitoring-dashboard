<div>
    <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">TABEL MONITORING</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:mt-[20px] lg:ml-[60px] lg:w-11/12">
        <div class="bg-white lg:w-full lg:h-24">
            <div class="flex justify-between">
                <div class="lg:mt-7 lg:ml-5">
                    <span class="absolute my-2 mx-2 text-[#878686]">
                        <x-icon name="magnifying-glass" />
                    </span>
                    <input style="font-family: 'Poppins', sans-serif;" type="text" class="border border-gray-300 pl-10 rounded-xl bg-[#f2f2f8] placeholder:text-[#878686] focus:ring-[#4CA751] focus:border-[#4CA751] w-40 lg:w-72 text-[12px] lg:text-[14px]" placeholder="Search" />
                </div>
                <div class="lg:mt-7">
                    <form wire:submit.prevent="save">
                        <select wire:model="sortBy" wire:change="applyFilter" id="sort" name="sort" style="font-family: 'Poppins', sans-serif;" type="text" class="border border-gray-300 pr-10 text-[#878686] rounded-xl bg-[#f2f2f8] focus:ring-[#4CA751] focus:border-[#4CA751] text-[12px] lg:text-[14px] lg:mr-[30px] lg:w-72">
                            <option value="#" selected disabled>Filter</option>
                            <option value="latest">Terbaru</option>
                            <option value="oldest" selected>Terlama</option>
                        </select>            
                    </form>
                </div>
                
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-neutral-100 uppercase bg-[#2d2a6f] dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        NO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TIME STAMP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID RALOK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LATITUDE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LONGITUDE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SECTION
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TEGANGAN INPUT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TEGANGAN OUTPUT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ARUS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        KLASIFIKASI
                    </th>
                    <th scope="col" class="px-6 py-3">
                        POWER TRANSMITE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SWR
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monitoring as $monitor )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                {{$loop->iteration}}
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$monitor->created_at}}
                        </th>
                        <td class="px-6 py-4">
                            {{$monitor->id_ralok}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->latitude}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->longitude}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->section}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->input_voltage}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->output_voltage}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->voltage}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->clasification}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->power_transmite}}
                        </td>
                        <td class="px-6 py-4">
                            {{$monitor->SWR}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $monitoring->links() }} --}}
    </div>
</div>

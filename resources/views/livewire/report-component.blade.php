<div>
    <h1 class="text-[#a4a2b4] lg:mt-[110px] lg:ml-[60px] lg:text-[20px]">REPORT</h1>
    <div class="grid grid-cols-2 grid-rows-3 grid-flow-col gap-4 mt-3">
        <div class="row-span-3 col-span-1 bg-white dark:bg-gray-900" style="width: 850px; height: auto; margin-left: 3.5rem;"></div>
        <div class="col-span-1">
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:w-[870px] lg:mt-1" style="position: relative;">
                <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px]">Graphic Temperature Monitoring</h5>
                    <div style="position: relative; z-index: 1;">
                        <svg class="lg:mt-1 lg:mr-[100px]" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="8" fill="#ef732f" />
                            <text class="lg:text-[14px]" x="18" y="12" font-size="12" dx="20" fill="#aaa8bc">Temperature</text>
                        </svg>
                        <div class="inline-flex rounded-md shadow-sm lg:mt-[-10px]" role="group" style="position: absolute; top: 0; right: 0;">
                            <button type="button" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Second
                            </button>
                            <button type="button" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Minute
                            </button>
                            <button type="button" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Hour
                            </button>
                        </div>
                    </div>
                </div>
                <div id="chart2" class="px-2.5 lg:mt-[-100px]"></div>
            </div>
        </div>
        <div class="col-span-1">
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:w-[870px] lg:mt-3" style="position: relative;">
                <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px]">Graphic Temperature Monitoring</h5>
                    <div style="position: relative; z-index: 1;">
                        <svg class="lg:mt-1 lg:mr-[100px]" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="8" fill="#eece24" />
                            <text class="lg:text-[14px]" x="18" y="12" font-size="12" dx="20" fill="#aaa8bc">Temperature</text>
                        </svg>
                        <div class="inline-flex rounded-md shadow-sm lg:mt-[-10px]" role="group" style="position: absolute; top: 0; right: 0;">
                            <button type="button" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Second
                            </button>
                            <button type="button" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Minute
                            </button>
                            <button type="button" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Hour
                            </button>
                        </div>
                    </div>
                </div>
                <div id="chart1" class="px-2.5 lg:mt-[-100px]"></div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("load", function() {
            var options = {
                colors: ['#ef732f'],
                series: [{
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                },
                stroke: {
                    width: 3,
                },
                markers: {
                    size: 8,
                    colors: ['#fff'],
                    strokeColors: ['#ef732f'],
                },
                toolbar: {
                    show: false,
                }
            };

            if (document.getElementById("chart2") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("chart2"), options);
                chart.render();
            }
        });
    </script>

    <script>
        window.addEventListener("load", function() {
            var options = {
                colors: ['#eece24'],
                series: [{
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                },
                stroke: {
                    width: 3,
                },
                markers: {
                    size: 8,
                    colors: ['#fff'],
                    strokeColors: ['#eece24'],
                },
                toolbar: {
                    show: false,
                }
            };

            if (document.getElementById("chart1") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("chart1"), options);
                chart.render();
            }
        });
    </script>
</div>

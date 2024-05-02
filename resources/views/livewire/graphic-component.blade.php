<div>
  <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">GRAPHIC MONITORING</h1>
  <form wire:submit.prevent="save" class="max-w-sm mx-auto lg:ml-[60px]">
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Device</label>
    <select name="device_id" id="device_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="" selected disabled>Select Device</option>
      @foreach ($device_id as $id)
        <option value="{{ $id }}">{{ $id }}</option>
      @endforeach
    </select>
  </form>
  <div class="grid grid-cols-2 gap-1 mb-7">
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Tegangan</h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-purple-500 rounded-full me-1.5 flex-shrink-0"></span>Tegangan</span>
      </div>
      <div id="chart" class="px-2.5 lg:mt-[20px]"></div>
    </div>

    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Arus</h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-orange-500 rounded-full me-1.5 flex-shrink-0"></span>Arus</span>
      </div>
      <div id="chart2" class="px-2.5 lg:mt-[20px]"></div>
    </div>

    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Daya Pancar</h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-purple-950 rounded-full me-1.5 flex-shrink-0"></span>Daya pancar</span>
      </div>
      <div id="chart3" class="px-2.5 lg:mt-[20px]"></div>
    </div>

    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic SWR</h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-yellow-300 rounded-full me-1.5 flex-shrink-0"></span>SWR</span>
      </div>
      <div id="chart4" class="px-2.5 lg:mt-[20px]"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    const chartData = {};
    let selectedDevice = '';

    // Event listener for select device dropdown
    document.getElementById('device_id').addEventListener('change', function(event) {
      selectedDevice = event.target.value;

      // Clear chart data for all chart containers
      for (const chartContainerId in chartData) {
        chartData[chartContainerId] = [];
      }

      // Clear existing charts
      for (const chartContainerId in chartContainers) {
        if (chartContainers[chartContainerId]) {
          chartContainers[chartContainerId].destroy();
          delete chartContainers[chartContainerId];
        }
      }
    });

    document.addEventListener("DOMContentLoaded", function (event) {
        window.onload = function () {
            window.Echo.channel('measurement-channel')
                .listen('DeviceMeasurementBroadcast', (data) => {
                    var data = data.data;
                    updateChart(data);
                });
        };
    });

    function updateChart(data) {
        // Check if a device is selected
        if (!selectedDevice) return;
        
        if (data.device_id !== selectedDevice) return;
        
        let chartContainerId;

        switch (data.key) {
          case 'Tegangan':
            chartContainerId = 'chart';
            lineColor = '#5546ff';
            markerColor = '#5546ff';
            break;
          case 'Arus':
            chartContainerId = 'chart2';
            lineColor = '#ef732f';
            markerColor = '#ef732f';
            break;
          case 'Daya Pancar':
            chartContainerId = 'chart3';
            lineColor = '#2f2b70';
            markerColor = '#2f2b70';
            break;
          case 'SWR':
            chartContainerId = 'chart4';
            lineColor = '#eecd23';
            markerColor = '#eecd23';
            break;
          default:
            return;
        }

        console.log(data.device_id);
                  
        const chartContainer = document.getElementById(chartContainerId);
        if (!chartContainer) return;

        const datetime = new Date(data.datetime).getTime();
        const value = parseFloat(data.value);
        const id = parseFloat(data.device_id);

        if (!chartData[chartContainerId]) {
            chartData[chartContainerId] = [];
        }

        chartData[chartContainerId].push({ x: datetime, y: value });

        const maxDataPoints = 10; // Maximum number of data points

        if (chartData[chartContainerId].length > maxDataPoints) {
            chartData[chartContainerId].shift();
        }

        let chart = chartContainers[chartContainerId];
        if (chart) {
            chart.updateSeries([{
                name: data.key,
                data: chartData[chartContainerId]
            }]);
        } else {
            chart = new ApexCharts(chartContainer, {
                series: [{
                    name: data.key,
                    data: chartData[chartContainerId]
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
                    curve: 'straight',
                    colors: [lineColor],
                    width: 3,
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                  show: true,
                  type: 'datetime',
                  labels: {
                    show: true,
                    style: {
                      fontFamily: "Inter, sans-serif",
                      cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                  },
                },
                yaxis: {
                  show: true,
                  type: 'value',
                  labels: {
                    show: true,
                    style: {
                      fontFamily: "Inter, sans-serif",
                      cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                  }
                },
                markers: {
                    size: 8,
                    colors: ['#fff'],
                    strokeColors: [markerColor],
                },
                toolbar: {
                    show: false,
                }
            });
            chart.render();
            chartContainers[chartContainerId] = chart;
        }
    }
    const chartContainers = {};
  </script>
</div>
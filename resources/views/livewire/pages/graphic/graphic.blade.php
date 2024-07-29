<div>
  @section('title', 'Graphic')
  <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">GRAPHIC MONITORING</h1>
  <form wire:submit.prevent="save" class="max-w-sm mx-auto lg:ml-[60px]">
    <label for="select devices" class="block mt-4 text-sm font-medium text-gray-900 dark:text-white">Select Device</label>
    <select name="device_id" id="device_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            hover:cursor-pointer focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
            dark:focus:border-blue-500 mt-4"
      disabled>
            <option value="" selected disabled>Select Device</option>
              @foreach ($device_id as $id)
                <option value="{{ $id }}">{{ $id }}</option>
              @endforeach
    </select>
  </form>
  <form wire:submit.prevent="save" class="max-w-sm mx-auto lg:ml-[1450px] lg:mt-[-95px]">
    <label for="device id" class="block mt-4 text-sm font-medium text-gray-900 dark:text-white">Select Mode</label>
    <select name="" id="dataMode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            hover:cursor-pointer focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
            dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-4">
          <option value="" selected disabled>Select Mode</option>
          <option value="live">Live</option>
          <option value="database">Historical</option>
    </select>
  </form>
  <div class="flex items-center lg:ml-[60px]" id="datetimeFields" style="display: none;">
    <label for="select devices" class="block lg:mt-[-20px] lg:ml-2 text-sm font-medium 
            text-gray-900 dark:text-white">
            Filter
    </label>
    <div class="relative lg:mt-[60px] lg:ml-[-35px]">
      <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 
            focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
            dark:focus:border-blue-500 lg:w-[160px]"
            type="datetime-local" name="" id="startDate" disabled>
    </div>
    <span class="mx-4 text-gray-500 lg:mt-[60px]">To</span>
    <div class="relative lg:mt-[60px]">
      <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 
              focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 
              dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
              dark:focus:border-blue-500 lg:w-[160px]"
              type="datetime-local" name="" id="endDate" disabled>
    </div>
    <button type="reset" id="resetButton" class="focus:outline-none text-white bg-red-700 
            hover:bg-red-800 hover:cursor-pointer focus:ring-4 focus:ring-red-300 
            font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 
            dark:hover:bg-red-700 dark:focus:ring-red-900 lg:ml-6 lg:mt-[70px]"
            disabled>
            Reset
    </button>
  </div>
  <div class="grid grid-cols-2 gap-1 mb-7">
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7"
          style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 
            lg:text-[16px] lg:ml-4">
            Graphic Tegangan
        </h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
          <span class="flex w-2.5 h-2.5 bg-purple-500 rounded-full me-1.5 flex-shrink-0"></span>
          Tegangan
        </span>
      </div>
      <div id="chart" class="px-2.5 lg:mt-[20px]"></div>
    </div>
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7"
      style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">
          Graphic Arus
        </h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
          <span class="flex w-2.5 h-2.5 bg-orange-500 rounded-full me-1.5 flex-shrink-0"></span>
          Arus
        </span>
      </div>
      <div id="chart2" class="px-2.5 lg:mt-[20px]"></div>
    </div>
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7"
          style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">
          Graphic Daya Pancar
        </h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
          <span class="flex w-2.5 h-2.5 bg-purple-950 rounded-full me-1.5 flex-shrink-0"></span>
          Daya pancar
        </span>
      </div>
      <div id="chart3" class="px-2.5 lg:mt-[20px]"></div>
    </div>
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7"
          style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">
          Graphic SWR
        </h5>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
          <span class="flex w-2.5 h-2.5 bg-yellow-300 rounded-full me-1.5 flex-shrink-0"></span>
          SWR
        </span>
      </div>
      <div id="chart4" class="px-2.5 lg:mt-[20px]"></div>
    </div>
  </div>
</div>
@push('script')
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    let chartData = {};
    let selectedDevice = '';
    let mode = '';
    let liveArrayData = '';
    document.addEventListener('livewire:navigated', function() {
      const modeSelect = document.getElementById('dataMode');
      const deviceSelect = document.getElementById('device_id');
      const startDateInput = document.getElementById('startDate');
      const endDateInput = document.getElementById('endDate');
      const resetButton = document.getElementById('resetButton');
      const datetimeFields = document.getElementById('datetimeFields');
      function toggleDatetimeFields(show) {
        if (show) {
          datetimeFields.style.display = 'flex';
        } else {
          datetimeFields.style.display = 'none';
        }
      }
      function toggleResetButton(enable) {
        resetButton.disabled = !enable;
      }
      startDateInput.disabled = true;
      endDateInput.disabled = true;
      toggleDatetimeFields(false);
      toggleResetButton(false);
      modeSelect.addEventListener('change', function(event) {
        mode = event.target.value;
        if (mode === 'live') {
          deviceSelect.disabled = false;
          startDateInput.disabled = true;
          endDateInput.disabled = true;
          toggleDatetimeFields(false);
          toggleResetButton(false);
        } else if (mode === 'database') {
          deviceSelect.disabled = false;
          toggleDatetimeFields(false);
          startDateInput.disabled = true;
          endDateInput.disabled = true;
          toggleResetButton(false);
        } else {
          deviceSelect.disabled = true;
          startDateInput.disabled = true;
          endDateInput.disabled = true;
          toggleDatetimeFields(false);
          toggleResetButton(false);
        }
      });
      deviceSelect.addEventListener('change', function(event) {
        const deviceSelected = event.target.value;

        if (deviceSelected && modeSelect.value === 'database') {
          startDateInput.disabled = false;
          endDateInput.disabled = false;
          toggleDatetimeFields(true);
          toggleResetButton(startDateInput.value !== '');
        } else {
          startDateInput.disabled = true;
          endDateInput.disabled = true;
          toggleDatetimeFields(false);
          toggleResetButton(false);
        }
      });
      startDateInput.addEventListener('change', function() {
        if (startDateInput.value) {
          toggleResetButton(true);
        } else {
          toggleResetButton(false);
        }
      });
      resetButton.addEventListener('click', function() {
        startDateInput.value = '';
        endDateInput.value = '';
        startDateInput.disabled = true;
        endDateInput.disabled = true;
        toggleResetButton(false);
      });
    });
    function createChartConfig(key, lineColor, markerColor) {
      let chartContainerId;
      switch (key) {
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
          return null;
      }
      return {
        series: [],
        chart: {
          height: 350,
          type: 'area',
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
        },
        chartContainerId: chartContainerId
      };
    }
    document.getElementById('device_id').addEventListener('change', function(event) {
      selectedDevice = event.target.value;
      if (mode === 'live') {
        fetch(`/get-last-thirty-minutes/${selectedDevice}`)
          .then(response => response.json())
          .then(data => {
            liveArrayData = data.data;
            for (const chartContainerId in chartData) {
              chartData[chartContainerId] = [];
            }
            for (const chartContainerId in chartContainers) {
              if (chartContainers[chartContainerId]) {
                chartContainers[chartContainerId].destroy();
                delete chartContainers[chartContainerId];
              }
            }
            liveArrayData.forEach(measurement => {
              let lineColor, markerColor;
              const key = measurement.key;
              const config = createChartConfig(key, lineColor, markerColor);
              if (!config) return;
              const {
                chartContainerId
              } = config;
              const datetime = new Date(measurement.datetime).getTime();
              const value = parseFloat(measurement.value);
              if (!chartData[chartContainerId]) {
                chartData[chartContainerId] = [];
              }
              chartData[chartContainerId].push({
                x: datetime,
                y: value
              });
              const chartContainer = document.getElementById(chartContainerId);
              if (!chartContainer) return;
              let chart = chartContainers[chartContainerId];
              if (chart) {
                chart.updateSeries([{
                  data: chartData[chartContainerId]
                }]);
              } else {
                chart = new ApexCharts(chartContainer, config);
                chart.render();
                chartContainers[chartContainerId] = chart;
                chart.updateSeries([{
                  data: chartData[chartContainerId]
                }]);
              }
            });
          })
          .catch(error => {
            console.error('Error:', error);
          });
      }
      for (const chartContainerId in chartData) {
        chartData[chartContainerId] = [];
      }
      for (const chartContainerId in chartContainers) {
        if (chartContainers[chartContainerId]) {
          chartContainers[chartContainerId].destroy();
          delete chartContainers[chartContainerId];
        }
      }
      if (document.getElementById('dataMode').value === 'database') {
        renderChartWithDataFromDatabase();
      }
    });
    document.getElementById('startDate').addEventListener('change', function(event) {
      const startDate = event.target.value;
      const endDate = document.getElementById('endDate').value;
      if (startDate && endDate) {
        renderChartWithDataFromDatabase();
      }
    });
    document.getElementById('endDate').addEventListener('change', function(event) {
      const startDate = document.getElementById('startDate').value;
      const endDate = event.target.value;
      if (startDate && endDate) {
        renderChartWithDataFromDatabase();
      }
    });
    document.getElementById('resetButton').addEventListener('click', function(event) {
      document.getElementById('startDate').value = '';
      document.getElementById('endDate').value = '';
      renderChartWithDataFromDatabase();
    });
    document.addEventListener('livewire:navigated', function(event) {
      document.getElementById('dataMode').addEventListener('change', function(event) {
        mode = event.target.value;
        for (const chartContainerId in chartContainers) {
          if (chartContainers[chartContainerId]) {
            chartContainers[chartContainerId].destroy();
            delete chartContainers[chartContainerId];
          }
        }
        chartData = {};
        if (mode === 'live') {
          enableLiveMode();
        } else if (mode === 'database') {
          window.Echo.channel('measurement-channel')
            .stopListening('DeviceMeasurementBroadcast');
          renderChartWithDataFromDatabase();
        }
      });
    });
    function enableLiveMode() {
      window.Echo.channel('measurement-channel')
        .listen('DeviceMeasurementBroadcast', (data) => {
          var data = data.data;
          console.log(selectedDevice);
          updateChart(data);
        });
    }
    function renderChartWithDataFromDatabase() {
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;
      const shouldFetchData = selectedDevice && ((startDate && endDate) || (!startDate && !endDate));
      if (!shouldFetchData) {
        return;
      }
      fetch(`/get-detail-measurement/${selectedDevice}?startDate=${startDate}&endDate=${endDate}`)
        .then(response => response.json())
        .then(data => {
          const dataArray = data.data;
          for (const chartContainerId in chartData) {
            chartData[chartContainerId] = [];
          }
          for (const chartContainerId in chartContainers) {
            if (chartContainers[chartContainerId]) {
              chartContainers[chartContainerId].destroy();
              delete chartContainers[chartContainerId];
            }
          }
          dataArray.forEach(measurement => {
            let lineColor, markerColor;
            const key = measurement.key;
            const config = createChartConfig(key, lineColor, markerColor);
            if (!config) return;
            const {
              chartContainerId
            } = config;
            const datetime = new Date(measurement.datetime).getTime();
            const value = parseFloat(measurement.value);
            if (!chartData[chartContainerId]) {
              chartData[chartContainerId] = [];
            }
            chartData[chartContainerId].push({
              x: datetime,
              y: value
            });
            const chartContainer = document.getElementById(chartContainerId);
            if (!chartContainer) return;
            let chart = chartContainers[chartContainerId];
            if (chart) {
              chart.updateSeries([{
                data: chartData[chartContainerId]
              }]);
            } else {
              chart = new ApexCharts(chartContainer, config);
              chart.render();
              chartContainers[chartContainerId] = chart;
              chart.updateSeries([{
                data: chartData[chartContainerId]
              }]);
            }
          });
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
    function updateChart(data) {
      if (!selectedDevice) return;
      if (data.device_id !== selectedDevice) return;
      const key = data.key;
      const config = createChartConfig(key);
      if (!config) return;
      const {
        chartContainerId,
        lineColor,
        markerColor
      } = config;
      const chartContainer = document.getElementById(chartContainerId);
      if (!chartContainer) return;
      const datetime = new Date(data.datetime).getTime();
      const value = parseFloat(data.value);
      if (!chartData[chartContainerId]) {
        chartData[chartContainerId] = [];
      }

      chartData[chartContainerId].push({
        x: datetime,
        y: value
      });

      const maxDataPoints = 15;
      const excessDataPoints = chartData[chartContainerId].length - (maxDataPoints - 1);

      if (excessDataPoints > 0) {
        chartData[chartContainerId].splice(0, excessDataPoints);
      }
      let chart = chartContainers[chartContainerId];
      if (chart) {
        chart.updateSeries([{
          name: data.key,
          data: chartData[chartContainerId]
        }]);
      } else {
        chart = new ApexCharts(chartContainer, config);
        chart.render();
        chartContainers[chartContainerId] = chart;
        chart.updateSeries([{
          name: data.key,
          data: chartData[chartContainerId]
        }]);
      }
    }
    const chartContainers = {};
  </script>
@endpush

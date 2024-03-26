<div>
  <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">GRAPHIC MONITORING</h1>
  <div class="grid grid-cols-2 gap-1 mb-7">
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px]">Graphic Temperature Monitoring</h5>
        <div style="position: relative; z-index: 1;">
          <svg class="lg:mt-1 lg:mr-[100px]" xmlns="http://www.w3.org/2000/svg">
            <circle cx="8" cy="8" r="8" fill="#5546ff" />
            <text class="lg:text-[14px]" x="18" y="12" font-size="12" dx="20" fill="#aaa8bc">Temperature</text>
          </svg>
          <div class="inline-flex rounded-md shadow-sm lg:mt-[-10px]" role="group" style="position: absolute; top: 0; right: 0;">
            <button type="button" onclick="updateInterval1('second')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Second
            </button>
            <button type="button" onclick="updateInterval1('minute')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Minute
            </button>
            <button type="button" onclick="updateInterval1('hour')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Hour
            </button>
          </div>
        </div>
      </div>
      <div id="chart" class="px-2.5 lg:mt-[-100px]"></div>
    </div>

    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px]">Graphic Humidity Monitoring</h5>
        <div style="position: relative; z-index: 1;">
          <svg class="lg:mt-1 lg:mr-[100px]" xmlns="http://www.w3.org/2000/svg">
            <circle cx="8" cy="8" r="8" fill="#ef732f" />
            <text class="lg:text-[14px]" x="18" y="12" font-size="12" dx="20" fill="#aaa8bc">Humidity</text>
          </svg>
          <div class="inline-flex rounded-md shadow-sm lg:mt-[-10px]" role="group" style="position: absolute; top: 0; right: 0;">
            <button type="button" onclick="updateInterval2('second')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Second
            </button>
            <button type="button" onclick="updateInterval2('minute')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Minute
            </button>
            <button type="button" onclick="updateInterval2('hour')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Hour
            </button>
          </div>
        </div>
      </div>
      <div id="chart2" class="px-2.5 lg:mt-[-100px]"></div>
    </div>

    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px]">Graphic Pressure Monitoring</h5>
        <div style="position: relative; z-index: 1;">
          <svg class="lg:mt-1 lg:mr-[100px]" xmlns="http://www.w3.org/2000/svg">
            <circle cx="8" cy="8" r="8" fill="#2f2b70" />
            <text class="lg:text-[14px]" x="18" y="12" font-size="12" dx="20" fill="#aaa8bc">Pressure</text>
          </svg>
          <div class="inline-flex rounded-md shadow-sm lg:mt-[-10px]" role="group" style="position: absolute; top: 0; right: 0;">
            <button type="button" onclick="updateInterval3('second')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Second
            </button>
            <button type="button" onclick="updateInterval3('minute')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Minute
            </button>
            <button type="button" onclick="updateInterval3('hour')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Hour
            </button>
          </div>
        </div>
      </div>
      <div id="chart3" class="px-2.5 lg:mt-[-100px]"></div>
    </div>

    <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7" style="position: relative;">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px]">Graphic Cahaya Monitoring</h5>
        <div style="position: relative; z-index: 1;">
          <svg class="lg:mt-1 lg:mr-[100px]" xmlns="http://www.w3.org/2000/svg">
            <circle cx="8" cy="8" r="8" fill="#eecd23" />
            <text class="lg:text-[14px]" x="18" y="12" font-size="12" dx="20" fill="#aaa8bc">Cahaya</text>
          </svg>
          <div class="inline-flex rounded-md shadow-sm lg:mt-[-10px]" role="group" style="position: absolute; top: 0; right: 0;">
            <button type="button" onclick="updateInterval4('second')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Second
            </button>
            <button type="button" onclick="updateInterval4('minute')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Minute
            </button>
            <button type="button" onclick="updateInterval4('hour')" class="px-4 py-2 text-sm font-medium text-[#57548d] bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:bg-[#2d2a6f] focus:text-slate-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Hour
            </button>
          </div>
        </div>
      </div>
      <div id="chart4" class="px-2.5 lg:mt-[-100px]"></div>
    </div>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.0/dist/apexcharts.min.js"></script>
  <!-- Script For Temprature -->
  <script>
    let intervalId1;
    let activeTab1 = 'second';
    let chart;

    function updateInterval1(tab) {
        clearInterval(intervalId1);
        activeTab1 = tab;
        switch (tab) {
            case 'second':
                intervalId1 = setInterval(updateData1, 1000);
                break;
            case 'minute':
                intervalId1 = setInterval(updateData1, 60000);
                break;
            case 'hour':
                intervalId1 = setInterval(updateData1, 3600000);
                break;
            default:
                break;
        }
    }

    function updateData1() {
        const newData = Array.from({ length: 9 }, () => Math.floor(Math.random() * 100));

        if (chart) {
            chart.updateOptions({
                series: [{
                    data: newData
                }]
            });
        } else if (document.getElementById("chart") && typeof ApexCharts !== 'undefined') {
            chart = new ApexCharts(document.getElementById("chart"), {
                colors: ['#5546ff'],
                series: [{
                    name: "Temperature",
                    data: newData
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
                    strokeColors: ['#5546ff'],
                },
                toolbar: {
                    show: false,
                }
            });

            chart.render();
        }
    }

    updateInterval1(activeTab1);
  </script>
  
  <!-- Script For Humidity -->
  <script>
    let intervalId2;
    let activeTab2 = 'second';
    let chart2;

    function updateInterval2(tab) {
      clearInterval(intervalId2);
      activeTab2 = tab;
      switch (tab) {
        case 'second':
          intervalId2 = setInterval(updateData2, 1000);
          break;
        case 'minute':
          intervalId2 = setInterval(updateData2, 60000);
          break;
        case 'hour':
          intervalId2 = setInterval(updateData2, 3600000);
          break;
        default:
          break;
      }
    }

    function updateData2() {
      const newData = Array.from({ length: 9 }, () => Math.floor(Math.random() * 100));

      if (chart2) {
        chart2.updateOptions({
          series: [{
            data: newData
          }]
        });
      } else if (document.getElementById("chart2") && typeof ApexCharts !== 'undefined') {
        chart2 = new ApexCharts(document.getElementById("chart2"), {
          colors: ['#ef732f'],
          series: [{
            name: "Humidity",
            data: newData
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
        });

        chart2.render();
      }
    }

    updateInterval2(activeTab2);
  </script>

  <script>
    let intervalId3;
    let activeTab3 = 'second';
    let chart3;

    function updateInterval3(tab) {
      clearInterval(intervalId3);
      activeTab3 = tab;
      switch (tab) {
        case 'second':
          intervalId3 = setInterval(updateData3, 1000);
          break;
        case 'minute':
          intervalId3 = setInterval(updateData3, 60000);
          break;
        case 'hour':
          intervalId3 = setInterval(updateData3, 3600000);
          break;
        default:
          break;
      }
    }

    function updateData3() {
      const newData = Array.from({ length: 9 }, () => Math.floor(Math.random() * 100));

      if (chart3) {
        chart3.updateOptions({
          series: [{
            data: newData
          }]
        });
      } else if (document.getElementById("chart3") && typeof ApexCharts !== 'undefined') {
        chart3 = new ApexCharts(document.getElementById("chart3"), {
          colors: ['#2f2b70'],
          series: [{
            name: "Pressure",
            data: newData
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
            strokeColors: ['#2f2b70'],
          },
          toolbar: {
            show: false,
          }
        });

        chart3.render();
      }
    }

    updateInterval3(activeTab3);
  </script>

<script>
  let intervalId4;
  let activeTab4 = 'second';
  let chart4;

  function updateInterval4(tab) {
    clearInterval(intervalId4);
    activeTab4 = tab;
    switch (tab) {
      case 'second':
        intervalId4 = setInterval(updateData4, 1000);
        break;
      case 'minute':
        intervalId4 = setInterval(updateData4, 60000);
        break;
      case 'hour':
        intervalId4 = setInterval(updateData4, 3600000);
        break;
      default:
        break;
    }
  }

  function updateData4() {
    const newData = Array.from({ length: 9 }, () => Math.floor(Math.random() * 100));

    if (chart4) {
      chart4.updateOptions({
        series: [{
          data: newData
        }]
      });
    } else if (document.getElementById("chart4") && typeof ApexCharts !== 'undefined') {
      chart4 = new ApexCharts(document.getElementById("chart4"), {
        colors: ['#eecd23'],
        series: [{
          name: "Cahaya",
          data: newData
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
          strokeColors: ['#eecd23'],
        },
        toolbar: {
          show: false,
        }
      });

      chart4.render();
    }
  }

  updateInterval4(activeTab4);
</script>

</div>
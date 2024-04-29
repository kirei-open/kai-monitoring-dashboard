<div>
    <h1 class="text-[#a4a2b4] lg:mt-[120px] lg:ml-[60px] lg:text-[20px]">GRAPHIC MONITORING</h1>
    <div class="grid grid-cols-2 gap-1 mb-7">
      <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7" style="position: relative;">
        <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
          <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Temperature Monitoring</h5>
          <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-purple-500 rounded-full me-1.5 flex-shrink-0"></span>Temprature</span>
        </div>
        <div id="chart" class="px-2.5 lg:mt-[20px]"></div>
      </div>
  
      <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7" style="position: relative;">
        <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
          <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Humidity Monitoring</h5>
          <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-orange-500 rounded-full me-1.5 flex-shrink-0"></span>Humidity</span>
        </div>
        <div id="chart2" class="px-2.5 lg:mt-[20px]"></div>
      </div>
  
      <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[60px] lg:w-[870px] lg:mt-7" style="position: relative;">
        <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
          <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Pressure Monitoring</h5>
          <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-purple-950 rounded-full me-1.5 flex-shrink-0"></span>Pressure</span>
        </div>
        <div id="chart3" class="px-2.5 lg:mt-[20px]"></div>
      </div>
  
      <div class="bg-white rounded-lg shadow dark:bg-gray-800 lg:ml-[10px] lg:w-[870px] lg:mt-7" style="position: relative;">
        <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
          <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2 lg:text-[16px] lg:ml-4">Graphic Cahaya Monitoring</h5>
          <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3"><span class="flex w-2.5 h-2.5 bg-yellow-300 rounded-full me-1.5 flex-shrink-0"></span>Cahaya</span>
        </div>
        <div id="chart4" class="px-2.5 lg:mt-[20px]"></div>
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
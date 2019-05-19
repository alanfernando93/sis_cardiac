<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>   

<script type="text/javascript">
  $(function () {
    $(document).ready(function () {
      $('#container').highcharts({
        chart: {
          type: 'spline',
          inverted: true
        },
        title: {
          text: 'Atmosphere Temperature by Altitude'
        },
        subtitle: {
          text: 'According to the Standard Atmosphere Model'
        },
        xAxis: {
          reversed: false,
          title: {
            enabled: true,
            text: 'Altitude'
          },
          labels: {
            format: '{value} km'
          },
          maxPadding: 0.05,
          showLastLabel: true
        },
        yAxis: {
          title: {
            text: 'Temperature'
          },
          labels: {
            format: '{value}°'
          },
          lineWidth: 2
        },
        legend: {
          enabled: false
        },
        tooltip: {
          headerFormat: '<b>{series.name}</b><br/>',
          pointFormat: '{point.x} km: {point.y}°C'
        },
        plotOptions: {
          spline: {
            marker: {
              enable: false
            }
          }
        },
        series: [{
            name: 'Temperature',
            data: [[0, 15], [10, -50], [20, -56.5], [30, -46.5], [40, -22.1],
              [50, -2.5], [60, -27.7], [70, -55.7], [80, -76.5]]
          }]
      });
    });
  });

</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>   

<script type="text/javascript">
    function getData(n) {
    var arr = [],
        i,
        x,
        a,
        b,
        c,
        spike;
    for (
        i = 0, x = Date.UTC(new Date().getUTCFullYear(), 0, 1) - n * 36e5;
        i < n;
        i = i + 1, x = x + 36e5
    ) {
        if (i % 100 === 0) {
            a = 2 * Math.random();
        }
        if (i % 1000 === 0) {
            b = 2 * Math.random();
        }
        if (i % 10000 === 0) {
            c = 2 * Math.random();
        }
        if (i % 50000 === 0) {
            spike = 10;
        } else {
            spike = 0;
        }
        arr.push([
            x,
            2 * Math.sin(i / 100) + a + b + c + spike + Math.random()
        ]);
    }
    return arr;
}
var n = 1000,
data = getData(n);
console.log(data);

console.time('line');
$(function () {
    $(document).ready(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'x',
            },
            title: {
                text: 'Highcharts drawing ' + n + ' points'
            },

            subtitle: {
                text: 'Using the Boost module'
            },

            tooltip: {
                valueDecimals: 1
            },

            xAxis: {
                type: 'datetime',       
                tickPixelInterval: 150
            },

            series: [{
                data: data,
                name: 'Hourly data points'
            }]
        });
    });
});

</script>
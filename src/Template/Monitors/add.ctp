<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monitor $monitor
 */
?>
<style type="text/css">
  .highcharts-container{
    width: 100%
  }
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= __('Examinar') ?></h1>
</div>
<div class="container">
  <?= $this->Form->create($monitor) ?>
  <?= $this->Form->hidden('value', ['value' => '0']) ?>
  <?= $this->Form->hidden('time', ['value' => '0']) ?>
  <?= $this->Form->hidden('personal_id', ['value' => $current_user['id']]) ?>
  <?= $this->Form->hidden('report.path', ['value' => WWW_ROOT . 'files/']) ?>
  <?= $this->Form->hidden('report.file', ['value' => 'monitors-' . round(microtime(true) * 1000)]) ?>
  <div id="wizard">
    <!-- SECTION 1 -->
    <h4></h4>
    <section>
      <div class="form-row">
        <div class="form-holder">
          <?php
          echo $this->Form->control('patient_id', ['options' => $patient]);
          ?>
        </div>
        <div class="form-holder w-100">
          <?php
          echo $this->Form->label('report.description');
          echo $this->Form->textarea('report.description', ['id' => 'report-patient']);
          ?>
        </div>
      </div>
    </section>

    <!-- SECTION 2 -->
    <h4></h4>
    <section>
      <div class="charts">
        <div id="container" style="width: calc(100% - 35%); height: 400px; margin: 0"></div>
      </div>
    </section>

    <!-- SECTION 3 -->
    <h4></h4>
    <section>
      <div class="form-row">
        <div class="form-holder">
          <?php
          echo $this->Form->control('report.path', ['disabled' => true, 'value' => 'webroot/files/'])
          ?>
        </div>
        <div class="form-holder">
          <?php
          echo $this->Form->control('report.file', ['disabled' => true, 'value' => 'monitors-' . round(microtime(true) * 1000)])
          ?>
        </div>
      </div>
    </section>
  </div>
  <?= $this->Form->button(__('Submit'), ['class' => 'd-none']) ?>
  <input type='button'  class='d-none' id='event_data_chart' value='event ajax'/>
  <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
  $(function () {
    $("#wizard").steps({
      headerTag: "h4",
      bodyTag: "section",
      transitionEffect: "fade",
      enableAllSteps: true,
      transitionEffectSpeed: 500,
      onStepChanging: function (event, currentIndex, newIndex) {
        
        if (currentIndex == 0) {
          document.getElementById('event_data_chart').click();
        }
        if (newIndex >= 1) {
          $('.actions ul').addClass('actions-next');
        } else {
          $('.actions ul').removeClass('actions-next');
        }
        return true;
      },
      onFinished: function (event, currentIndex) {
        $('button[type="submit"]').click();
      },
      labels: {
        finish: "Finish",
        next: "Continue",
        previous: "Back"
      }
    });
    // Custom Steps 
    $('.wizard > .steps li a').click(function () {
      $(this).parent().addClass('checked');
      $(this).parent().prevAll().addClass('checked');
      $(this).parent().nextAll().removeClass('checked');
    });
    // Custom Button Jquery Step
    $('.forward').click(function () {
      $("#wizard").steps('next');
    });
    $('.backward').click(function () {
      $("#wizard").steps('previous');
    });
    // Input Focus
    $('.form-holder').delegate("input", "focus", function () {
      $('.form-holder').removeClass("active");
      $(this).parent().addClass("active");
    });
  });
</script> 

<script type="text/javascript">
  $(function () {
    var series;
    $(document).ready(function () {
      var ultimox;
      var ultimoy;
      $.ajax({
        url: '/sis_cardiac/data-rest',
        type: 'get',
        success: function (DatosRecuperados) {
          
          var datos = [];
          //console.log(DatosRecuperados)
          if (!Array.isArray(DatosRecuperados)) {
            DatosRecuperados = JSON.parse(DatosRecuperados);
          }
          
          DatosRecuperados.forEach(row => {
            datos.push([new Date(row['y']).getTime(), parseInt(row['x'])]);
          })
          DatosRecuperados = datos;
          
          $.each(DatosRecuperados, function (i, o) {
            
            //setx(DatosRecuperados[(DatosRecuperados.length) - 1].x);
            //sety(DatosRecuperados[(DatosRecuperados.length) - 1].y);

            $('#container').highcharts({
              chart: {
                zoomType: 'x',
                animation: Highcharts.svg,
                marginRight: 10,
                events: {load: function () {
                    series = this.series[0];
                  }}
              },
              title: {
                text: 'Monitor en tiempo real',
                align: 'left'
              },
              xAxis: {
                type: 'datetime',       
                tickPixelInterval: 100,
              },
              yAxis: {
                title: {
                    text: 'Signos vilates',
                },
                tickPixelInterval: 50,
              },
              legend: {
                enabled: false
              },
              exporting: {
                enabled: false
              },
              series: [{
                name: 'Random data', 
                withLine: 0.2,
                data: DatosRecuperados}]
            });
          });
        }
      })


    });

    $('#event_data_chart').click(function() {
      setInterval(function () {
        $.get("/sis_cardiac/data-rest/update", function (UltimosDatos) {
          
          if (!Array.isArray(UltimosDatos)) {
            UltimosDatos = JSON.parse(UltimosDatos);
          }
          
          var datos = [new Date(UltimosDatos[0].y).getTime(), parseInt(UltimosDatos[0].x)];
          
          
          // DATOS REALES
          var sig_cardiac = parseInt(UltimosDatos[0].x);
          var timestamp = (new Date(UltimosDatos[0].y)).getTime();
          
          // DATOS ALEATORIOS
          //var sig_cardiac = parseInt(Math.random() * (250 - 50) + 50, 10);
          //var timestamp = (new Date()).getTime();
          
          UltimosDatos = datos;
          console.log([timestamp, sig_cardiac])
          series.addPoint([timestamp, sig_cardiac]);
        });
      }, 500);
    })
    
    function getx() {
      return ultimox;
    }
    function gety() {
      return ultimoy;
    }
    function setx(x) {
      ultimox = x;
    }
    function sety(y) {
      ultimoy = y;
    }
  });
</script>
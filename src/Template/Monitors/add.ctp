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
          echo $this->Form->control('report.description', ['id' => 'report-patient']);
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
    $(document).ready(function () {
      var ultimox;
      var ultimoy;
      $.ajax({
        url: '/sis_cardiac/data-rest',
        type: 'get',
        success: function (DatosRecuperados) {
          DatosRecuperados = JSON.parse(DatosRecuperados);
          $.each(DatosRecuperados, function (i, o) {
            if (o.x) {
              DatosRecuperados[i].x = parseInt(o.x);
            }
            if (o.y) {
              DatosRecuperados[i].y = parseFloat(o.y);
            }

            setx(DatosRecuperados[(DatosRecuperados.length) - 1].x);
            sety(DatosRecuperados[(DatosRecuperados.length) - 1].y);

            $('#container').highcharts({
              chart: {
                type: 'spline',
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
              xAxis: {tickPixelInterval: 150},
              yAxis: {title: {text: 'Value'},
                plotLines: [{value: 0, width: 1, color: '#808080'}]
              },
              tooltip: {
                formatter: function () {
                  return '<b>' + this.series.name + '</b><br/>' +
                          Highcharts.numberFormat(this.x, 2) + '<br/>' +
                          Highcharts.numberFormat(this.y, 2);
                }
              },
              legend: {
                enabled: false
              },
              exporting: {
                enabled: false
              },
              series: [{name: 'Random data', data: DatosRecuperados}]
            });
          });
        }
      })

    });

    setInterval(function () {
      $.get("/sis_cardiac/data-rest/update", function (UltimosDatos) {
        UltimosDatos = JSON.parse(UltimosDatos);
        var varlocalx = parseFloat(UltimosDatos[0].x);
        var varlocaly = parseFloat(UltimosDatos[0].y);
        if ((getx() != varlocalx) && (gety() != varlocaly)) {
          series.addPoint([varlocalx, varlocaly], true, true);
          setx(varlocalx);
          sety(varlocaly);
        }
      });
    }, 1000);
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
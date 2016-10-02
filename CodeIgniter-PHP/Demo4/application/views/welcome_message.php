<?php //echo "<pre>"; print_r($tproductos); echo "</pre>"; ?>
<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>Software Factory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" />

    <link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/font-style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/flexslider.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lineandbars.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/dash-charts.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/gauge.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <!-- NOTY JAVASCRIPT -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/noty/layouts/top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/noty/layouts/topLeft.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/noty/layouts/topRight.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/noty/layouts/topCenter.js"></script>
    <script src="https://code.highcharts.com/modules/funnel.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- You can add more layouts if you want -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
    <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin.js"></script>
      
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>
<script type="text/javascript">
    


    $(document).ready(function() {
        info = new Highcharts.Chart({
            chart: {
                renderTo: 'load',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none',
                            
            },
            
            title: {
                text: null
            },

            tooltip: {
                formatter: function() { 
                    return this.point.name +': '+ this.y +' SubCategorias';
                        
                }   
            },
            series: [
                {
                borderWidth: 2,
                borderColor: '#ffffff',
                shadow: false,  
                type: 'pie',
                name: 'Income',
                innerSize: '65%',
                data: [
                   <?php foreach ($tdona1 as $value){ ?>
                { name:'<?php echo $value["no_categoria"] ?>',  y:<?php echo $value["total"] ?>},
                <?php } ?>
                ],
                dataLabels: {
                    enabled: false,
                    color: '#000000',
                    connectorColor: '#000000'
                }
            }]
        });
        
    });

/*** second Chart in Dashboard page ***/

    $(document).ready(function() {
        var data=[  
                <?php foreach ($tdona2 as $value){ ?>
                { name:'<?php echo $value["no_categoria"] ?>',  y:<?php echo $value["total"] ?>},
                <?php } ?>
                ];
        info = new Highcharts.Chart({
            chart: {
                renderTo: 'space',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none',
                            
            },
            
            title: {
                text: null
            },

            tooltip: {
                formatter: function() { 
                    return this.point.name +': '+ this.y +' Articulos';
                        
                }   
            },
            series: [
                {
                borderWidth: 2,
                borderColor: '#F1F3EB',
                shadow: false,  
                type: 'pie',
                name: 'SiteInfo',
                innerSize: '65%',
                data: data,
                dataLabels: {
                    enabled: false,
                    color: '#000000',
                    connectorColor: '#000000'
                }
            }]
        });
        
    });


$(document).ready(function () {
    info = new Highcharts.Chart({
        chart: {
                renderTo: 'cerro',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none',
                            
            },
         title: {
            text: 'Otro tipo de graficos',
            x: -20 //center
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});
Highcharts.theme = {
   colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
      '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
   chart: {
      backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
         stops: [
            [0, '#2a2a2b'],
            [1, '#3e3e40']
         ]
      },
      style: {
         fontFamily: '\'Unica One\', sans-serif'
      },
      plotBorderColor: '#606063'
   },
   title: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase',
         fontSize: '20px'
      }
   },
   subtitle: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase'
      }
   },
   xAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      title: {
         style: {
            color: '#A0A0A3'

         }
      }
   },
   yAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      tickWidth: 1,
      title: {
         style: {
            color: '#A0A0A3'
         }
      }
   },
   tooltip: {
      backgroundColor: 'rgba(0, 0, 0, 0.85)',
      style: {
         color: '#F0F0F0'
      }
   },
   plotOptions: {
      series: {
         dataLabels: {
            color: '#B0B0B3'
         },
         marker: {
            lineColor: '#333'
         }
      },
      boxplot: {
         fillColor: '#505053'
      },
      candlestick: {
         lineColor: 'white'
      },
      errorbar: {
         color: 'white'
      }
   },
   legend: {
      itemStyle: {
         color: '#E0E0E3'
      },
      itemHoverStyle: {
         color: '#FFF'
      },
      itemHiddenStyle: {
         color: '#606063'
      }
   },
   credits: {
      style: {
         color: '#666'
      }
   },
   labels: {
      style: {
         color: '#707073'
      }
   },

   drilldown: {
      activeAxisLabelStyle: {
         color: '#F0F0F3'
      },
      activeDataLabelStyle: {
         color: '#F0F0F3'
      }
   },

   navigation: {
      buttonOptions: {
         symbolStroke: '#DDDDDD',
         theme: {
            fill: '#505053'
         }
      }
   },

   // scroll charts
   rangeSelector: {
      buttonTheme: {
         fill: '#505053',
         stroke: '#000000',
         style: {
            color: '#CCC'
         },
         states: {
            hover: {
               fill: '#707073',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            },
            select: {
               fill: '#000003',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            }
         }
      },
      inputBoxBorderColor: '#505053',
      inputStyle: {
         backgroundColor: '#333',
         color: 'silver'
      },
      labelStyle: {
         color: 'silver'
      }
   },

   navigator: {
      handles: {
         backgroundColor: '#666',
         borderColor: '#AAA'
      },
      outlineColor: '#CCC',
      maskFill: 'rgba(255,255,255,0.1)',
      series: {
         color: '#7798BF',
         lineColor: '#A6C7ED'
      },
      xAxis: {
         gridLineColor: '#505053'
      }
   },

   scrollbar: {
      barBackgroundColor: '#808083',
      barBorderColor: '#808083',
      buttonArrowColor: '#CCC',
      buttonBackgroundColor: '#606063',
      buttonBorderColor: '#606063',
      rifleColor: '#FFF',
      trackBackgroundColor: '#404043',
      trackBorderColor: '#404043'
   },

   // special colors for some of the
   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
   background2: '#505053',
   dataLabelsColor: '#B0B0B3',
   textColor: '#C0C0C0',
   contrastTextColor: '#F0F0F3',
   maskColor: 'rgba(255,255,255,0.3)'
};

Highcharts.setOptions(Highcharts.theme);
$(document).ready(function () {
    // Create the chart
    info = new Highcharts.Chart({
        colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
                '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'
            ],
        chart: {
                renderTo: 'pie',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none',
                type: 'pie'
                            
            },
        title: {
            text: 'Cantidad de Praductos por Categorias',
            style: {
                    color: '#E0E0E3',
                    textTransform: 'uppercase',
                    fontSize: '20px'
                }
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}',
                    style: {
                        color: '#B0B0B3'
                    }
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> Productos <br/>'
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            color: '#ffffff',
            data: [


              <?php foreach ($tpie as $value){ ?>
                { name:'<?php echo $value["no_categoria"] ?>',  y:<?php echo $value["total"] ?>, drilldown: '<?php echo $value["id_categoria"] ?>'},
                <?php } ?>

           ]
        }],
        drilldown: {
            series: [
                  <?php foreach ($tpiedatos as $value){ ?>
                { name:'<?php echo $value["id_categoria"] ?>',  id:'<?php echo $value["id_categoria"] ?>', 
                 data: [
                  <?php foreach ($tpiedatos as $value2){ ?>
                 <?php if($value["id_categoria"] == $value2["id_categoria"] ){?>
                 ['<?php echo $value2["no_subcategoria"] ?>',  <?php echo $value2["total"] ?>],
                 <?php } ?>
                 <?php } ?>
                 ]
                },
                <?php } ?>




          ]
        }
    });
});


$(document).ready(function () {

     info = new Highcharts.Chart({
        chart: {
                renderTo: 'piramide',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none',
                type: 'pyramid',
                marginRight: 100
        },
        title: {
            text: '',
            x: -50
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'SubCategorias',
            data: [
                <?php foreach ($tpiramide as $value){ ?>
                ['<?php echo $value["no_subcategoria"] ?>',   <?php echo $value["cantidad"] ?>],
                <?php } ?>
            ]
        }]
    });
});

$(document).ready(function () {
    info = new Highcharts.Chart({
        chart: {
                renderTo: 'dona',
                backgroundColor: null,
                plotBackgroundColor: 'none',
            plotShadow: false
        },
        title: {
            text: '',
            align: 'center',
            verticalAlign: 'middle',
            y: 10
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '50%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '40%',
            data: [

                <?php foreach ($tproductos as $value){ ?>
                ['<?php echo $value["no_categoria"] ?>',   <?php echo $value["total"] ?>],
                <?php } ?>
            
            ]
        }]
    });
});

$(document).ready(function () {
    // Create the chart
   info = new Highcharts.Chart({
        chart: {
                renderTo: 'barra',
                backgroundColor: null,
                plotBackgroundColor: 'none',
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [
                    <?php foreach ($tbarras as $value){ ?>
                { name:'<?php echo $value["no_subcategoria"] ?>',  y: <?php echo $value["cantidad"] ?>, drilldown: '<?php echo $value["no_subcategoria"] ?>'},
                <?php } ?>
                  ]
        }],
        drilldown: {
            series: [{
                name: 'Anillos',
                id: 'Anillos',
                data: [

                <?php foreach ($tbarras1 as $value){ ?>
                ['<?php echo $value["no_producto"] ?>', <?php echo $value["cantidad"] ?>],
                <?php } ?>
                ]
            }, {
                name: 'Aretes',
                id: 'Aretes',
                data: [
                    <?php foreach ($tbarras2 as $value){ ?>
                ['<?php echo $value["no_producto"] ?>', <?php echo $value["cantidad"] ?>],
                <?php } ?>
                ]
            }]
        }
    });
});
</script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
   

    <!-- Google Fonts call. Font Used Open Sans & Raleway -->
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>    
  </head>
  <body>
  
    <!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="<?php echo base_url() ?>assets/images/logo30.png" alt=""> Software Factory</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href=""><i class="icon-home icon-white"></i> Home</a></li>                            
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

      <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

          <!-- USER PROFILE BLOCK -->
            <div class="col-sm-9 col-lg-9">
                <div class="dash-unit" style="height:500px;">
                    <dtitle>Cantidad de productos por Categoria</dtitle>
                    <hr>
                    <div id="pie"></div>
                </div>
            </div>

          <!-- DONUT CHART BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit" style="height:500px;">
                    <dtitle>Seleccion de productos</dtitle>
                    <hr>
                    <div id="load"></div>
                    <h2>Categorias</h2>
                    <div id="space"></div>
                    <h2>Subcategorias</h2>
                </div>
            </div>
     </div><!-- /row -->
      
      
    
      <div class="row">

        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit" style="height:350px;">
                <dtitle>Algunos Productos</dtitle>
                <hr>
                <br>
                <br>
                <div id="piramide"></div>
            </div>
        </div>
        <div class="col-sm-9 col-lg-9">
            <div class="dash-unit" style="height:350px;">
                <dtitle>Otro tipo de estadisticas</dtitle>
                <hr>
                <div id="cerro"></div>
            </div>
        </div>
        


      </div><!-- /row -->
     
 
      <!-- THIRD ROW OF BLOCKS -->     
      <div class="row">
      
        <div class="col-sm-6 col-lg-6">
            <div class="dash-unit">
                <dtitle>Categorias</dtitle>
                <hr>
                <div id="dona"></div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-6">
            <div class="dash-unit">
                <dtitle>Comparacion de 2 subcategorias</dtitle>
                <hr>
                <div id="barra"></div>
            </div>
        </div>
      </div><!-- /row -->

      
    </div> <!-- /container -->
    <div id="footerwrap">
        <footer class="clearfix"></footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                <p>Blocks Dashboard Theme - Copyright 2013</p>
                </div>

            </div><!-- /row -->
        </div><!-- /container -->       
    </div><!-- /footerwrap -->
          
</body></html>
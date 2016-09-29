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
                    return this.point.name +': '+ this.y +' %';
                        
                }   
            },
            series: [
                {
                borderWidth: 2,
                borderColor: '#F1F3EB',
                shadow: false,  
                type: 'pie',
                name: 'Income',
                innerSize: '65%',
                data: [
                    { name: 'load percentage', y: 45.0, color: '#b2c831' }
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
        var data=[{ name: 'Used', y: 65.0 },{ name: 'Rest', y: 35.0 }
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
                    return this.point.name +': '+ this.y +' %';
                        
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
            text: 'Monthly Average Temperature',
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

$(document).ready(function () {
    // Create the chart
    info = new Highcharts.Chart({
        chart: {
                renderTo: 'pie',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none',
                type: 'pie'
                            
            },
        title: {
            text: 'Browser market shares. January, 2015 to May, 2015'
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
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
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33,
                drilldown: 'Microsoft Internet Explorer'
            }, {
                name: 'Chrome',
                y: 24.03,
                drilldown: 'Chrome'
            }, {
                name: 'Firefox',
                y: 10.38,
                drilldown: 'Firefox'
            }, {
                name: 'Safari',
                y: 4.77,
                drilldown: 'Safari'
            }, {
                name: 'Opera',
                y: 0.91,
                drilldown: 'Opera'
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2,
                drilldown: null
            }]
        }],
        drilldown: {
            series: [{
                name: 'Microsoft Internet Explorer',
                id: 'Microsoft Internet Explorer',
                data: [
                    ['v11.0', 24.13],
                    ['v8.0', 17.2],
                    ['v9.0', 8.11],
                    ['v10.0', 5.33],
                    ['v6.0', 1.06],
                    ['v7.0', 0.5]
                ]
            }, {
                name: 'Chrome',
                id: 'Chrome',
                data: [
                    ['v40.0', 5],
                    ['v41.0', 4.32],
                    ['v42.0', 3.68],
                    ['v39.0', 2.96],
                    ['v36.0', 2.53],
                    ['v43.0', 1.45],
                    ['v31.0', 1.24],
                    ['v35.0', 0.85],
                    ['v38.0', 0.6],
                    ['v32.0', 0.55],
                    ['v37.0', 0.38],
                    ['v33.0', 0.19],
                    ['v34.0', 0.14],
                    ['v30.0', 0.14]
                ]
            }, {
                name: 'Firefox',
                id: 'Firefox',
                data: [
                    ['v35', 2.76],
                    ['v36', 2.32],
                    ['v37', 2.31],
                    ['v34', 1.27],
                    ['v38', 1.02],
                    ['v31', 0.33],
                    ['v33', 0.22],
                    ['v32', 0.15]
                ]
            }, {
                name: 'Safari',
                id: 'Safari',
                data: [
                    ['v8.0', 2.56],
                    ['v7.1', 0.77],
                    ['v5.1', 0.42],
                    ['v5.0', 0.3],
                    ['v6.1', 0.29],
                    ['v7.0', 0.26],
                    ['v6.2', 0.17]
                ]
            }, {
                name: 'Opera',
                id: 'Opera',
                data: [
                    ['v12.x', 0.34],
                    ['v28', 0.24],
                    ['v27', 0.17],
                    ['v29', 0.16]
                ]
            }]
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
            name: 'Unique users',
            data: [
                ['Website visits',      15654],
                ['Downloads',            4064],
                ['Requested price list', 1987],
                ['Invoice sent',          976],
                ['Finalized',             846]
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
                ['Firefox',   10.38],
                ['IE',       56.33],
                ['Chrome', 24.03],
                ['Safari',    4.77],
                ['Opera',     0.91],
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    }
                }
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
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33,
                drilldown: 'Microsoft Internet Explorer'
            }, {
                name: 'Chrome',
                y: 24.03,
                drilldown: 'Chrome'
            }]
        }],
        drilldown: {
            series: [{
                name: 'Microsoft Internet Explorer',
                id: 'Microsoft Internet Explorer',
                data: [
                    [
                        'v11.0', 24.13 ],
                    [
                        'v8.0', 17.2 ],
                    [
                        'v9.0', 8.11 ],
                    [
                        'v10.0', 5.33 ],
                    [
                        'v6.0', 1.06 ],
                    [
                        'v7.0', 0.5 ]
                ]
            }, {
                name: 'Chrome',
                id: 'Chrome',
                data: [
                    [
                        'v40.0', 5],
                    [
                        'v41.0', 4.32],
                    [
                        'v42.0', 3.68],
                    [
                        'v39.0', 2.96],
                    [
                        'v36.0', 2.53],
                    [
                        'v43.0', 1.45],
                    [
                        'v31.0', 1.24],
                    [
                        'v35.0', 0.85],
                    [
                        'v38.0', 0.6],
                    [
                        'v32.0', 0.55],
                    [
                        'v37.0', 0.38],
                    [
                        'v33.0', 0.19],
                    [
                        'v34.0', 0.14],
                    [
                        'v30.0', 0.14]
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
              <li class="active"><a href="index.html"><i class="icon-home icon-white"></i> Home</a></li>                            
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
                    <dtitle>Disk Space</dtitle>
                    <hr>
                    <div id="pie"></div>
                </div>
            </div>

          <!-- DONUT CHART BLOCK -->
            <div class="col-sm-3 col-lg-3">
                <div class="dash-unit" style="height:500px;">
                    <dtitle>Site Bandwidth</dtitle>
                    <hr>
                    <div id="load"></div>
                    <h2>45%</h2>
                    <div id="space"></div>
                    <h2>45%</h2>
                </div>
            </div>
     </div><!-- /row -->
      
      
    
      <div class="row">

        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit" style="height:350px;">
                <dtitle>Disk Space</dtitle>
                <hr>
                <br>
                <br>
                <div id="piramide"></div>
            </div>
        </div>
        <div class="col-sm-9 col-lg-9">
            <div class="dash-unit" style="height:350px;">
                <dtitle>Disk Space</dtitle>
                <hr>
                <div id="cerro"></div>
            </div>
        </div>
        


      </div><!-- /row -->
     
 
      <!-- THIRD ROW OF BLOCKS -->     
      <div class="row">
      
        <div class="col-sm-6 col-lg-6">
            <div class="dash-unit">
                <dtitle>Disk Space</dtitle>
                <hr>
                <div id="dona"></div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-6">
            <div class="dash-unit">
                <dtitle>Disk Space</dtitle>
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
<?php
   include('session.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 1</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="leaflet/leaflet.css"/>
  <script src="leaflet/leaflet.js"></script>
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
  <script src='https://api.mapbox.com/mapbox.js/v2.3.0/mapbox.js'></script>
  <script src="jquery-2.2.3.js"></script>
  <script src="highcharts.js"></script>
  <script src="exporting.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="leaflet/leaf-green.png"></script>
  <link href='https://api.mapbox.com/mapbox.js/v2.3.0/mapbox.css' rel='stylesheet' />
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
	  background-color:#5A3319;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #FFF;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #5A3319;
      color:#D39D69;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #D39D69;
  }
  .logo-small {
      color: #5A3319;
      font-size: 50px;
  }
  .logo {
      color: #5A3319;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #5A3319;
  }
  .carousel-indicators li {
      border-color: #5A3319;
  }
  .carousel-indicators li.active {
      background-color: #5A3319;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #5A3319; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #5A3319;
      background-color: #fff !important;
      color: #5A3319;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #5A3319 !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #5A3319;
      color: #D39D69;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #5A3319;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #D39D69 !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #5A3319 !important;
      background-color: #D39D69 !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #D39D69 !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #5A3319;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;	
      animation-duration: 1s;	
      -webkit-animation-duration: 1s;
      visibility: visible;			
  }
  @keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }	
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  .navbar-image{
	  vertical-align:text-top;
	  height:30px;
	  width:25px;
  }
  #mapid { height: 280px; }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="#myPage" class="navbar-brand"><img src="Logo.png" alt="Stack Overflow" class="navbar-image"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#map">DEVS PER CAPITA</a></li>
        <li><a href="#chart1">DESKTOP OS</a></li>
        <li><a href="#chart2">INDUSTRY</a></li>
        <li><a href="#chart3">MOTIVATION</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Hi, <?php echo $login_session; ?> <b class="caret"></b></a>
        	<ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <br />
  <h1>Assignment</h1> 
  <p>Internet Development</p>
</div>

<div id="map" class="container-fluid text-center bg-grey" style="background-image:url(bgimage3.jpg);background-repeat: no-repeat;">
  <h2>Most coffee drinking devs in the world</h2> 
  <div id="mapid" style="height:622px; text-align:center;">
	<script>
	L.mapbox.accessToken = 							'pk.eyJ1IjoibWFiaWRyYXNvb2wiLCJhIjoiY2lsaDhsYmp4MmJmN3Y2bTA5cnE5ODI1cCJ9.urUEPZSyHz6sQYuGrz4OKA';
				var mymap = L.mapbox.map('mapid', 'mapbox.streets', {
					// These options apply to the tile layer in the map.
					tileLayer: {
						// This map option disables world wrapping. by default, it is false.
						continuousWorld: false,
						// This option disables loading tiles outside of the world bounds.
						noWrap: true, 
						minZoom: 3,
						maxZoom: 18
					}
				}).setView([51.5, -0.09], 3);
		mymap.ScrollWheelZoom = false;	
var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'leaflet/images/leaf-shadow.png',
        iconSize:     [38, 95],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});

var greenIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-green.png'}),
    redIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-red.png'}),
    orangeIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-orange.png'});
	coffeeIcon = new LeafIcon({iconUrl: 'leaflet/images/leaf-coffee.png'});

var markers = [
	L.marker([61.24382, 8.66821], {icon: coffeeIcon}).addTo(mymap),
	L.marker([52.09638, 5.39978], {icon: coffeeIcon}).addTo(mymap),
	L.marker([64.849, 17.22656], {icon: coffeeIcon}).addTo(mymap),
	L.marker([62.5123, 26.7188], {icon: coffeeIcon}).addTo(mymap),
	L.marker([32.32428, 54.5801], {icon: coffeeIcon}).addTo(mymap),
	L.marker([55.72711, 10.1953], {icon: coffeeIcon}).addTo(mymap)
];

/*var popup = L.popup()
    .setLatLng([51.5, -0.09])
    .setContent("I am a standalone popup.")
    .openOn(mymap);*/
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}

function onMarkerOver1() {
	markers[0].bindPopup("<b>Norway</b><br>3.09 Caffeinated beverages per day").openPopup();
}
function onMarkerOver2() {
	markers[1].bindPopup("<b>Netherlands</b><br>3.04 Caffeinated beverages per day").openPopup();
}
function onMarkerOver3() {
	markers[2].bindPopup("<b>Sweden</b><br>2.94 Caffeinated beverages per day").openPopup();
}
function onMarkerOver4() {
	markers[3].bindPopup("<b>Finland</b><br>2.76 Caffeinated beverages per day").openPopup();
}
function onMarkerOver5() {
	markers[4].bindPopup("<b>Iran</b><br>2.74 Caffeinated beverages per day").openPopup();
}
function onMarkerOver6() {
	markers[5].bindPopup("<b>Denmark</b><br /><iframe width='180' height='150' src='https://www.youtube.com/embed/V4RZJSeT2sk' frameborder='0' allowfullscreen></iframe><br />2.70 Caffeinated beverages per day").openPopup();
}
function onMarkerOut(){
	markers[0].closePopup();
	markers[1].closePopup();
	markers[2].closePopup();
	markers[3].closePopup();
	markers[4].closePopup();
	markers[5].closePopup();
}

mymap.on('click', onMapClick);
markers[0].on('mouseover', onMarkerOver1);
markers[1].on('mouseover', onMarkerOver2);
markers[2].on('mouseover', onMarkerOver3);
markers[3].on('mouseover', onMarkerOver4);
markers[4].on('mouseover', onMarkerOver5);
markers[5].on('mouseover', onMarkerOver6);
markers[0].on('mouseout', onMarkerOut);
markers[1].on('mouseout', onMarkerOut);
markers[2].on('mouseout', onMarkerOut);
markers[3].on('mouseout', onMarkerOut);
markers[4].on('mouseout', onMarkerOut);
//markers[5].on('mouseout', onMarkerOut);
	</script>
	</div>
</div>
<div id="chart1" class="container-fluid text-center bg-grey">
<script>
$(function () {
    $('#chart1').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: '22,771 responses by developers showing the popularity of Desktop Operating Systems'
        },
        subtitle: {
            text: 'Source: stackoverflow.com'
        },
        xAxis: {
            categories: ['Windows 7', 'Mac OS X', 'Linux', 'Windows 8', 'Windows XP', 'Windows Vista', 'Other'],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Percentage of users'
            },
            labels: {
                formatter: function () {
                    return this.value / 1000;
                }
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' %'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: '2015',
            data: [33.8, 21.5, 20.5, 19.5, 1.0, 0.2, 3.5]
        }, {
            name: '2014',
            data: [45.6, 20.3, 20.9, 6.4, 5.9, 0, 0.5]
        }, {
            name: '2013',
            data: [48.0, 18.7, 19.9, 0, 10.8, 1.6, 1.0]
        }]
    });
});
</script>
</div>

<div id="chart2" class="container-fluid text-center bg-grey">
	<script>
$(function () {
    $('#chart2').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: '16,160 responses by developers showing the persantage of certain industries in different regions'
        },
        subtitle: {
            text: 'Source: <a href="http://populationpyramid.net/germany/2015/">stackoverflow.com</a>'
        },
        xAxis: {
            categories: ['Software Products', 'Web Services / Internet', 'Finance / Banking', 'Consulting', 'Media / Advertising / Entertainment and Gaming', 'Health / Biotech / Science', 'Education / Academia / Research', 'Telecommunications','Government','Other'],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Percent'
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} millions)<br/>',
            shared: true
        },
        plotOptions: {
            area: {
                stacking: 'percent',
                lineColor: '#ffffff',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#ffffff'
                }
            }
        },
        series: [{
            name: 'United States',
            data: [18, 14, 8, 7, 7, 7, 5, 2, 4, 27]
        }, {
            name: 'Eastern Europe',
            data: [29, 21, 9, 3, 9, 3, 2, 5, 2, 16]
        }, {
            name: 'Asia',
            data: [45, 19, 6, 4, 4, 3, 3, 3, 1, 13]
        }, {
            name: 'Total',
            data: [25, 17, 8, 7, 7, 5, 5, 4, 3, 20]
        }]
    });
});
	</script>
</div>

<div id="chart3" class="container-fluid text-center bg-grey">
	<script>
$(function () {
    $('#chart3').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '16,519 responses by developers showing the frequency of visiting stack overflow'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:<br /> {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Respondents',
            colorByPoint: true,
            data: [{
                name: 'Multiple times a day',
                y: 65.4
            }, {
                name: 'Once a day',
                y: 20.4,
                sliced: true,
                selected: true
            }, {
                name: 'Once a week',
                y: 9.9
            }, {
                name: 'Once a month',
                y: 1.9
            }, {
                name: 'Very rarely',
                y: 1.9
			}, {
                name: 'I have never been on Stack Overflow.<br /> I just love taking surveys.',
                y: 0.5
            }]
        }]
    });
});
    </script>
</div>

<footer class="container-fluid text-center" style="background-image:url(bgimage2.jpg); padding:40px">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p style="font-weight:bold; color:#5A3319">Bootstrap Template Made By <a href="http://www.w3schools.com" title="Visit w3schools">www.w3schools.com</a></p>	
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Prevent default anchor click behavior

    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-574fa9226534c916"></script>
<!-- jQuery -->
    <script src="jquery-2.2.3.js"></script>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
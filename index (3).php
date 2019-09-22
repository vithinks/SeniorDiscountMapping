<!DOCTYPE html>
<html lang="en">
<style>

      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 600px;
          width 400px;
      }
    .img-circle{
        border-radius: 70%;
    }
       @media (max-width:629px) {
  img#optionalstuff {
    display: none;
  }
}
       
    </style>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AboutTown</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top" bgcolor="#17a2b8">
 

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="Logo.PNG" height="70"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#How to Use">How to Use</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <header>
    <div class="container text-center">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <input type="text" name="term" ><br>
            <input type="submit" name="submit" value="Search"><br>
        </form>
      <?php
        session_start();
    if(isset($_POST['term'])){
        $var = $_POST['term'];
        $_Session['pass'] = $var;
        //echo $_Session['pass'];
    }
        if(!isset($_SESSION['first'])){
            $_SESSION['first'] = 1;
        }else if(isset($_POST['term'])){
            $_SESSION['first'] = 2;
        }else{
            $_SESSION['first'] = 1;
        }
        if($_SESSION['first'] == 1){
      echo"<div id='map'>
    </div>
    <script>
      var customLabel = {
        restaurant: {
          
        },
        bar: {
          
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(26.370342, -80.185547),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('converter.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('markers');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('Id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var disc_type = markerElem.getAttribute('disc_type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              infowincontent.appendChild(document.createElement('br'));
              var text1 = document.createElement('text1');
              text1.textContent = disc_type
              infowincontent.appendChild(text1);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAY96RUz1rAIPRs0fTttzcLEBFFGiF8qeQ&callback=initMap'>
    </script>";
            $_SESSION['first'] = 2;
        }
        else if($_SESSION['first'] == 2){
            echo"<div id='map'>
    </div>
    <script>
      var customLabel = {
        restaurant: {
        },
        bar: {
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(26.370342, -80.185547),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('converter1.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('markers');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('Id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var disc_type = markerElem.getAttribute('disc_type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAY96RUz1rAIPRs0fTttzcLEBFFGiF8qeQ&callback=initMap'>
    </script>
    ";
        }
?>
    </div>
  </header>

<!--
    
    
  <div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>  
    
-->
    
    
  <section id="How to Use">
    <div class="container">
         <img id="optionalstuff" src="shopping.jpg" class="img-circle" width="600" height="400">
      <div class="row">
        <div class="col-lg-8 mx-auto">
                       
          <h2>How to Use</h2>
          <p class="lead"> 
            <ul>
                <li>View businesses and their discounts on the list</li>
                <li>Narrow your search by applying filters</li>
                <li>Listed business will be located on the map</li>
            </ul>
            </p>
        </div>
      </div>    
    </div>
  </section>

  <section id="about">
    <div class="container">
        <img id="optionalstuff" src="table.jpg" class="img-circle" width="600" height="400">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About us</h2>
          <p class="lead">
              We seek to present solutions faced by the elderly. Our applications and websites boast an accessible user-interface and are easy to use. we believe that all senior citizens deserve technology that works for them.
            </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; AboutTown 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>

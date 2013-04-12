<?php

$connections = array(
  "0" => "Don't know",
  "1" => "Wired",
  "2" => "Wifi",
  "3" => "2G",
  "4" => "3G",
  "5" => "4G"
);
$networks = array(
  "28"=> "A1",
  "1"=> "AT&amp;T",
  "4"=> "BT",
  "27"=> "Chunghwa Telecom",
  "14"=> "Claro",
  "22"=> "Elisa",
  "26"=> "Mobitel SI",
  "13"=> "Movistar",
  "29"=> "Netcom",
  "5"=> "Nextel",
  "6"=> "O2",
  "18"=> "O2 Telefonica CZ",
  "19"=> "Optimus",
  "15"=> "Optus",
  "7"=> "Orange",
  "23"=> "Saunalahti",
  "21"=> "Siminn",
  "8"=> "Sky",
  "17"=> "Sonera",
  "9"=> "Sprint",
  "2"=> "T-Mobile",
  "16"=> "T-Mobile UK",
  "24"=> "Telia",
  "25"=> "Three UK",
  "20"=> "VIPnet",
  "3"=> "Verizon",
  "10"=> "Virgin Mobile",
  "11"=> "Vodafone",
  "999"=> "OTHER"
);
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Size Test</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />

<style type="text/css">
  body {
    font: 100%/1.4em Helvetica, sans-serif;
    padding: 1em 2em;
    color: #333;
  }
  .result{
    padding: .5em 1em;
    border-left: 0.25em solid #333;
    margin-bottom: 3em;
  }
  img{
    display: block;
    margin-bottom: 1em;
  }
  p.lede{
    border-bottom: 1px dotted #D0D0D0;
    padding-bottom: 2em;
    margin-bottom: 2em;
  }
</style>
</head>
<body>
  <div id="results">
    <h1>Image Size Test</h1>
    <p class="lede">Testing to see if images are compressed by the network.</p>
    <h2>Results</h2>
    <p>
        <strong>Carrier:</strong> <?php echo $networks[$_POST['carrier']]; ?>
    </p>
    <p> 
      <strong >Connection Type:</strong> <?php echo $connections[$_POST['connection']]; ?>
    </p>
  </div>
  <div class="result" id="resultOne">
    <h3>Image One</h3>
    <img src="img/testimg_200.jpg" id="imageOne" />
  </div>
  <div class="result" id="resultTwo">
    <h3>Image Two</h3>
    <img src="img/testimg_500.jpg" id="imageTwo" />
  </div>
  <div class="result" id="resultThree">
    <h3>Image Three</h3>
    <img src="img/testimg_1000.jpg" id="imageThree" />
  </div>
  <div class="result" id="resultFour">
    <h3>Image Four</h3>
    <img src="img/testimg_3000.jpg" id="imageFour" />
  </div>
  
<script>
    window.onload = function(){
      var imgWidth, imgHeight, imgFileSize;
      var toCheck = [
        ['imageOne', 'resultOne'],
        ['imageTwo', 'resultTwo'],
        ['imageThree', 'resultThree'],
        ['imageFour', 'resultFour']
      ];
      
      for (var i = 0; i < toCheck.length; i++) {
        testImg(toCheck[i][0], toCheck[i][1]);
      };

      var testResults = [];

      function testImg(imgName, resultName) {
        img = document.getElementById(imgName);
        result = document.getElementById(resultName);
        imgFileSize = getSize(img);

        testResults = '<p><strong>Src: </strong>' + img.src + '<br/>';
        testResults += '<strong>Dimensions: </strong>' + img.clientWidth + 'px x ' + img.clientHeight + 'px<br/>';
        testResults += '<strong>File size: </strong>' + imgFileSize + '</p>';
        result.innerHTML += testResults;
      }
      
      function getSize(img) {
        var fileSize;
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', img.src, false);
        xhr.onreadystatechange = function(){
          if ( xhr.readyState == 4 ) {
            if ( xhr.status == 200 ) {
              fileSize = xhr.getResponseHeader('Content-Length') + ' bytes';
            } else {
              alert('ERROR');
            }
          }
        };
        xhr.send(null);
        return fileSize;
      }
    }
</script>
</body>
</html>
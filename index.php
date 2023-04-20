<!DOCTYPE html>
<?php
include("connection.php");
$sql = "SELECT * FROM studio_location";
$result = mysqli_query($conn,$sql);
$datas =array();
$longitude = array();
$latitude = array();
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
      $datas[] = $row;
  }
  
}
?>
<html lang="en">
<title>Ham-(On)+Music</title>
<head>
  <link rel="icon" href="images/backgroundv2.png">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src= 
     "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 
</script> 
<script>

var map;
var midnightCommander = {
    "version": "1.0",
    "settings": {
        "landColor": "#0B334D"
    },
    "elements": {
        "mapElement": {
            "labelColor": "#FFFFFF",
            "labelOutlineColor": "#000000"
        },
        "political": {
            "borderStrokeColor": "#144B53",
            "borderOutlineColor": "#00000000"
        },
        "point": {
            "iconColor": "#0C4152",
            "fillColor": "#000000",
            "strokeColor": "#0C4152"
        },
        "transportation": {
            "strokeColor": "#000000",
            "fillColor": "#000000"
        },
        "highway": {
            "strokeColor": "#158399",
            "fillColor": "#000000"
        },
        "controlledAccessHighway": {
            "strokeColor": "#158399",
            "fillColor": "#000000"
        },
        "arterialRoad": {
            "strokeColor": "#157399",
            "fillColor": "#000000"
        },
        "majorRoad": {
            "strokeColor": "#157399",
            "fillColor": "#000000"
        },
        "railway": {
            "strokeColor": "#146474",
            "fillColor": "#000000"
        },
        "structure": {
            "fillColor": "#115166"
        },
        "water": {
            "fillColor": "#021019"
        },
        "area": {
            "fillColor": "#115166"
        }
    }
};

function GetMap()
{
  var datas = <?php echo json_encode($datas) ?>;
    map = new Microsoft.Maps.Map('#myMap', {
        customMapStyle: midnightCommander,
        center: new Microsoft.Maps.Location(43.2552, -79.8438)
    });
    var center = map.getCenter();
    
    for(  i = 0; i < 10; i++){
      var longitude = JSON.parse(datas[i]["longitude"]);
      var latitude = JSON.parse(datas[i]["latitude"]);
      var comp_name =JSON.stringify(datas[i]["name"]);
      var comp_add = JSON.stringify(datas[i]["Address"]);
      var num = JSON.parse(datas[i]["ID"]);
      console.log(longitude);
      console.log(latitude);
      console.log(JSON.stringify(datas[i]["name"]));
      console.log(JSON.stringify(datas[i]["Address"]));
      console.log(num);
      var location = new Microsoft.Maps.Location(longitude,latitude);
      var pushpin = new Microsoft.Maps.Pushpin(location, {icon: 'images/musicicon.png'} );
      var infobox2 = new Microsoft.Maps.Infobox(map.getCenter(), {
            visible: false
        });

        //Assign the infobox to a map instance.
      infobox2.setMap(map);


        //Store some metadata with the pushpin.
        pushpin.metadata = {
            title: comp_name,
            description:comp_add
        };

        //Add a click event handler to the pushpin.
        Microsoft.Maps.Events.addHandler(pushpin, 'click', pushpinClicked);





      map.entities.push(pushpin);
      
      function pushpinClicked(e) {
        if (e.target.metadata) {
            infobox2.setOptions({
                location: e.target.getLocation(),
                title: e.target.metadata.title,
                description: e.target.metadata.description,
                visible: true
            });
        }
    }

    }
      
}
</script>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AkWxC0te9L4Ysts-wWIRr3YNoOha-3mlY9zDIlBieyxZVhu6uJgrV3AN217_Kh5v' async defer></script>
        <style>
            html, body{
                padding:0;
                margin:0;
            }
        </style>
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif} 
h1,h2,h3,h4,h5,.w3-xxxlarge,.w3-text-red {
    color:#66ff33;
    
    text-shadow: 2px 2px #ccff33;
}
p,label{
    color:#ff3300;
    text-shadow:1px 1px #ccff33;
    font-weight: bold;
    
}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
nav{
    background-image: url("images/Design.png");

}
body{
    background-image: url("images/background.png");
}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3><img src="images/hamonmusic.png" width="300" height="300" style="float:left"></h3>
  </div>
  <div class="w3-bar-block" >
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#services" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Online Shows</a> 
    <a href="#designers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Fresh Finds</a> 
    <a href="#packages" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Studios & Venues</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Ham-(On)+Music</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Ham-(On)+Music</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Playlists</b></h1>
    <hr style="width:50px;border:5px solid #ccff33" class="w3-round">
  </div>
  
  <div class="Container">
    <div class="row">
        <div class="col-sm">
            <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1E35gJ2LJirR7J" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>

        </div>

        <div class="col-sm">
            <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1E38Og0kOCG16J" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="col-sm">
          <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1E3667IAnxoZHX" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
  </div>



  <!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Online Concerts</b></h1>
    <hr style="width:50px;border:5px solid #ccff33" class="w3-round">
    <p><strong>No shows because of covid???? :( , Dont worry we got you!!! :)</strong></p>
    <p> * We are planning on hosting an online concert soon .... Stay put!!! COMING SOON * [POTENTIAL INTERESTED ARTISTS PLEASE CONTACT US IF YOU ARE INTERESTED!!!!]
    </p>
  </div>
  
  <!-- Designers -->
  <div class="w3-container" id="designers" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Fresh Finds</b></h1>
    <hr style="width:50px;border:5px solid #ccff33" class="w3-round">
    <p>Our Weekly Picks , the MVPs.</p>
    <p> This section is where we pick the best Canadian artists of the week that have dropped , we also occasionally will pick someone from USA as they are our neighbors :) and sometimes we will have an international pick too.
    </p>
    <p><b>Here are our newest finds of the week with one international pick</b>:</p>
  </div>

  <!-- The Team -->
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="images/nightlovell.jpg" alt="NL" style="width:100%"onclick="nightlovell()">
        <div class="w3-container">
          <h3>Night Lovell<img src="images/canada.jpg" width="26" height="18"></h3>
          <p class="w3-opacity">Ottawa based rapper</p>
          <p>Check out Night Lovell's eerie music video for his newest song "Alone", Click on the picture to check it out!</p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="images/snot.jpg" alt="Snot" style="width:100%" onclick="snot()">
        <div class="w3-container">
          <h3>$NOT<img src="images/usa.jpg" width="30" height="18"></h3>
          <p class="w3-opacity">Florida based singer/rapper</p>
          <p>$NOT is getting ready for his newest album rollout with his new emo pop inspired single "Revenge", Click on the picture to check it out!</p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="images/prettyboys.jpt.PNG" alt="prettyboys" style="width:100% "onclick="prettyboys()">
        <div class="w3-container">
          <h3>prettyboys<img src="images/Quebec.png" width="25" height="25"></h3>
          <p class="w3-opacity">Montreal based musicians</p>
          <p>Check out prettyboys' newest release "U N I ", Click on the picture to check it out!</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Packages / Pricing Tables -->
  <div class="w3-container" id="packages" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Studios</b></h1>
    <hr style="width:50px;border:5px solid#ccff33" class="w3-round">
    <p>Here is a map of studios you can use in Hamilton, you can add your own studio to the map so others can contact you.</p>
  </div>

  <div class="w3-row-padding">
    <div class="w3-half">
      <p> map here</p>
      <div id="myMap" style="position:relative;width:100%;height:100vh;"></div>

    <div style="position:absolute;top:10px; left:10px;width:200px;height:250px">
        <textarea id="inputTbx" style="width:100%;height:200px"></textarea>
        <input type="button" value="Update Map Style" onclick="updateMapStyle()" />
    </div>
      
    </div>
        
    <div class="w3-half">
        <div class="w3-half">
            <p> Want to add a studio? Just fill out this form</p>
            <form target="_blank" >
                <div class="w3-section">
                  <label>Longitude</label>
                  <input class="w3-input w3-border" type="text" name="Longitude" >
                </div>
                <div class="w3-section">
                  <label>Latitude</label>
                  <input class="w3-input w3-border" type="text" name="Latitiude" >
                </div>
                <div class="w3-section">
                    <label>Name of Studio</label>
                    <input class="w3-input w3-border" type="text" name="Name" required>
                  </div>
                <div class="w3-section">
                  <label>Address</label>
                  <input class="w3-input w3-border" type="text" name="Address" required>
                </div>
                <button type="submit" onclick="Submission()" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Add Studio</button>
              </form>  
            </div>
          </div>
  </div>
  

  <div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Contact.</b></h1>
    <hr style="width:50px;border:5px solid #ccff33" class="w3-round">
    <p>Have any questions? Want an Interview? Playlist Submission? Anything else? Ask us here</p>
    <form target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message (provide links if submission)</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Send Message</button>
    </form>  
  </div>

</div>

<div>
    
    <p>MADE BY ALEXEI OUGRINIOUK</p>
</div>

<script>
function snot(){
    location.assign("https://www.youtube.com/watch?v=MWE_CF4aIwU");
}
function nightlovell(){
    location.assign("https://www.youtube.com/watch?v=5o2TeJ211Zc");
}
function prettyboys(){
    location.assign("https://www.youtube.com/watch?v=dTSuqLVacOg");
}
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function Submission(){
  alert("Information Successfully Submitted, Wait for Approval!");
}


</script>

</body>
</html>
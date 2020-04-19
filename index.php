<!DOCTYPE html>
<html lang="en">
<head>
  <title>Paperkut Covid-19 Live Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="icon" href="img/flaticon.jpg" type="image/jpg">
  <style>
  #panel
  {
    display: none;
  }
  </style>
</head>
<body>

  <?php include('navbar.html') ?>
<div class="container main">
  <div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6 text-center">
      <div class="content" id="panel">
        <h4>Covid-19's cases in Morocco <img src="https://cdn.countryflags.com/thumbs/morocco/flag-button-round-250.png" style="width: 20px"/></h4>
        <br/>
        <p id="last_update" style="font-weight: bold"></p>
      <div class="row">
        <div class="col-sm-6">
          <div class="detail">
            <p><img src="img/confirm.svg" class="case_icon"/> Confirmed</p>
            <p id="confirmed" class="data_numbers"></p>
            <i class="fas fa-chart-line"></i>
            <p id="new_confirmed" class="new_numbers"></p>
          </div>

        </div>
        <div class="col-sm-6">
          <div class="detail">
            <p><img src="img/death.svg" class="case_icon"/> Deaths</p>
            <p id="deaths" class="data_numbers"></p>
            <i class="fas fa-chart-line"></i>
            <p id="new_deaths" class="new_numbers"></p>
          </div>

        </div>
        <div class="col-sm-6">
          <div class="detail">
            <p><img src="img/recovery.svg" class="case_icon"/> Recovered</p>
            <p id="recovered" class="data_numbers"></p>
            <i class="fas fa-chart-line"></i>
            <p id="new_recovered" class="new_numbers"></p>
          </div>

        </div>
        <div class="col-sm-6">
          <div class="detail">
            <p><img src="img/ward.svg" class="case_icon"/> Active</p>
            <p id="active" class="data_numbers"></p>
            <i class="fas fa-chart-line"></i>
            <p id="new_active" class="new_numbers"></p>
          </div>

        </div>
      </div>
      </div>
    </div>
    <div class="col-sm-3">

    </div>
  </div>
</div>
<div class="stay_at_home text-center">
  <p>
    <img src="img/stay_at_home.png" style="width: 200px"/>
    </p>
</div>
<div class="credits text-center">
  <div>Icons made by <a href="https://www.flaticon.com/authors/roundicons" title="Roundicons">Roundicons</a>,
<a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a>,
<a href="https://www.flaticon.com/authors/good-ware" title="Good Ware">Good Ware</a> and
<a href="https://www.flaticon.com/authors/nikita-golubev" title="Nikita Golubev">Nikita Golubev</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
</div>
<script type="text/javascript">
var settings = {
"url": "https://api.covid19api.com/live/country/morocco",
"method": "GET",
"timeout": 0,
};

$.ajax(settings).done(function (response)
{
  var index = response.length-1;
  var data = response[index];
  var y_data = response[index-1];

  var data_confirmed = data["Confirmed"];
  var y_data_confirmed = y_data["Confirmed"];
  var new_confirmed_cases = data_confirmed - y_data_confirmed;
  $('#confirmed').text(data_confirmed);
  $('#new_confirmed').text(new_confirmed_cases);

  var data_deaths = data["Deaths"];
  var y_data_deaths = y_data["Deaths"];
  var new_death_cases = data_deaths - y_data_deaths;
  $('#deaths').text(data_deaths);
  $('#new_deaths').text(new_death_cases);

  var data_recovered = data["Recovered"];
  var y_data_recovered = y_data["Recovered"];
  var new_recovered_cases = data_recovered - y_data_recovered;
  $('#recovered').text(data_recovered);
  $('#new_recovered').text(new_recovered_cases);

  var data_active = data["Active"];
  var y_data_active = y_data["Active"];
  var new_active_cases = data_active - y_data_active;
  $('#active').text(data_active);
  $('#new_active').text(new_active_cases);

  console.log(new_confirmed_cases);

  var date = new Date(data["Date"]);
  var day = date.getDate();
  var month = date.getMonth()+1;
  var year = date.getFullYear();
  var hours = date.getHours();
  var hour = "00:00";

  $('#last_update').text(hour+' - '+day+'/'+month+'/'+year);



  $('#recovered').text(data["Recovered"]);
  $('#active').text(data["Active"]);


});
</script>
<script>
$(document).ready(function(){
  $("#panel").slideDown(2000);
});
</script>
</body>
</html>

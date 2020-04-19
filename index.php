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
</head>
<body>

  <?php include('navbar.html') ?>
<div class="container main">
  <div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6 text-center">
      <div class="content">
        <h4>Covid-19's cases in Morocco <img src="https://cdn.countryflags.com/thumbs/morocco/flag-button-round-250.png" style="width: 20px"/></h4>
        <br/>
        <p id="last_update" style="font-weight: bold"></p>
      <table class="table">
      <thead>
        <tr>
          <th><img src="img/confirm.svg" class="case_icon"/> Confirmed</th>
          <th><img src="img/death.svg" class="case_icon"/> Deaths</th>
          <th><img src="img/recovery.svg" class="case_icon"/> Recovered</th>
          <th><img src="img/ward.svg" class="case_icon"/> Active</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="confirmed" class="data_numbers"></td>
          <td id="deaths" class="data_numbers"></td>
          <td id="recovered" class="data_numbers"></td>
          <td id="active" class="data_numbers"></td>
        </tr>
      </tbody>
    </table>
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

  var date = new Date(data["Date"]);
  var day = date.getDate();
  var month = date.getMonth()+1;
  var year = date.getFullYear();
  var hours = date.getHours();
  var hour;
  if(hours<18)
  {
    hour= '10h';
  }
  else {
    hour = '18h';
  }

  $('#last_update').text(hour+' - '+day+'/'+month+'/'+year);

  console.log(data);
  console.log(response);
  $('#confirmed').text(data["Confirmed"]);
  $('#deaths').text(data["Deaths"]);
  $('#recovered').text(data["Recovered"]);
  $('#active').text(data["Active"]);
});
</script>
</body>
</html>

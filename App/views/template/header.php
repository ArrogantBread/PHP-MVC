<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>UserSystem</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="public/css/bootstrap.css"> -->
  <!-- <link rel="stylesheet" href="public/css/bootstrap-grid.css"> -->
  <!-- <link rel="stylesheet" href="public/css/bootstrap-reboot.css"> -->
  <link rel="stylesheet" href="/public/css/gallery.css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <!-- <script src="/public/js/jquery.validate.js" charset="utf-8"></script> -->
</head>

<?php
  if (isset($bgImg) && $bgImg) {
    echo '<body background="/public/upload/' . $bgImg->contentName . "." . $bgImg->contentType . '">';
  } else {
    echo '<body>';
  }
 ?>

<div class="row" style="margin-left: 20px;">
  <a href="/home" style="float:left;">< Return Home</a>
</div>

<div class="row justify-content-md-center">
  <div style="height:400px;width:700px;border:1px solid #ccc;overflow:auto;">
    <pre id="logBox">
<?php
$fail = 0;
$pass = 0;
foreach ($logArr as $_x) {
        echo " TIME: " . $_x[0];
        echo " - STATUS: " . $_x[1];
        echo " - USERNAME: " . $_x[2];
        echo " - IP: " . $_x[3];

      ($_x[1] == "FAIL") ? $fail += 1 : $pass += 1;
      } ?>
    </pre>
  </div>
</div>
<div class="row justify-content-md-center">
  <div style="width:700px;">
    Number of unsucessful login attempts: <?php echo $fail; ?> <br />
    Number of sucessful login attempts  : <?php echo $pass; ?>
  </div>
</div>

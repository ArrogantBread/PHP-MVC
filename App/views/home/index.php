Logout <a href="/logout">Here</a>
<div class="login" style="margin-top: 15%;">
  <div class="row justify-content-center">
    <h4><?php echo "Hello " . $_SESSION['username'] ?></h4>
  </div>
  <div class="row justify-content-center">
    Width: <span id="width"></span>
  </div>
  <div class="row justify-content-center">
    Height: <span id="height"></span>
  </div>
  <div class="row justify-content-center">
    Browser: <span id="browser"></span>
  </div>
</div>

<script type="text/javascript">


function browserTester(browserString) {
    return navigator.userAgent.toLowerCase().indexOf(browserString) > -1;
};

$( document ).ready(function() {
  if(browserTester('chrome')) {
    var browser = "chrome"
  } else if(browserTester('safari')) {
    var browser = "safari"
  } else if(browserTester('msie')) {
    var browser = "Internet Explorer"
  }

  $("#width").html($(window).width());   // returns height of browser viewport
  $("#height").html($(window).height());   // returns width of browser viewport
  $("#browser").html(browser);   // returns width of browser viewport
});


</script>

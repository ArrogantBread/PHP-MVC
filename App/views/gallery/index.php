    <script type="text/javascript">
    function search_products() {
      var query = $('#query').val();
      $.ajax({
        type: 'POST',
        url: 'search.php',
        data: 'query='+query,
        success: function(result) {
          $('#searchResult').html(result);
        }
      });
      collapse_top();
    }
    function collapse_top() {
      $('#contentTop').addClass('top');
      $('#query').addClass('top');
      $('#content').addClass('top');
    }
    </script>
  </head>
  <body>
    <div id="contentTop">
      <a href="/home" style="float:left;">< Return Home</a>
      <input  name="search" id="query" onkeyup="search_products();" type="text" style="outline:none;" autocomplete='off' placeholder="Search for a product"/>
    </div>
    <div id="content" style="margin:auto;">
      <div id="searchResult"></div>
    </div>


<div id="contentTop">
  <a href="/home" style="float:left;">< Return Home</a>
  <input  name="search" id="query" onkeyup="search_products();" type="text" style="outline:none;" autocomplete='off' placeholder="This does nothing"/>

  <?php

    if (isset($edit) && $edit) {
      echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        New Image
      </button>';
    }
   ?>
</div>
<!-- <div id="content" class="align-middle" style="margin:auto;"> -->
  <!-- <div id="searchResult" style="text-align: center;"> -->

<div id="content" class="container" style="text-align: center;">
  <div id="searchResult" class="row justify-content-md-center">
<?php

foreach($gallery as $_x) {
  $id = $_x->content_id;
  $img = $_x->contentName . "." . $_x->contentType;
  $title = $_x->contentTitle;
  $where = $_x->contentPosition;

  if ($where == "Gallery") {
    echo '<div class="result">
            <a href="product.php?id=' . $id . '">
              <img class="thumbnail" src="/public/upload/' . $img . '" alt="">
              <h3 style="padding-top:5px;">' . $title . '</h3>
            </a>
          </div>';
  }
}
?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Title:</label>
            <input type="text" class="form-control" id="titleUp" name="titleUp">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">File (Must be JPG or PNG):</label>
            <input type="file" name="image" />
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Where</label>
            <select class="form-control" id="exampleSelect1" name="where">
              <option>Gallery</option>
              <option>Homepage</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <script type="text/javascript">


    function collapse_top() {
      $('#contentTop').addClass('top');
      $('#query').addClass('top');
      $('#content').addClass('top');
    }

    $(document).ready(function() {
      collapse_top();
    })

    </script>

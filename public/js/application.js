/**
 * @Author: Nathan Wright <nathan_wright>
 * @Date:   14-06-17
 * @Email:  email@nathanwright.me
 * @Filename: application.js
 * @Last modified by:   nathan_wright
 * @Last modified time: 14-06-17
 */


$(function() {
  $.ajax(url + "/songs/edit")

  //--- pass
  .done(function() {

  })

  //--- fail
  .fail(function() {
    // do a backflip
  })

})

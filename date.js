$(document).ready(function(){
  $('#releasdate').datepicker({
    autoclose:true
  }).on("changeDate", function(e) {
        $(".dvalidate").click();
    });
  $('#releasdate').datepicker("setDate",new Date());
  
  $(".dvalidate").click(function(e){
    var releasedate = $('#releasdate').datepicker("getDate");
    releasedate.setHours(0,0,1);
    var now = new Date();
    now.setHours(0,0,0);
    console.log(now);
    console.log(releasedate);
    if(now > releasedate){
      $(".input-group-addon i").text("event_busy");
      $("body").addClass("invalid").removeClass("valid");
      console.log("not valid");
    }else{
      $(".input-group-addon i").text("event_available");
      $("body").addClass("valid").removeClass("invalid");
      console.log("valid");
    }
    
  });
  
  setTimeout(function(){
    $(".dvalidate").click();
  },200);
  
  
});


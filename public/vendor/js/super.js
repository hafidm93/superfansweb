  var d = new Date();
  var n = d.getFullYear();
  document.getElementById("year").innerHTML = n;

  // jQuery 
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  $(document).ready(function() {

    // Gets the video src from the data-src on each button
    
    var $videoSrc;  
    $('.video-btn').click(function() {
        $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);
    
      
      
    // when the modal is opened autoplay it  
    $('#m3modal').on('shown.bs.modal', function (e) {
        
    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#m3video").attr('src',$videoSrc); 
    })
      
    
    
    // stop playing the youtube video when I close the modal
    $('#m3modal').on('hide.bs.modal', function(e) {    
      var $if = $(e.delegateTarget).find('iframe');
      var src = $if.attr("src");
      $if.attr("src", '/empty.html');
      $if.attr("src", src);
  })
        
        
    
    
      
      
    // document ready  
    });
    
    
    
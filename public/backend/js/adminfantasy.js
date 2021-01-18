console.log("Developed by Hafid Maulana");

if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
      img.src = img.dataset.src;
    });
  } else {
    // Dynamically import the LazySizes library
    const script = document.createElement('script');
    script.src =
      'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
    document.body.appendChild(script);
  }

  // post img lazy loading
  $(document).ready(function(){
    // add lodaing=lazy to each image
    $(".post-body img").attr("loading", "lazy");
    // add data-src=value to img tag 
    $('.post-body img').each(function() {
        var datasrc = $(this).attr("src");
        $(this).attr("data-src", datasrc);
    });
});
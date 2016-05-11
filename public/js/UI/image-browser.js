var ImageBrowser = function(){

  enlargePhoto = function(){
    var source = $(this).attr('src');
    $('.image-large-holder img').attr('src', source);
  }

  init = function(){
    $('.image-list li span').click(enlargePhoto);

    var initialSource = $('.image-list li img').attr('src');
    $('.image-large-holder span').attr('src', initialSource);
  }

  init();
}

(function(){
  var imagebrowser = new ImageBrowser();
})

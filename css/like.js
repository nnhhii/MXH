var isLiked = false;

$('like-button').on('click', function(e) {
  if (!isLiked) {
    console.log('Like button clicked');
    $(this).toggleClass('liked');
    isLiked = true;

    
  }
});



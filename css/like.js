var isLiked = false;

$('a.like-button').on('click', function(e) {
  if (!isLiked) {
    console.log('Like button clicked');
    $(this).toggleClass('liked');
    isLiked = true;

    setTimeout(() => {
      $(e.target).removeClass('liked');
      isLiked = false;
    }, 1000);
  }
});



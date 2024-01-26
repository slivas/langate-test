jQuery(function($){
  let postsToShow = 3;
  let postsToLoad = 3;
  let offset = postsToShow;

  function loadPosts(btn) {
    let ajaxPostType = $(btn).attr('data-ajax-post-type');
    let ajaxPostTypeCount = $(btn).attr('data-max-post');
    let ajaxurl = loadmore.ajaxurl;
    let page = offset / postsToLoad + 1;

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: {
        page: page,
        posts_per_page: postsToLoad,
        ajax_post_type: ajaxPostType,
        action: 'load_more'
      },
      error: function(response) {
        console.log(response);
      },
      success: function(response) {
        $('#posts').append(response);
        offset += postsToLoad;

        if (offset >= ajaxPostTypeCount) {
          $('.load-more-btn').hide();
        }
      }
    });
  }

  $('.load-more-btn').click(function(){
    loadPosts(this);
  });
});

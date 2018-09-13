$(document).ready(function() {
    $('.like-btn').on('click', function() {
        if ($(this).hasClass('unlike')) {
            $(this).removeClass('unlike');
            $(this).removeClass('fa-heart-o');
            $(this).addClass('liked');
            $(this).addClass('fa-heart');
        } else if ($(this).hasClass('liked')) {
            $(this).removeClass('liked');
            $(this).removeClass('fa-heart');
            $(this).addClass('unlike');
            $(this).addClass('fa-heart-o');
        }

    });

    $('.favourite').on('click',function(){
        tweet_id=$(this).attr('id');
        $.ajax({
            url : "/profile/tweet",
            data : {
                tweet_id: tweet_id
            },

            method : 'POST', //Post method
            success : function( response ){
                $('#'+tweet_id).html('<span>'+response+'</span>')
            }
        })
    });
    $('.follow').on('click',function(){

        $.ajax({
            url : "/profile/followers",
            data : {
                follower_id: $(this).attr('user_id')
            },

            method : 'POST', //Post method
            success : function( response ){
                if (response=='true')
                {
                    $('.follow').html('<span>Following</span>')

                }
                else
                {
                    $('.follow').html('<span>Follow</span>')

                }
            }
        })
    });
});
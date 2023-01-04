$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".ajaxLike").click(function(){
        let postId = $(this).attr("post-id");
        let userId = $(this).attr("user-id");
       // alert(postId);
        $.ajax({
            type:'post',
            url:'/like',
            data:{postId:postId,userId:userId},
            success:function(data){

               alert(data);
                $(".ajaxlike").html(data);
            },error:function(){
                alert("error error");
            }
        })
    })
})

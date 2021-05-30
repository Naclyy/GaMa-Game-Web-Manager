function getComments(current_game_id)
{  
   
    var method = "POST";
    var url="../Php/api/getComments.php";
    $.ajax({
        url : url,
        type : method,
        data : {current_game_id : current_game_id},
        success: function (response){
            var comments = response;
            var number = 0;
            var list=document.getElementById("commentslist");
            for(var i=0;i<comments.length;i++)
            { 
                var comment_list=comments[i];
                var id_game = comment_list.game_id;
                var comment=comment_list.comment;
                 if(comment != null && id_game == current_game_id){
                        var li = document.createElement("li");
                        li.innerHTML=comment;
                        list.appendChild(li);
                        number = 1;
                         }
            }

            if(number == 0){
                var li = document.createElement("li");
                li.innerHTML="There are no comments yet";
                list.appendChild(li);
            }


        }
    });

}

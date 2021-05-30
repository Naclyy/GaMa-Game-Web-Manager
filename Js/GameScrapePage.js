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

function getPoza(current_game_id)
{  
   
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){

            var poza=document.getElementById("poza");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_image_src);
            poza.appendChild(imagine);
        }
    });

}
function getGameInfo(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var test = document.getElementById("test");
            var p = document.createElement("p");
            p.innerHTML=resp.game_info;
            var p2 = document.createElement("p");
            p2.innerHTML=resp.game_system_req;
            var br0 = document.createElement("br");
            var br1 = document.createElement("br");
            var br2 = document.createElement("br");
            var br3 = document.createElement("br");
            var br4 = document.createElement("br");
            var br5 = document.createElement("br");
            test.appendChild(br0);
            test.appendChild(p);
            test.appendChild(br1);
            test.appendChild(br2);
            test.appendChild(br3);
            test.appendChild(br4);
            test.appendChild(br5);
            test.appendChild(p2);
            
        }
    });

}
function getGameSlide1(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide1");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[0]);
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide2(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide2");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[2]);
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide3(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide3");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[3]);
            poza.appendChild(imagine);

        }
    });

}
function getGameSlide4(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide4");
            var imagine = document.createElement("img");
            imagine.setAttribute("src",resp.game_screenshots_src[4]);
            poza.appendChild(imagine);

        }
    });

}

function getGameSlide5(current_game_id)
{  
    var method = "POST";
    var url="../Php/api/getGameInfo.php";
    id = current_game_id;
    $.ajax({
        url : url,
        type : method,
        data : {id : id},
        success: function (resp){
            var poza=document.getElementById("slide5");
            var imagine = document.createElement("VIDEO");
            imagine.setAttribute("src",resp.game_video_src);
            imagine.setAttribute("controls","controls");
            poza.appendChild(imagine);

        }
    });

}


function getGameRank()
{  
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getUsersByScore.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {
            var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var all_users_score = JSON.parse(this.responseText);
            for(var i=0;i< all_users_score.length;i++){
                var team_name = all_users_score[i].user_team_name;
                var score = all_users_score[i].scores;
             var li = document.createElement("li");
             li.classList.add("w3-display-container");
             li.innerHTML=team_name;
             li.style.border="2px solid black";
             var p = document.createElement("p");
             p.classList.add("w3-button","w3-transparent","w3-display-right");
             p.innerHTML=score;
             li.appendChild(p);
             list.appendChild(li);
            }
        }
    }
}
getGameRank();
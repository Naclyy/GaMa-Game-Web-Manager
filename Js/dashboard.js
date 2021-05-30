function getUsers(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getUsers.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {  
            var users = JSON.parse(this.responseText);
            
            var number = users.length;

            var there = document.getElementById("user_number");

            there.innerHTML=number;
        }
    }
}

function getTournaments(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getTournaments.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var tournaments = JSON.parse(this.responseText);
            
            var number = tournaments.length;

            var there = document.getElementById("tournament_number");

            there.innerHTML=number;
        }
    }
}

function getGames(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getGames.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var games = JSON.parse(this.responseText);
            
            var number =games.length;

            var there = document.getElementById("game_number");

            there.innerHTML=number;

    
         }
    }
}

function getComments(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getComments.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var comments = JSON.parse(this.responseText);
            
            var number =comments.length;

            var there = document.getElementById("comment_number");

            there.innerHTML=number;

    
         }
    }
}


getUsers();
getTournaments();
getGames();
getComments();
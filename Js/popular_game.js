var csvFileData="'\u0022'";
function getGameRank()
{  
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getMostPopularGame.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {
            var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var game = JSON.parse(this.responseText);
            for(var i=0;i< game.length;i++){
                var title = game[i].title;
                var number = game[i].number;

                if(i == 0){
                    csvFileData = '\u0022' + title + '\u0022' + "," + number;
                }
                else {
                     csvFileData = csvFileData + "," + '\u0022' + title + '\u0022' + "," + number;
                }

             var li = document.createElement("li");
             li.classList.add("w3-display-container");
             li.innerHTML=title;
             li.style.border="2px solid black";
             var p = document.createElement("p");
             p.classList.add("w3-button","w3-transparent","w3-display-right");
             p.innerHTML=number;
             li.appendChild(p);
             list.appendChild(li);
            }
        }
    }
}
function csvFunction() {  
  
    //define the heading for each row of the data  
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvFileData);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'sample.csv';  
    hiddenElement.click();  
}  
getGameRank();
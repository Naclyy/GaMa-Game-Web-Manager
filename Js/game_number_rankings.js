var csvFileData="'\u0022'";
var xmlFileData = "";
function getGameRank()
{  
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getGamesByRankingNumber.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {
            var list=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var games = JSON.parse(this.responseText);
            for(var i=0;i< games.length;i++){
                var title = games[i].title;
                var rating = games[i].rating_no;

                if(i == 0){
                    csvFileData = '\u0022' + title + '\u0022' + "," + rating;
                }
                else {
                     csvFileData = csvFileData + "," + '\u0022' + title + '\u0022' + "," + rating;
                }
                
                if(rating  != 1){
                xmlFileData = xmlFileData + title + " has " + rating + " comments" + "\n";
                }
                else{
                    xmlFileData = xmlFileData + title + " has " + rating + " comment" + "\n";
                }
                
             var li = document.createElement("li");
             li.classList.add("w3-display-container");
             li.innerHTML=title;
             li.style.border="2px solid black";
             var p = document.createElement("p");
             p.classList.add("w3-button","w3-transparent","w3-display-right");
             p.innerHTML=rating;
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
function docBookFunction(){
    //define the heading for each row of the data  
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:xml;charset=utf-8,' + encodeURI(xmlFileData);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'sample.xml';  
    hiddenElement.click();  
}


getGameRank();
function screenshot(){
    html2canvas(document.getElementsByClassName("cardBox")).then(function(canvas){
        var imgdata = canvas.toDataURL('image/png');
        var doc = new jsPDF();
        doc.addImage(imgdata,'PNG',10,10);
        doc.save("sample.pdf")
    });
}

var csvFileData = [  
    ['Alan Walker', 'Singer'],  
    ['Cristiano Ronaldo', 'Footballer'],  
    ['Saina Nehwal', 'Badminton Player'],  
    ['Arijit Singh', 'Singer'],  
    ['Terence Lewis', 'Dancer']  
 ];  

function csvFunction() {  
  
    //define the heading for each row of the data  
    var csv;  
      
    //merge the data with CSV  
    csvFileData.forEach(function(row) {  
        csv += row.join(',');  
        csv += "\n";  
});  
   
    var hiddenElement = document.createElement('a');  
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);  
    hiddenElement.target = '_blank';
     
    //provide the name for the CSV file to be downloaded  
    hiddenElement.download = 'sample.csv';  
    hiddenElement.click();  
}  
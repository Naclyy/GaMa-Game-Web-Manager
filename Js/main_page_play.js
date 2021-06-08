function getGamesCategories(){
var ajax = new XMLHttpRequest();
var method = "GET";
var url="../Php/api/getGamesCategories.php";
var asynchronous = true;

ajax.open(method,url,asynchronous);

ajax.send();

ajax.onreadystatechange = function(){

    if(this.readyState==4 && this.status==200)
    {   
        var categories = JSON.parse(this.responseText);

        n=categories.length;
        if(n > 6)
        n=6;
        for(var i=0;i<n;i++)
        { 
         var category=categories[i];
         var categoryDropdownAll=document.getElementById("allcategories");
         var categoryDropdownUser=document.getElementById("categories");

         var butonAll=document.createElement("button");
         butonAll.classList.add("btn");
         butonAll.innerHTML=category;
         butonAll.setAttribute("onclick","filterSelectionAll('" + category + "')");
         var butonUser=document.createElement("button");
         butonUser.classList.add("btn");
         butonUser.innerHTML=category;
         butonUser.setAttribute("onclick","filterSelection('" + category + "')");

        categoryDropdownAll.appendChild(butonAll);
        categoryDropdownUser.appendChild(butonUser);


        }
    }
}

}
function getGamesAge(){
  var ajax = new XMLHttpRequest();
  var method = "GET";
  var url="../Php/api/getGamesAge.php";
  var asynchronous = true;
  
  ajax.open(method,url,asynchronous);
  
  ajax.send();
  
  ajax.onreadystatechange = function(){
  
      if(this.readyState==4 && this.status==200)
      {   
          var ages = JSON.parse(this.responseText);
          for(var i=0;i< ages.length;i++)
          { 
           var age=ages[i];
           if(age==0)
           age="ForEveryone";
           var ageDropdownAll=document.getElementById("all_pegi_age");
           var ageDropdownUser=document.getElementById("user_pegi_age");
  
           var butonAll=document.createElement("button");
           butonAll.classList.add("btn");
           butonAll.innerHTML=age;
           butonAll.setAttribute("onclick","filterAgeAll('" + age + "')");
           var butonUser=document.createElement("button");
           butonUser.classList.add("btn");
           butonUser.innerHTML=age;
           butonUser.setAttribute("onclick","filterAge('" + age + "')");
  
           ageDropdownAll.appendChild(butonAll);
           ageDropdownUser.appendChild(butonUser);
  
  
          }
      }
  }
  
  }


function getUserGames(){
var ajax = new XMLHttpRequest();
var method = "GET";
var url="../Php/api/getUserGames.php";
var asynchronous = true;

ajax.open(method,url,asynchronous);

ajax.send();

ajax.onreadystatechange = function(){

    if(this.readyState==4 && this.status==200)
    {   
        var games = JSON.parse(this.responseText);
        for(var i=0;i< games.length;i++)
        { 
         var title = games[i].title.toLowerCase();
         var id = games[i].id;
         var category = games[i].category;
         var age = games[i].pegi_age;
         var image_src = games[i].image_src;
         var gallery = document.getElementById("usergames").getElementsByClassName("games_gallery")[0];

         if(age==0)
         age="ForEveryone";
         var div = document.createElement("div");
         div.classList.add("game", "Filter" , age, category,"show");
         div.setAttribute("id",title);

         var image = document.createElement("img");
         image.setAttribute("src",image_src);
         image.setAttribute("alt",title);

         var infoform = document.createElement("form");
         infoform.setAttribute("action","../Html/GameScrapePage.php");
         infoform.setAttribute("method","post");

        var infobutton = document.createElement("button");
         infobutton.setAttribute("value",id);
         infobutton.setAttribute("type","submit");
         infobutton.setAttribute("name","id");
         infobutton.classList.add("infobtn");
         infobutton.appendChild(document.createTextNode("Info"));
     
        var deleteform=document.createElement("form");
        deleteform.classList.add("delete");
        deleteform.setAttribute("action","../Php/api/deleteUserGame.php");
        deleteform.setAttribute("method","post");

        var deletebutton = document.createElement("button");
        deletebutton.setAttribute("value",id);
        deletebutton.setAttribute("type","submit");
        deletebutton.setAttribute("name","id");
        deletebutton.classList.add("deletebtn");
        deletebutton.appendChild(document.createTextNode("Delete"));


         infoform.appendChild(infobutton);
         deleteform.appendChild(deletebutton);
         
         div.appendChild(image);
         div.appendChild(infoform);
         div.appendChild(deleteform);

         gallery.appendChild(div);

         

        }
        $('form.delete').on('submit',function(){
          var that = $(this),
          form=this,
          url = that.attr('action'),
          type = that.attr('method'),
          data = {};
      
          that.find('[name]').each(function(index,value){
              var that = $(this),
              name = that.attr('name'),
              value=that.val();
              data[name]=value;
          });
      
          $.ajax({
              url : url,
              type : type,
              data : data,
              success: function (response){

                var game = form.parentNode;
                if(game.parentNode != null)
                game.parentNode.removeChild(game);


                    
                  
              }
          });
          
         return false;
          
      });

    }
}
}
function getGames(){
var ajax = new XMLHttpRequest();
var method = "GET";
var url="../Php/api/getGames.php";
var asynchronous = true;

ajax.open(method,url,asynchronous);

ajax.send();

ajax.onreadystatechange = function(){

    if(this.readyState==4 && this.status==200)
    {   
        var games = JSON.parse(this.responseText);
        for(var i=0;i< games.length;i++)
        { 
         var title = games[i].title.toLowerCase();
         var id = games[i].id;
         var category = games[i].category;
         var age = games[i].pegi_age;
         var image_src = games[i].image_src;
         var gallery = document.getElementById("AllGames").getElementsByClassName("AllGames-content")[0].getElementsByClassName("games_gallery")[0];
         if(age==0)
         age="ForEveryone";
         var div = document.createElement("div");
         div.classList.add("game", "allFilter" ,age , category,"show");
         div.setAttribute("id",title);

         var image = document.createElement("img");
         image.setAttribute("src",image_src);
         image.setAttribute("alt",title);

         var infoform = document.createElement("form");
         infoform.setAttribute("action","../Html/GameScrapePage.php");
         infoform.setAttribute("method","post");

        var infobutton = document.createElement("button");
         infobutton.setAttribute("value",id);
         infobutton.setAttribute("type","submit");
         infobutton.setAttribute("name","id");
         infobutton.classList.add("infobtn");
         infobutton.appendChild(document.createTextNode("Info"));
     
        var addform=document.createElement("form");
        addform.classList.add("add");
        addform.setAttribute("action","../Php/api/addUserGame.php");
        addform.setAttribute("method","post");

        var addbutton = document.createElement("button");
        addbutton.setAttribute("value",id);
        addbutton.setAttribute("type","submit");
        addbutton.setAttribute("name","id");
        addbutton.classList.add("addbtn");
        addbutton.appendChild(document.createTextNode("Add"));


         infoform.appendChild(infobutton);
         addform.appendChild(addbutton);
         
         div.appendChild(image);
         div.appendChild(infoform);
         div.appendChild(addform);

         gallery.appendChild(div);


        
        }

        $(function() {
          $(".preload").fadeOut(1000, function() {
              $(".beforeload").fadeIn(1000);        
          });
      });


      $('form.add').on('submit',function(){
        var that = $(this),
        form=this,
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};
    
        that.find('[name]').each(function(index,value){
            var that = $(this),
            name = that.attr('name'),
            value=that.val();
            
            data[name]=value;
        });
    
        $.ajax({
            url : url,
            type : type,
            data : data,
            success: function (response){
             if(response == 1)
             {
              var modal = document.getElementById("AllGames");
              modal.style.display="none";
              
              var game = form.parentNode;
              var title = game.id;
              var id = game.firstChild.nextSibling.firstChild.getAttribute('value');
              var image_src = game.firstChild.getAttribute('src');
              var gallery = document.getElementById("usergames").getElementsByClassName("games_gallery")[0];

              var div = document.createElement("div");
              div.classList= game.classList;
              div.setAttribute("id",title);

              var image = document.createElement("img");
              image.setAttribute("src",image_src);
              image.setAttribute("alt",title);

              var infoform = document.createElement("form");
              infoform.setAttribute("action","../Html/GameScrapePage.php");
              infoform.setAttribute("method","post");

              var infobutton = document.createElement("button");
              infobutton.setAttribute("value",id);
              infobutton.setAttribute("type","submit");
              infobutton.setAttribute("name","id");
              infobutton.classList.add("infobtn");
              infobutton.appendChild(document.createTextNode("Info"));
   
               var deleteform=document.createElement("form");
               deleteform.classList.add("delete");
              deleteform.setAttribute("action","../Php/api/deleteUserGame.php");
              deleteform.setAttribute("method","post");

              var deletebutton = document.createElement("button");
              deletebutton.setAttribute("value",id);
              deletebutton.setAttribute("type","submit");
              deletebutton.setAttribute("name","id");
              deletebutton.classList.add("deletebtn");
              deletebutton.appendChild(document.createTextNode("Delete"));


              infoform.appendChild(infobutton);
              deleteform.appendChild(deletebutton);
       
              div.appendChild(image);
              div.appendChild(infoform);
              div.appendChild(deleteform);

              gallery.appendChild(div);

              $('form.delete').on('submit',function(){
                var that = $(this),
                form=this,
                url = that.attr('action'),
                type = that.attr('method'),
                data = {};
            
                that.find('[name]').each(function(index,value){
                    var that = $(this),
                    name = that.attr('name'),
                    value=that.val();
                    data[name]=value;
                });
            
                $.ajax({
                    url : url,
                    type : type,
                    data : data,
                    success: function (response){
                    
                      var game = form.parentNode;
                      if(game.parentNode != null)
                      game.parentNode.removeChild(game);
      
      
                          
                        
                    }
                });
                
               return false;
                
            });
                  
                
            }
            else
            { $(function() {
                $("#error_text").fadeIn(2000);
                $("#error_text").fadeOut(2000);
              });
          
            }
          }
        });
        
       return false;
        
    });


    }
}
}

function filterSelectionAll(c) {
  var x, i;
   x = document.getElementsByClassName("game allFilter");
  if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
   w3RemoveClass(x[i], "show");
  if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
var i, arr1, arr2;
arr1 = element.className.split(" ");
arr2 = name.split(" ");
for (i = 0; i < arr2.length; i++) {
  if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
}
} 

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
   while (arr1.indexOf(arr2[i]) > -1) {
     arr1.splice(arr1.indexOf(arr2[i]), 1);     
   }
  }
  element.className = arr1.join(" ");
 }

function filterSelection(c) {
var x, i;
 x = document.getElementsByClassName("game Filter");
if (c == "all") c = "";
for (i = 0; i < x.length; i++) {
w3RemoveClass(x[i], "show");
if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
}
}

function filterAgeAll(c) {
  var x, i;
   x = document.getElementsByClassName("game allFilter");
  if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
   w3RemoveClass(x[i], "show");
  if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function filterAge(c) {
  var x, i;
   x = document.getElementsByClassName("game Filter");
  if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
   w3RemoveClass(x[i], "show");
  if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}



getUserGames();
getGamesCategories();
getGamesAge();
getGames();
filterSelectionAll("all");
filterSelection("all");  

const searchBar=document.getElementById("myInput");
const allSearchBar=document.getElementById("myInput2");

searchBar.addEventListener('keyup' , (e) => {
  var value=e.target.value.toLowerCase();

 $(".game.Filter").each(function() {
  if(value=="")
  {
    if(!($(this).is('[class*="show"]')))
    {
     $(this).addClass("show");
    }
  }
  else{
   if(!($(this).is('[id^="' + value + '"]')) && $(this).is('[class*="show"]'))
   {
     $(this).removeClass("show");
   }
   else{
     if(!($(this).is('[class*="show"]')) && $(this).is('[id^="' + value + '"]'))
     {
      $(this).addClass("show");
     }
    
   }
  }
 });
});



allSearchBar.addEventListener('keyup' , (e) => {

  var value=e.target.value.toLowerCase();

  $(".game.allFilter").each(function() {
   if(value=="")
   {
     if(!($(this).is('[class*="show"]')))
     {
      $(this).addClass("show");
     }
   }
   else{
    if(!($(this).is('[id^="' + value + '"]')) && $(this).is('[class*="show"]'))
    {
      $(this).removeClass("show");
    }
    else{
      if(!($(this).is('[class*="show"]')) && $(this).is('[id^="' + value + '"]'))
      {
       $(this).addClass("show");
      }
     
    }
   }
  });
  
});


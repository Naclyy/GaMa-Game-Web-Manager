function getUsers(){
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="../../Php/api/getUsers.php";
    var asynchronous = true;
    
    ajax.open(method,url,asynchronous);
    
    ajax.send();
    
    ajax.onreadystatechange = function(){
    
        if(this.readyState==4 && this.status==200)
        {   var listUsers=document.getElementsByClassName("w3-ul","w3-card-4")[0];
            var listAdmins=document.getElementsByClassName("w3-ul","w3-card-4")[1];
            var users = JSON.parse(this.responseText);
            for(var i=0;i< users.length;i++)
            { 
              var name = users[i].username;
              var id = users[i].id;
              var admin = users[i].admin;

              var li = document.createElement("li");
              li.classList.add("w3-display-container");
              li.innerHTML=name;
              li.style.border="2px solid black";

              var form=document.createElement("form");
              form.setAttribute("action","../../Php/api/deleteUser.php");
              form.setAttribute("method","post");
              form.setAttribute("id" , "delete-form");

              var button = document.createElement("button");
              button.setAttribute("type","submit");
              button.setAttribute("name","id");
              button.setAttribute("value",id);
              button.classList.add("w3-button","w3-transparent","w3-display-right");
              button.innerHTML="&times;";

              form.appendChild(button);
              li.appendChild(form);
              if(admin == 1)
              {
                listAdmins.appendChild(li);
              }
              else{
                listUsers.appendChild(li);
              }
              

            }
        }
    }
}

getUsers();

$('form.addAdmin').on('submit',function(){
    var that = $(this),
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
            if(response == 1){
                window.location.href = "../admin/manage_users_page.html";
            }
        }
    });
    

    return false;
});
$('form.login').on('submit',function(){
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
            if(response){
                if(response==1)
                {
                window.location.href = "../Html/admin/admin_page.html";
                }
                else{
                    window.location.href = "../Html/home_play.html";
                }
            } 
            else {
                var test = document.getElementsByClassName("errormessage")[0];
                if( test == null)
                {
                var form = document.getElementById("loginform").getElementsByClassName("container")[0];
                var err = document.createElement("P");
                err.classList.add("errormessage");
                err.style.color="red";
                var text = document.createTextNode("Invalid credentials");
                err.appendChild(text);
                form.appendChild(err);
                }
            }

        }
    });
    

    return false;
});

$('form.signup').on('submit',function(){
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
                window.location.href = "../Html/login_play.html";
            }
        }
    });
    

    return false;
});

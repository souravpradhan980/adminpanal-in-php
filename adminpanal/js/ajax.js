
setInterval(function()
{
  time=new Date().toLocaleTimeString();
},1000);
time=new Date().toLocaleTimeString();
function showdata()
{
  $.ajax({
    url:"http://localhost/adminpanal/showdata/show_back.php",
    type:"POST",
    async:true,
    success:function(data)
    {
      setInterval(function()
      {
        time=new Date().toLocaleTimeString();
        hours=new Date().getHours();
        if(hours>=0 && hours<12)
        {
          var wish="Good Morning!";
        }
        else if(hours>=12 && hours<19)
        {
          var wish="Good Afternoon!";
        }
        else{
          var wish="Good Night!";
        }
        $("h2").html(wish);
        $("h5").html(time);
      },1000);
        
        $("#response").html(data);
        $("#result").fadeIn();
        $("#result").html("List of all Users");
    }
});
}
$(document).ready(function ()
    {

       showdata();
    });
function delete_page()
{
  $.ajax({
    url:"http://localhost/adminpanal/deletedata/delete_font.php",
    type:"POST",
    async:true,
    success:function(data)
    {
        
        $("#response").html(data);
        $(".delete_btn").css("display","block");
        $(".delete").css("display","block");
        $(".delete").css("visibility","visible");
        $(".update_btn").css("display","none");
    }
});
}





function search_data()
{
    
  $.post(
    "searchdata/search_data.php",
     $("#search").serialize(),// have to check with form data.
  
    function(data)
    {
            
        $("#response").html(data);
        $(".delete_btn").css("display","none");
        $(".delete").css("display","none");
        $(".update_btn").css("display","block");
        
          
    }

  );
}
function update_page()
{
    
  $.post(
    "updatedata/update_page.php",
     $("#search").serialize(),// have to check with form data.
  
    function(data)
    {
      $("#result").fadeOut();  
        $("#response").html(data);
        $(".delete_btn").css("display","none");
        $(".delete").css("display","none");
        $(".update_btn").css("display","block");
       
          
    }

  );
}
function update_data()
{
    
  $.post(
    "updatedata/update_data.php",
     $("#all_data").serialize(),// have to check with form data.
  
    function(data)
    {
            
      $("#result").fadeIn();
      $("#result").html(data);
      setTimeout(()=>{
          $("#result").fadeOut();
      },1000);
        $(".delete").css("visibility","hidden");
       
     
    }

  );
}
function deletedata()
{
    
  $.post(
    "deletedata/delete_back.php",
     $("#all_data").serialize(),// have to check with form data.
  
    function(data)
    {
            $("#result").css("backgroundColor","rgb(239 97 21 / 78%)");
            $("#result").fadeIn();
            $("#result").html(data);
            setTimeout(()=>{
                $("#result").fadeOut();
            },1000);


            delete_page()
          
    }

  );
}


function clear_all()
{
    $("#name").val("");
    $("#sex").val("");
    $("#address").val("");
    $("#contact").val("");
    $("#email").val("");
}
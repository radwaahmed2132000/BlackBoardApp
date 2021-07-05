function reply_click(id)
 {
     $("."+id).hide();
     id=id-6;
     $("."+id).show();
   
}

function nextclick(id)
{
    var value = document.getElementsByClassName("Ques");
    
    value=parseInt(value.length);
    
    if(id+6<=value)
    {
        var hideval=id-5;
        $("."+hideval).hide();
        id=id+1;
        $("."+id).show();
      

    }

}
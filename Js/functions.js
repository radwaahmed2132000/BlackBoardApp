function reply_click(id)
 {
     $("."+id).hide();
     id=id-6;
     $("."+id).show();
     if(id<=0)
     {
        $('.Quiz').show();
     }
   
}
function Reply(id)
{
    $("."+id).hide();
    id=id-6;
    $("."+id).show();
    if(id<=0)
    {
       $('.1').show();
    }

}


function nextclick(id)
{
    var value = document.getElementsByClassName("Ques");
    
    value=parseInt(value.length);
    
    if(id+6<=value)
    {
        if(id==0)
        $('.Quiz').hide();
        var hideval=id-5;
        $("."+hideval).hide();
        id=id+1;
        $("."+id).show();
       
      
      

    }  

}
// function DeleteQues(id)
// {
//     var value = document.getElementsByClassName("Ques");
//     value=parseInt(value.length);
//     $("."+id).remove();
//     console.log(id);
//     let j=id;
//     for(let i=id+6;i<=value;i+=6)
//     {
//         // document.getElementsByClassName(i).setAttribute("class",j);
//         // j++;
//     }
//    j=id;
//     for(let i=id+6;i<=value;i++)
//     {
//         console.log(i);
//         document.getElementById(i).setAttribute("id", j);
//         if(i%6!=0)
//          document.getElementById(j).setAttribute("name", j);
//         if(i%6==0)
//         {
//             var radios = document.getElementsByName(i);
//             for( i = 0; i < radios.length; i++ ) {
//                  radios[i].setAttribute("name",j);

//                 }
              
//                // document.getElementsByName(i).setAttribute("name", j);

           
//         }
//         // if(i%6==1)
//         // {
//         //     document.getElementsByClassName(i).setAttribute("class",j);
//         // }
//         console.log(j);
//         j++;
//     }
//     value-=6;
//     // for(let i=1;i<=value;i+=6)
//     // {
//     //     document.getElementsByClassName(i).setAttribute("class",j);
//     // }

// }
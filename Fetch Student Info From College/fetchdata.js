function selectStudent(){
    
    //onchange event triggered to get college selected
    var data = document.getElementById("Student").value;
    console.log(data); 
    
    
    $.ajax({
                url : "showData.php",
                method: "GET",
                data:{
                    id : data
                },
                //dataType:'json',
                success:function(data){
                    $("#ans").html(data);
                }
            });
}


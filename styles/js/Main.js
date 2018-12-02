$(document).ready(function(){
  console.log("main js ready");
});


function getUsuarios(){


  var strUsers = '<option value="0">Elegir</option>';

  $.ajax({
      url:'?view=utils',
      async:false,
      data:'getUsuarios=true',
      type:'post',
      dataType:'text',
      success:function(response){
          //console.log(response);

          var parseData = JSON.parse(response);
          $.each(parseData, function(i, user){
            //console.log("i: "+i+" - value: "+user.user);
            strUsers+='<option value="'+i+'">'+user.user+'</option>';
          });

          //console.log(strUsers);
          //select.append(strUsers);

      },
      timeout:4000,
      error:function(){
        alert("Error de conexion, intentelo mas tarde");
      }
    });

    return strUsers;
}

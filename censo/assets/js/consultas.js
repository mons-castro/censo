$(document).ready(function(){
	// Activate tooltip
	
	AjaxJSON();

	$("#insertRegistro").click(function(){
		insertRegistro();
			
	});
	/*
	

	$(document).on('click','delete', function(e) {
        e.preventDefault();
		
        var parent = $(this).attr('id');
        alert("presionaste"+parent)
 
        var dataString = 'DNI='+parent;
 
        $.ajax({
            type: "POST",
            url: "../../assets/php/delete.php",
            data: dataString,
            success: function(response) {			
                $('.alert-success').empty();
                $('.alert-success').append(response).fadeIn("slow");
                $('#'+parent).fadeOut("slow");
            }
        });
                    
}); */


           
});

function AjaxJSON(){
    $.ajax({
        type:"POST",
        async:true,
        url:"../../assets/php/consulta.php",
		data:{
		},
		dataType:'json',
        success: function(response)
            {   
				var len = response.length;
				for(var i=0; i<len; i++){
					var dni = response[i].DNI;
					var nombre = response[i].NOMBRE;
					var fecnac = response[i].FECNAC;
					var dir = response[i].DIR;
					var tfno = response[i].TFNO;

					var tr_str = "<tr class='tr'>" +
					"<td align='left'>" + dni + "</td>" +
					"<td align='left'>" + nombre + "</td>" +
					"<td align='left'>" + fecnac + "</td>" +
					"<td align='left'>" + dir + "</td>" +
					"<td align='left'>" + tfno + "</td>" +
					"<td><form action='../../assets/php/delete.php' method='post'>"+
					"<a href='#editEmployeeModal' id='"+dni+"' data='"+dni+"' class='btn edit'  data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
					"<button  id='"+(dni)+"' name='dni' value='"+dni+"' class='btn delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE872;</i></button>"
					+"</form></td>"
					"</tr>";
					


				$("#tbody").append(tr_str);
			}
			
		}
	});
 
}

function insertRegistro(){
	$.ajax({
        type:"POST",
        async:true,
        url:"../../assets/php/insert.php",
		data:$("#insertP").serialize(),
        success: function(insert)
            {                                                               
                  if(insert.respuesta_insert==true){
					("#newPerson").hide();
			
						
				}
		
			}
	});
}



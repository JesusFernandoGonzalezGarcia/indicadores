$(document).ready(function () {

    let editar = false;

    listarTarea();
//-------------------Buscar----------------------------------
    console.log("Todo correcto con jQuery");
    $('#resultadoTarea').hide();


//-------------------------------------------------------------

//-----------------Insertar
    $('#task-form').submit(function (e) {
        const postData= {
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            id: $('#tareaId').val()
        };
        
        
        let url = editar === false ? 'insertarTarea.php': 'modificarTarea.php';

        $.post(url,postData,function(response){
            
            console.log(response);
            listarTarea();
            if (response=='Ingresa un nombre') {
                Swal.fire({
                    title: "Advertencia",
                    text: "Revisa el nombre de la tarea",
                    icon: "warning"
                  });
            }

            if (response=='Ingresa una descripcion') {
                Swal.fire({
                    title: "Advertencia",
                    text: "Revisa la descripcion de la tarea",
                    icon: "warning"
                  });
            }

            if (response=='si') {
                Swal.fire(
                  'Exito',
                  'Se ha insertado correctamente!',
                  'success'
                )
                
            }
            
            $('#task-form').trigger('reset');
        });

         //console.log(url);
         const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: "btn btn-success",
              cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
          });
          swalWithBootstrapButtons.fire({
            title: "¿Realmente deseas actualizar los datos?",
            text: "No se podran revertir los cambios",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Actualizar",
            cancelButtonText: "Cancelar",
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              
        $.post(url,postData,function(response){
            
            console.log(response);
            listarTarea();
            if (response=='Ingresa un nombre') {
                Swal.fire({
                    title: "Advertencia",
                    text: "Revisa el nombre de la tarea",
                    icon: "warning"
                  });
            }

            if (response=='Ingresa una descripcion') {
                Swal.fire({
                    title: "Advertencia",
                    text: "Revisa la descripcion de la tarea",
                    icon: "warning"
                  });
            }

            if (response=='si') {
                Swal.fire(
                  'Exito',
                  'Se ha insertado correctamente!',
                  'success'
                )
                
            }
            
            $('#task-form').trigger('reset');
        });

        swalWithBootstrapButtons.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelled",
            text: "Your imaginary file is safe :)",
            icon: "error"
          });
        }
      });

      cancelarAccion();
      e.preventDefault();
    });
//----------------------------------------------------------------------

//------------------Listar-------------------------------------------
function listarTarea() {
    $.ajax({
        url:'register.php',
        type: 'GET',
        success:function(response){
        //console.log(response);
        let tareas = JSON.parse(response);
        let template='';
        tareas.forEach(tarea => {
            template+= `
            <tr tareaId="${tarea.id_tarea}">
                <td>${tarea.id_tarea}</td>
                <td>${tarea.nombre}</td>                                         
                <td>${tarea.descripcion}</td>
                <td >
                    <button class="task-editar btn btn-primary">
                    <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="task-delete btn btn-danger">
                    <i class="bi bi-trash-fill"></i>
                    </button>                        
                </td>
            </tr>
                    `
        });
            $('#tareas').html(template);
        }
        });
}

//----------------------------------------------------------------------

//---------------Eliminar-----------------------------------------

    $(document).on('click','.task-delete', function(){
        Swal.fire({
            title: "¿Estas seguro de eliminarlo?",
            text: "No podras deshacer el cambio!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText:"Cancelar",
            confirmButtonText: "Confirmar"
        }).then((result) => {
            if (result.isConfirmed) {
                let elemento= $(this)[0].parentElement.parentElement;
                let id= $(elemento).attr('tareaId');
                $.post('register.php',{id},function(response){               
                    listarTarea();
                });
            Swal.fire({
                title: "Eliminado!",
                text: "El registro a sido eliminado.",
                icon: "success"
            });
            }
        });
    });
//--------------------------------------------------------------------

//-----------------Editar----------------------------------------
$(document).on('click','.task-editar',function(){
    let elemento =$(this)[0].parentElement.parentElement;
    let id= $(elemento).attr('tareaId');
    //console.log(id);
    $.post('register.php',{id},function(response){
        //console.log(response);
        const task= JSON.parse(response);
        $('#nombre').val(task.nombre);
        $('#descripcion').val(task.descripcion);
        $('#tareaId').val(task.id_tarea);
        editar=true;

        //Boton para modificar
        $("#btn_registrar").html(
            "Modificar <i class='bi bi-bookmark-heart'></i>"
        );
        $("#btn_registrar").removeClass("btn-success");
        $("#btn_registrar").addClass("btn-warning");
        
    })
    
    
});
//--------------------------------------------------------------------



//-----Cancelar-------
$("#btn_cancelar").on("click",function(){
    cancelarAccion();
  });
  
  function cancelarAccion(){
  
    $("#btn_registrar").html("Registrar <i class='bi bi-person-plus'></i>");
    $("#btn_registrar").removeClass("btn-warning");
    $("#btn_registrar").addClass("btn-success");
    editar=false;
  }
//------------------
});


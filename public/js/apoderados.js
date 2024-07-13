function soloLetras(input) {
    // Permitir solo letras y espacios
    //Linea de codigo en el imput:  oninput="soloLetrasNumeros(this)"
    input.value = input.value.replace(/[^a-zA-Z\sÑñ]/g, '');
}
function soloNumeros(input) {
    // Permitir solo letras y espacios
    //Linea de codigo en el imput:  oninput="soloLetrasNumeros(this)"
    input.value = input.value.replace(/[^0-9\s]/g, '');
}

function soloLetrasNumeros(input) {
    // Permitir solo letras, números y espacios, excluyendo caracteres especiales
    input.value = input.value.replace(/[^a-zA-Z0-9\s-_.-.@]/g, '');
}

function soloLetrasNumerosCaracteres(input) {
    // Permitir solo letras, números y espacios, excluyendo caracteres especiales
    input.value = input.value.replace(/[^a-zA-Z0-9\s.-]/g, '');
}
$(document).ready(function() {

    // Crear evento, aplicando ajax aqui va en el formulario, es tipo id
    $('#create_apoderado').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/impulsa/estudiantes"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'APODERADO EXISTENTE.',
                });
            }
        });
    });

    // Editar apoderado tipo class
    $('.edit_apoderado').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'PUT',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Apoderado editado exitosamente',
                    showConfirmButton: false,
                    timer: 1000
                });
                setTimeout(() => {
                    location.reload();
                }, 500);
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo editar el evento.',
                });
            }
        });
    });

    // Eliminar rol
    /* la siguiente script va directamente ubicada en el button (submit), es de tipo class

    */

    $('.delete_evento').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Evento eliminado exitosamente',
                    showConfirmButton: false,
                    timer: 1000
                });
                setTimeout(() => {
                    location.reload();
                }, 1000);
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar el evento.',
                });
            }
        });
    });

 
});
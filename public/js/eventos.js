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
    input.value = input.value.replace(/[^a-zA-Z0-9\s.-.@]/g, '');
}

function soloLetrasNumerosCaracteres(input) {
    // Permitir solo letras, números y espacios, excluyendo caracteres especiales
    input.value = input.value.replace(/[^a-zA-Z0-9\s.-]/g, '');
}

$(document).ready(function() {

    // Crear evento, aplicando ajax aqui va en el formulario, es tipo id
    $('#create_evento').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Evento registrado exitosamente',
                    showConfirmButton: false,
                    timer: 500
                }).then((result) => {
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/eventos";
                    
                });
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR - EVENTO EXISTENTE.',
                });
            }
        });
    });

    // Editar evento tipo class
    $('.edit_evento').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'PUT',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Evento editado exitosamente',
                    showConfirmButton: false,
                    timer: 500
                }).then((result) => {
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/eventos";
                    
                });
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
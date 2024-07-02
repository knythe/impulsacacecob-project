function soloLetras(input) {
    // Permitir solo letras y espacios
    //Linea de codigo en el imput:  oninput="soloLetrasNumeros(this)"
    input.value = input.value.replace(/[^a-zA-Z\sÑñ]/g, '');
}

function soloLetrasNumeros(input) {
    // Permitir solo letras, números y espacios, excluyendo caracteres especiales
    input.value = input.value.replace(/[^a-zA-Z0-9\s.-]/g, '');
}

$(document).ready(function() {
    // Crear usuario
    $('#create_usuario').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario registrado exitosamente',
                    showConfirmButton: false,
                    timer: 500
                });
                setTimeout(() => {
                    location.reload();
                }, 100);
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR - USUARIO REGISTRADO.',
                });
            }
        });
    });

    // Editar usuario tipo class
    $('.edit_usuario').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'PUT',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario editado exitosamente',
                    showConfirmButton: false,
                    timer: 500
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
                    text: 'No se pudo editar el usuario.',
                });
            }
        });
    });

     // Eliminar usuario
    /* la siguiente script va directamente ubicada en el button (submit), es de tipo class
    */
    $('.delete_usuario').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario eliminado exitosamente',
                    showConfirmButton: false,
                    timer: 500
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
                    text: 'No se pudo eliminar el usuario.',
                });
            }
        });
    });

 
});

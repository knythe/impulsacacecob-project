// public/js/roles.js
function soloLetras(input) {
    // Permitir solo letras y espacios
    //Linea de codigo en el imput:  oninput="soloLetrasNumeros(this)"
    input.value = input.value.replace(/[^a-zA-Z\sÑñ]/g, '');
}

function soloLetrasNumeros(input) {
    // Permitir solo letras, números y espacios, excluyendo caracteres especiales
    input.value = input.value.replace(/[^a-zA-Z0-9\s.-/]/g, '');
}

$(document).ready(function() {
    // Crear rol
    $('#createRoleForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Registrado',
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
                    text: 'No se pudo crear el rol.',
                });
            }
        });
    });

    // Editar rol
    $('.editRoleForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'PUT',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Editado',
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
                    text: 'No se pudo editar el rol.',
                });
            }
        });
    });

    // Eliminar rol
    $('.deleteRoleForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Eliminado',
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
                    text: 'No se pudo eliminar el rol.',
                });
            }
        });
    });

 
});

$('.edit_venta').on('submit', function(e) {
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
                timer: 1500
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

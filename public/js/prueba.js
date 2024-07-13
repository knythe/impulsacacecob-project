// archivo: busquedaEstudiante.js

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('busquedaEstudianteForm').addEventListener('submit', function (event) {
        event.preventDefault();

        let dni = document.getElementById('dni').value;
        let csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        let csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : '';

        fetch('/academiaimpulsa/buscar/estudiante/informacion/pagos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ dni: dni })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                Swal.fire({
                    icon: 'info',
                    title: 'Información',
                    text: data.message
                });
            } else {
                // Aquí puedes procesar los datos retornados
                console.log(data);
                // Actualiza tu vista con los datos recibidos
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

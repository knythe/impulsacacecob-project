document.addEventListener('DOMContentLoaded', function () {
    // Obtén todas las celdas de monto
    const montos = document.querySelectorAll('#dataTable tbody tr td:nth-child(5)');

    let totalCancelado = 0;

    // Recorre las celdas y suma los valores
    montos.forEach(function (monto) {
        // Elimina el texto "S/." y convierte a número
        const valor = parseFloat(monto.textContent.replace('S/.', '').trim());
        if (!isNaN(valor)) {
            totalCancelado += valor;
        }
    });

    // Coloca el total cancelado en el pie de la tabla
    document.getElementById('total_cancelado').textContent = 'S/. ' + totalCancelado.toFixed(0);

    // Obtén el costo total del div
    const costoDiv = document.querySelector('.form-group.col-sm-4 input').value;
    const costoTotal = parseFloat(costoDiv.replace('S/.', '').trim());

    // Calcula el total adeudado
    const totalAdeudado = costoTotal - totalCancelado;

    // Coloca el total adeudado en el pie de la tabla
    document.getElementById('total_adeudado').textContent = 'S/. ' + totalAdeudado.toFixed(0);
});

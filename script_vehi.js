document.addEventListener('DOMContentLoaded', async () => {
    const VehiculoList = document.getElementById('VehiculoList');
    const deleteSelectedButton = document.getElementById('deleteSelected');

    // Función para obtener y mostrar los Vehículos
    async function loadVehiculos() {
        try {
            const response = await fetch('api_vehi.php?getvehiculo=true');
            const Vehiculos = await response.json();

            VehiculoList.innerHTML = '';

            // Crear la tabla
            const table = document.createElement('table');
            table.classList.add('table', 'table-bordered');

            // Crear los encabezados de la tabla
            const thead = document.createElement('thead');
            const headerRow = document.createElement('tr');
            const headers = ['Seleccionar', 'ID Vehículo', 'Kilómetros Recorridos', 'ID Tipo de Vehículo', 'Acción'];

            headers.forEach(headerText => {
                const th = document.createElement('th');
                th.textContent = headerText;
                headerRow.appendChild(th);
            });

            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Crear el cuerpo de la tabla
            const tbody = document.createElement('tbody');

            Vehiculos.forEach(vehiculo => {
                const row = document.createElement('tr');
                row.dataset.id = vehiculo.id_vehiculo;

                const checkboxCell = document.createElement('td');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.classList.add('itemCheckbox');
                checkboxCell.appendChild(checkbox);
                row.appendChild(checkboxCell);

                const idCell = document.createElement('td');
                idCell.textContent = vehiculo.id_vehiculo;
                row.appendChild(idCell);

                const kmCell = document.createElement('td');
                kmCell.textContent = vehiculo.kilometros_recorridos;
                row.appendChild(kmCell);

                const tipoCell = document.createElement('td');
                tipoCell.textContent = vehiculo.id_tipo_de_vehiculo;
                row.appendChild(tipoCell);

                const actionCell = document.createElement('td');
                const viewButton = document.createElement('button');
                viewButton.textContent = 'Ver Perfil de Vehículo';
                viewButton.classList.add('btn', 'btn-sm', 'btn-primary');
                viewButton.addEventListener('click', () => {
                    window.location.href = `profile_vehi.php?id=${vehiculo.id_vehiculo}`;
                });
                actionCell.appendChild(viewButton);
                row.appendChild(actionCell);

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            VehiculoList.appendChild(table);
        } catch (error) {
            console.error('Error al obtener los Vehículos:', error);
        }
    }

    // Cargar los items inicialmente
    loadVehiculos();

    // Manejar el botón de eliminación de elementos seleccionados
    deleteSelectedButton.addEventListener('click', async () => {
        const selectedVehiculo = document.querySelectorAll('.itemCheckbox:checked');
    
        const idsToDelete = Array.from(selectedVehiculo).map(checkbox => checkbox.closest('LI').dataset.id);

        try {
            await Promise.all(idsToDelete.map(async id => {
                const response = await fetch(`api_vehi.php?id=${id}`, {  //cambiar la direccion de la api
                    method: 'DELETE',
                });

                if (response.ok) {
                    const listVehiculo = document.querySelector(`li[data-id='${id}']`);
                    listVehiculo.remove();
                } else {
                    console.error('Error al eliminar el Vehiculo:', await response.json());
                }
            }));
        } catch (error) {
            console.error('Error al eliminar los Vehiculos:', error);
        }
    });
});
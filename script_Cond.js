document.addEventListener('DOMContentLoaded', async () => {
    const ConductorList = document.getElementById('ConductorList');
    const deleteSelectedButton = document.getElementById('deleteSelected');

   // Función para obtener y mostrar los Conductores
   async function loadConductor() {
    try {
        const response = await fetch('api_cond.php?getConductor=true');
        const Conductores = await response.json();

        ConductorList.innerHTML = '';

        // Crear la tabla
        const table = document.createElement('table');
        table.classList.add('table', 'table-bordered');

        // Crear los encabezados de la tabla
        const thead = document.createElement('thead');
        const headerRow = document.createElement('tr');
        const headers = ['Seleccionar', 'ID Conductor', 'Nombre', 'Edad', 'Costo', 'Acción'];

        headers.forEach(headerText => {
            const th = document.createElement('th');
            th.textContent = headerText;
            headerRow.appendChild(th);
        });

        thead.appendChild(headerRow);
        table.appendChild(thead);

        // Crear el cuerpo de la tabla
        const tbody = document.createElement('tbody');

        Conductores.forEach(Conductor => {
            const row = document.createElement('tr');
            row.dataset.id = Conductor.id_conductor;

            const checkboxCell = document.createElement('td');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.classList.add('itemCheckbox');
            checkboxCell.appendChild(checkbox);
            row.appendChild(checkboxCell);

            const idCell = document.createElement('td');
            idCell.textContent = Conductor.id_conductor;
            row.appendChild(idCell);

            const nameCell = document.createElement('td');
            nameCell.textContent = Conductor.nombre;
            row.appendChild(nameCell);

            const ageCell = document.createElement('td');
            ageCell.textContent = Conductor.edad;
            row.appendChild(ageCell);

            const costCell = document.createElement('td');
            costCell.textContent = Conductor.costo;
            row.appendChild(costCell);

            const actionCell = document.createElement('td');
            const viewButton = document.createElement('button');
            viewButton.textContent = 'Ver Perfil';
            viewButton.classList.add('btn', 'btn-sm', 'btn-primary');
            viewButton.addEventListener('click', () => {
                window.location.href = `profile.php?id=${Conductor.id_conductor}`;
            });
            actionCell.appendChild(viewButton);
            row.appendChild(actionCell);

            tbody.appendChild(row);
        });

        table.appendChild(tbody);
        ConductorList.appendChild(table);
    } catch (error) {
        console.error('Error al obtener los conductores:', error);
    }
}

    // Cargar los items inicialmente
    loadConductor();

    // Manejar el botón de eliminación de elementos seleccionados
    deleteSelectedButton.addEventListener('click', async () => {
        const selectedConductor = document.querySelectorAll('.itemCheckbox:checked');
    
        const idsToDelete = Array.from(selectedConductor).map(checkbox => checkbox.closest('LI').dataset.id);

        try {
            await Promise.all(idsToDelete.map(async id => {
                const response = await fetch(`api_cond.php?id=${id}`, {
                    method: 'DELETE',
                });

                if (response.ok) {
                    const listConductor = document.querySelector(`li[data-id='${id}']`);
                    listConductor.remove();
                } else {
                    console.error('Error al eliminar el conductor:', await response.json());
                }
            }));
        } catch (error) {
            console.error('Error al eliminar los conductores:', error);
        }
    });
});
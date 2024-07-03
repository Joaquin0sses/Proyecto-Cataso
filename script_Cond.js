document.addEventListener('DOMContentLoaded', async () => {
    const ConductorList = document.getElementById('ConductorList');
    const deleteSelectedButton = document.getElementById('deleteSelected');

    // Función para obtener y mostrar los Conductores
    async function loadConductor() {
        try {
            const response = await fetch('api_cond.php?getConductor=true');
            const Conductor = await response.json();

            ConductorList.innerHTML = '';
            Conductor.forEach(Conductor => {
                const listConductor = document.createElement('LI');
                listConductor.dataset.id = Conductor.id_conductor;

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.classList.add('itemCheckbox');

                const viewButton = document.createElement('button');
                viewButton.textContent = 'Ver Perfil';
                viewButton.classList.add('btn', 'btn-sm', 'btn-primary');
                viewButton.addEventListener('click', () => {
                    window.location.href = `profile.php?id=${Conductor.id_conductor}`;
                });

                listConductor.appendChild(checkbox);
                listConductor.appendChild(document.createTextNode(`${Conductor.id_conductor} - ${Conductor.nombre} - ${Conductor.edad} - `));
                listConductor.appendChild(viewButton);
                ConductorList.appendChild(listConductor);
            });
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
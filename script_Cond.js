document.addEventListener('DOMContentLoaded', async () => {
    const ConductorList = document.getElementById('ConductorList');
    const deleteSelectedButton = document.getElementById('deleteSelected');
  
    // Función para obtener y mostrar los Conductores
    async function loadConductor() {
        try {
            const response = await fetch('api.php?Conductor');
            const Conductor = await response.json();

            ConductorList.innerHTML = '';
            Conductor.forEach(Conductor => {
                const listConductor = document.createElement('li');
                listConductor.dataset.id_conductor = Conductor.id_conductor;

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.classList.add('itemCheckbox');

                const viewButton = document.createElement('button');
                viewButton.textContent = 'Ver Perfil';
                viewButton.addEventListener('click', () => {
                    window.location.href = `profile.html?id=${Conductor.id_conductor}`;
                });

                listConductor.appendChild(checkbox);
                listConductor.appendChild(document.createTextNode(`${Conductor.id_conductor} - ${Conductor.Nombre} - ${Conductor.Edad}`));
                listConductor.appendChild(viewButton);
                ConductorList.appendChild(listConductor);
            });
        } 
        catch (error) {
            console.error('Error al obtener los Conductores:', error);
        }
    }

    // Cargar los items inicialmente
    loadConductor();
           
    // Manejar el botón de eliminación de elementos seleccionados
    deleteSelectedButton.addEventListener('click', async () => {
        const selectedConductor = document.querySelectorAll('.itemCheckbox:checked');
    
        const idsToDelete = Array.from(selectedConductor).map(checkbox => checkbox.closest('li').dataset.id_conductor);

        try {
            await Promise.all(idsToDelete.map(async id_conductor => {
            const response = await fetch(`api.php?id=${id_conductor}`, {
            method: 'DELETE',
            });

            if (response.ok) {
                const listConductor = document.querySelector(`li[data-id_conductor='${id_conductor}']`);
                listConductor.remove();
            } 
            else {
                console.error('Error al eliminar el Conductor:', await response.json());
            }
            }));
        }
        catch (error) {
            console.error('Error al agregar el Conductor:', error);
        }
    }); 
});
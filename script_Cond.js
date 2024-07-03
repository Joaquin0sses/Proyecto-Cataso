document.addEventListener('DOMContentLoaded', async () => {
    const ConductorList = document.getElementById('ConductorList');
    const addConductorForm = document.getElementById('addConductorForm');
    const ConductorNombreInput = document.getElementById('ConductorNombre');
    const EdadConductorInput = document.getElementById('EdadConductor');
    const deleteSelectedButton = document.getElementById('deleteSelected');
  
    // Función para obtener y mostrar los Conductores
    async function loadConductor() {
        try {
            const response = await fetch('http://localhost:3000/api/Conductor');
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
                listConductor.appendChild(document.createTextNode(`${Conductor.id_conductor} - ${Conductor.Nombre} - ${Conductor.id_licencia} - ${Conductor.Edad}`));
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

    // Manejar el envío del formulario para agregar un nuevo item
    addConductorForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const newConductorNombre = ConductorNombreInput.value.trim();
        const newEdadConductor = EdadConductorInput.value;

        if (newConductorNombre && newEdadConductor) {
            try {
                const response = await fetch('http://localhost:3000/api/Conductor', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ Nombre: newConductorNombre, Edad: newEdadConductor }),
                });

                if (response.ok) {
                    const newConductor = await response.json();
                    const listConductor = document.createElement('li');
                    listConductor.dataset.id = newConductor.id;

                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.classList.add('itemCheckbox');
                    
                    listConductor.appendChild(checkbox);
                    listConductor.appendChild(document.createTextNode(`${newConductor.Nombre} - ${newConductor.Edad}`));
                    ConductorList.appendChild(listConductor);

                    ConductorNombreInput.value = '';
                    EdadConductorInput.value = '';
                } 
                else {
                    console.error('Error al agregar el Conductor:', await response.json());
                }
            }
            catch (error) {
                console.error('Error al agregar el item:', error);
            }
        }
    });
           
    // Manejar el botón de eliminación de elementos seleccionados
    deleteSelectedButton.addEventListener('click', async () => {
        const selectedConductor = document.querySelectorAll('.itemCheckbox:checked');
    
        const idsToDelete = Array.from(selectedConductor).map(checkbox => checkbox.closest('li').dataset.id_conductor);

        try {
            await Promise.all(idsToDelete.map(async id_conductor => {
            const response = await fetch(`http://localhost:3000/api/items/${id_conductor}`, {
            method: 'DELETE',
            });

            if (response.ok) {
                const deletedConductor = await response.json();
                const listConductor = document.querySelector(`li[data-id_conductor='${deletedConductor.id_conductor}']`);
                listConductor.remove();
            } 
            else {
                console.error('Error al eliminar el item:', await response.json());
            }
            }));
        }
        catch (error) {
            console.error('Error al agregar el Conductor:', error);
        }
    }); 
});
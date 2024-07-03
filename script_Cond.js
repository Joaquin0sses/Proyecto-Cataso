document.addEventListener('DOMContentLoaded', async () => {
    const ConductorList = document.getElementById('ConductorList');
    const addConductorForm = document.getElementById('addConductorForm');
    const ConductorNameInput = document.getElementById('ConductorNombre');
    const EdadConductorInput = document.getElementById('EdadConductor');
  
    // Función para obtener y mostrar los Conductores
    async function loadConductor() {
    try {
      const response = await fetch('http://localhost:3000/api/Conductor');
      const Conductor = await response.json();

      ConductorList.innerHTML = '';
      Conductor.forEach(Conductor => {
        const listConductor = document.createElement('li');
        listConductor.textContent = '${Conductor.Nombre} - ${Conductor.Edad}';
        ConductorList.appendChild(listConductor);
      });
    } catch (error) {
      console.error('Error al obtener los Conductores:', error);
    }
    }

    // Cargar los items inicialmente
    loadConductor();

    // Manejar el envío del formulario para agregar un nuevo item
    addConductorForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const newConductorNombre = ConductorNombreInput.value.trim();
        const newEdad = EdadConductorInput.value;

        if (newConductorName && newEdad) {
            try {
                const response = await fetch('http://localhost:3000/api/Conductor', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ Name: newConductorNombre, Edad: newEdad }),
                });

                if (response.ok) {
                    const newConductor = await response.json();
                    const listConductor = document.createElement('li');
                    listConductor.textContent = '${newConductor.Name} - ${newConductor.Edad}';
                    ConductorList.appendChild(listConductor);
                    ConductorNameInput.value = '';
                    EdadConductorInput.value = '';
                } else {
                    console.error('Error al agregar el Conductor:', await response.json());
                }
                }
            catch (error) {
                console.error('Error al agregar el Conductor:', error);
            }
        }
    });
});
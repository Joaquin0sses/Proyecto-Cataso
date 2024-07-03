document.addEventListener('DOMContentLoaded', async () => {
    const ConductorList = document.getElementById('ConductorList');
    const addConductorForm = document.getElementById('addConductorForm');
    const ConductorNameInput = document.getElementById('ConductorName');
    const EdadInput = document.getElementById('EdadConductor');
  
    // Función para obtener y mostrar los Conductores
    async function loadConductor() {
    try {
      const response = await fetch('http://localhost:3000/api/Conductor');
      const items = await response.json();
  
      items.forEach(Conductor => {
        const listConductor = document.createElement('li');
        listConductor.textContent = Conductor.name;
        ConductorList.appendChild(listConductor);
      });
    } catch (error) {
      console.error('Error al obtener los Conductor:', error);
    }
    }

    // Cargar los items inicialmente
    loadConductor();

    // Manejar el envío del formulario para agregar un nuevo item
    addConductorForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const newConductorName = ConductorNameInput.value.trim();
        const newEdad = EdadInput.value;

        if (newConductorName && newEdad) {
            try {
                const response = await fetch('http://localhost:3000/api/Conductor', {
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ name: newConductorName, edad: newEdad }),
                });

                if (response.ok) {
                    const newConductor = await response.json();
                    const listConductor = document.createElement('li');
                    listConductor.textContent = '${newConductor.name} - ${newConductor.edad}';
                    ConductorList.appendChild(listConductor);
                    ConductorNameInput.value = '';
                    EdadInput.value = '';
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
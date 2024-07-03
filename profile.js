document.addEventListener('DOMContentLoaded', async () => {
    const profileDiv = document.getElementById('profile');
    const urlParams = new URLSearchParams(window.location.search);
    const ConductorId = urlParams.get('id_conductor');
  
    // Función para obtener y mostrar el perfil del item
    async function loadProfile() {
      try {
        const response = await fetch(`api.php?id=${Id_conductor}`);
        if (response.ok) {
          const Conductor = await response.json();
          profileDiv.innerHTML = `
            <p>ID: ${Conductor.Id_conductor}</p>
            <p>Nombre: ${Conductor.nombre}</p>
            <p>Edad: ${Conductor.Edad}</p>
          `;
        } else {
          profileDiv.innerHTML = '<p>Error al obtener el perfil</p>';
        }
      } catch (error) {
        console.error('Error al obtener el perfil:', error);
        profileDiv.innerHTML = '<p>Error al obtener el perfil</p>';
      }
    }
  
    // Cargar el perfil inicialmente
    loadProfile();
  });
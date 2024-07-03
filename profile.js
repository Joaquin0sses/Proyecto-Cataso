document.addEventListener('DOMContentLoaded', async () => {
    const profileDiv = document.getElementById('profile');
    const urlParams = new URLSearchParams(window.location.search);
    const Id = urlParams.get('id');
  
    // Función para obtener y mostrar el perfil del item
    async function loadProfile() {
      try {
        const response = await fetch(`api_cond.php?id=${Id}`);
        if (response.ok) {
          const Conductor = await response.json();
          profileDiv.innerHTML = `
            <p>ID: ${Conductor.id_conductor}</p>
            <p>Nombre: ${Conductor.nombre}</p>
            <p>Licencia: ${Conductor.id_licencia}</p>
            <p>Edad: ${Conductor.edad}</p>
            <p>Descripción: ${Conductor.description}</p>
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
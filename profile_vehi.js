document.addEventListener('DOMContentLoaded', async () => {
    const profileDiv = document.getElementById('profile_vehi');
    const urlParams = new URLSearchParams(window.location.search);
    const Id = urlParams.get('id');
  
    // Función para obtener y mostrar el perfil del item
    async function loadProfile() {
      try {
        const response = await fetch(`api_vehi.php?id=${Id}`);
        if (response.ok) {
          const vehiculo = await response.json();
          profileDiv.innerHTML = `
            <p>ID: ${vehiculo.id_vehiculo}</p>
            <p>Kilometros recorridos: ${vehiculo.kilometros_recorridos}</p>
            <p>Tipo de vehiculo: ${vehiculo.id_tipo_de_vehiculo}</p>
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
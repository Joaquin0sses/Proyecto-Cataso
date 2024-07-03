const express = require('express');
const { Pool } = require('pg'); // Driver para PostgreSQL

const app = express();

// Configuración de conexión a la base de datos PostgreSQL
const pool = new Pool({
    user: 'postgres',
  host: '34.67.116.97',
  database: 'Database',
  password: 'cataso123',
  port: 5432,
});

// Middleware para manejar solicitudes JSON
app.use(express.json());

// Ruta para obtener datos de la base de datos
app.get('/api/vehiculo', async (req, res) => {
    try {
        const client = await pool.connect();
        const result = await client.query('SELECT * FROM vehiculo'); // Cambia 'tabla' por el nombre de tu tabla
        client.release();
        res.json(result.rows);
    } catch (err) {
        console.error('Error en la consulta:', err);
        res.status(500).json({ error: 'Error en la consulta' });
    }
});

// Puerto en el que escucha la aplicación
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor escuchando en el puerto ${PORT}`);
});
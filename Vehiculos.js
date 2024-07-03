const express = require('express');
const { Pool } = require('pg');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Configura la conexión a PostgreSQL
const pool = new Pool({
  user: 'postgres',
  host: '34.67.116.97',
  database: 'Database',
  password: 'cataso123',
  port: 5432,
});

// Middleware para parsear el cuerpo de las solicitudes
app.use(bodyParser.json());

// Define una ruta para obtener los datos
app.get('/api/vehiculo', async (req, res) => {
  try {
    const result = await pool.query('SELECT * FROM vehiculo');
    res.json(result.rows);
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Error al obtener los datos' });
  }
});

// Ruta para agregar un nuevo item
app.post('/api/vehiculo', async (req, res) => {
    const { id_vehiculo, kilometros_recorridos, id_tipo_de_vehiculo } = req.body;
    try {
      const result = await pool.query('INSERT INTO Vehiculo (id_vehiculo, kilometros_recorridos, id_tipo_de_vehiculo) VALUES ($1, $2,$3) RETURNING *', [id_vehiculo, kilometros_recorridos, id_tipo_de_vehiculo]);
      res.status(201).json(result.rows[0]);
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: 'Error al agregar los datos' });
    }
  });

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
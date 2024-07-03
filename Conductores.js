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
app.get('/api/Conductor', async (req, res) => {
  try {
    const result = await pool.query('SELECT * FROM Conductor');
    res.json(result.rows);
  } catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Error al obtener los datos' });
  }
});

// Ruta para agregar un nuevo item
app.post('/api/Conductor', async (req, res) => {
    const { Nombre, Edad } = req.body;
    try {
      const result = await pool.query('INSERT INTO Conductor (Nombre, Edad) VALUES ($1, $2) RETURNING *', [Nombre, Edad]);
      res.status(201).json(result.rows[0]);
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: 'Error al agregar los datos' });
    }
  });

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
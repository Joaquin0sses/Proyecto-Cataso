const express = require('express');
const { Pool } = require('pg');

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
app.use(express.json());

// Define una ruta para obtener los datos
app.get('/api/Conductor', async (req, res) => {
  try {
    const result = await pool.query('SELECT * FROM Conductor');
    res.json(result.rows);
  }
  catch (err) {
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
  } 
  catch (err) {
    console.error(err);
    res.status(500).json({ error: 'Error al agregar los datos' });
  }
});

// Ruta para eliminar un item
app.delete('/api/Conductor/:Conductor_id', async (req, res) => {
    const { conductor_id } = req.params;
    try {
      const result = await pool.query('DELETE FROM Conductor WHERE conductor_id = $1 RETURNING *', [conductor_id]);
      if (result.rows.length > 0) {
        res.status(200).json(result.rows[0]);
      } else {
        res.status(404).json({ error: 'Conductor no encontrado' });
      }
    } 
    catch (err) {
      console.error(err);
      res.status(500).json({ error: 'Error al eliminar el Conductor' });
    }
  });

// Ruta para obtener un item por ID
app.get('/api/Conductor/:id_conductor', async (req, res) => {
    const { id_conductor } = req.params;
    try {
      const result = await pool.query('SELECT * FROM Conductor WHERE id_conductor = $1', [id_conductor]);
      if (result.rows.length > 0) {
        res.status(200).json(result.rows[0]);
      } else {
        res.status(404).json({ error: 'Item no encontrado' });
      }
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: 'Error al obtener el item' });
    }
  });

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
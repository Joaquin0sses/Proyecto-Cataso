const { Pool } = require('pg');

// Configura el pool de conexiones
const pool = new Pool({
  user: 'postgres',
  host: '34.46.16.72',
  database: 'Database',
  password: 'cataso123',
  port: 5432,  // Puerto por defecto de PostgreSQL
});

// Prueba la conexión
pool.query('SELECT NOW()', (err, res) => {
  if (err) {
    console.error('Error al conectar a la base de datos', err);
  } else {
    console.log('Conexión exitosa:', res.rows[0]);
  }
  pool.end();  // Cierra la conexión
});
const express = require('express');
const bodyParser = require('body-parser');
const { Pool } = require('pg');

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());

// PostgreSQL connection
const pool = new Pool({
    user: 'postgres',
    host: '34.67.116.97',
    database: '34.67.116.97',
    password: 'cataso123',
    port: 5432,
    ssl: {
        rejectUnauthorized: false,
    },
});




// API endpoint to handle form submission
app.post('/submit', (req, res) => {
    const { name, email } = req.body;

    pool.query('INSERT INTO finanzas (gastos) VALUES ($1) RETURNING *', [name], (error, results) => {
        if (error) {
            res.status(500).send('Error saving to database');
        } else {
            res.status(200).json(results.rows[0]);
        }
    });
});

app.listen(port, () => {
    console.log(`Server running at http://34.67.116.97:${port}/`);
});

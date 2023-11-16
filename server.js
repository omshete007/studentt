const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.json());

// Database connection parameters
const dbConfig = {
  host: 'localhost',
  user: 'your_username',
  password: 'your_password',
  database: 'print_system'
};

const connection = mysql.createConnection(dbConfig);

connection.connect((err) => {
  if (err) {
    console.error('Database connection error: ' + err.message);
    return;
  }
  console.log('Connected to the database');
});

app.post('/api/register', (req, res) => {
  const { name, email, password, userType } = req.body;

  // Perform the database insert here
  const sql = 'INSERT INTO users (name, email, password, userType) VALUES (?, ?, ?, ?)';
  connection.query(sql, [name, email, password, userType], (error, results, fields) => {
    if (error) {
      console.error('Database insertion error: ' + error.message);
      res.json({ message: 'Registration failed' });
    } else {
      res.json({ message: 'Registration successful' });
    }
  });
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});

const express = require('express');
const mongoose = require('mongoose');

const app = express();
const port = process.env.PORT || 3000;

// Connect to MongoDB (replace with your MongoDB connection string)
mongoose.connect('mongodb://localhost/yourdb', { useNewUrlParser: true, useUnifiedTopology: true })
    .then(() => {
        console.log('Connected to MongoDB');
    })
    .catch((err) => {
        console.error('Error connecting to MongoDB: ' + err);
    });

// Body parser middleware (for handling form data)
app.use(express.urlencoded({ extended: false }));

// Define a User model
const User = mongoose.model('User', {
    username: String,
    password: String,
    // Add more fields for user registration as needed
});

// Register route
app.post('/register', (req, res) => {
    const { username, password } = req.body;

    // Create a new user in the database
    const user = new User({ username, password });

    user.save()
        .then(() => {
            res.send('Registration successful!');
        })
        .catch((err) => {
            res.status(400).send('Registration failed: ' + err);
        });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});

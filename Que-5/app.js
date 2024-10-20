const express = require('express');
const bodyParser = require('body-parser');  // Import body-parser
const app = express();

// Middleware to parse JSON data
app.use(bodyParser.json());

app.get('/api/students', (req, res) => {
    res.json([
        { id: 1, name: 'Drami', age: 21 },
        { id: 2, name: 'ketan', age: 22 }
    ]);
});

// POST route for adding a new student
app.post('/api/students', (req, res) => {
    const newStudent = req.body; // Get the student data from the request body

    // Here you could add the new student to a database or perform any other action
    console.log('New student received:', newStudent);

    // Respond back to the client
    res.status(201).json({ message: 'Student added successfully', student: newStudent });
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});

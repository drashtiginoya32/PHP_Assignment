const express = require('express');
const axios = require('axios');  // Import axios for making HTTP requests
const app = express();

app.use(express.json());  // To parse incoming JSON data

app.get('/students', async (req, res) => {
    try {
        // Call the PHP REST API
        const response = await axios.get('http://localhost/php-api/students.php');

        // Get the data from the response
        const students = response.data;

        // Send the data as a response from the Express API
        res.json(students);
    } catch (error) {
        console.error('Error calling PHP API:', error);
        res.status(500).json({ error: 'Unable to fetch data from PHP API' });
    }
});


app.post('/add-student', async (req, res) => {
    try {
        // Data to send to the PHP API
        const studentData = {
            name: 'Mark Johnson',
            age: 23
        };

        // Call the PHP REST API using POST request
        const response = await axios.post('http://localhost/php-api/students.php', studentData);

        // Get the response data
        const responseData = response.data;

        // Send the response back to the client
        res.json(responseData);
    } catch (error) {
        console.error('Error calling PHP API:', error);
        res.status(500).json({ error: 'Unable to send data to PHP API' });
    }
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});

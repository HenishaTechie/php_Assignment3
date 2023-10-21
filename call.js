// const express = require('express');
// const axios = require('axios');

// const app = express();
// const port = 3000;

// app.get('/', async (req, res) => {
//   try {
//     // Replace 'http://localhost/api.php' with the actual URL where your PHP API is hosted
//     const apiUrl = 'http://localhost/clg/Q6.php';

//     // Make a GET request to the PHP API
//     const response = await axios.get(apiUrl);

//     // Send the data received from the PHP API as the response from your Express server
//     res.send(response.data);
//   } catch (error) {
//     // Handle errors
//     console.error('Error calling PHP API:', error.message);
//     res.status(500).send('Internal Server Error');
//   }
// });

// app.listen(port, () => {
//   console.log(`Express server is running on http://localhost:${port}`);
// });


const express = require('express');
const axios = require('axios');
const app = express();
const port = 3000;

app.get('/', async (req, res) => {
  try {
    // Replace 'http://localhost/api.php' with the actual URL where your PHP API is hosted
    const apiUrl = 'http://localhost/clg/Q6.php';

    // Make a GET request to the PHP API
    const response = await axios.get(apiUrl);

    // Create an HTML table from the fetched data
    const tableHtml = `<table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${response.data.map(user => `
                                <tr>
                                    <td>${user.id}</td>
                                    <td>${user.name}</td>
                                    <td>${user.email}</td>
                                </tr>`).join('')}
                        </tbody>
                    </table>`;

    // Send the HTML table as the response from your Express server
    res.send(tableHtml);
  } catch (error) {
    // Handle errors
    console.error('Error calling PHP API:', error.message);
    res.status(500).send('Internal Server Error');
  }
});

app.listen(port, () => {
  console.log(`Express server is running on http://localhost:${port}`);
});

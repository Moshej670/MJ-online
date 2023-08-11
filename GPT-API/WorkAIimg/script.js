document.addEventListener('DOMContentLoaded', () => {
    const inputBox = document.getElementById('inputBox');
    const submitButton = document.getElementById('submitButton');
    const outputBox = document.getElementById('outputBox');

    submitButton.addEventListener('click', async () => {
        const url = 'https://open-ai21.p.rapidapi.com/texttoimage2';
        const apiKey = '6b4651d2f2mshae10e9b5260368ep1e6a69jsn377a6b2711c4';

        const options = {
            method: 'POST',
            headers: {
                'content-type': 'application/x-www-form-urlencoded',
                'X-RapidAPI-Key': apiKey,
                'X-RapidAPI-Host': 'open-ai21.p.rapidapi.com'
            },
            body: new URLSearchParams({ text: inputBox.value })
        };

        try {
            outputBox.innerHTML = 'Loading...';

            const response = await fetch(url, options);
            const result = await response.json();

            if (result.status === 'processing') {
                const startTime = Date.now();
                const checkStatus = async () => {
                    try {
                        const response = await fetch(result.url);
                        const statusResult = await response.json();

                        if (statusResult.servercode === 10) {
                            const currentTime = Date.now();
                            const timeElapsed = (currentTime - startTime) / 1000;
                            outputBox.innerHTML = `Processing... Time Elapsed: ${timeElapsed.toFixed(2)} seconds`;
                            setTimeout(checkStatus, 1000); // Check status again after 1 second
                        } else {
                            const image = document.createElement('img');
                            image.src = result.url;
                            image.classList.add('img-fluid'); // Add Bootstrap's img-fluid class for responsive images
                            outputBox.innerHTML = ''; // Clear loading message
                            outputBox.appendChild(image); // Display the image
                        }
                    } catch (error) {
                        console.error(error);
                        outputBox.textContent = 'An error occurred.';
                    }
                };

                checkStatus();
            }
        } catch (error) {
            console.error(error);
            outputBox.textContent = 'An error occurred.';
        }
    });
});

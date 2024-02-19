document.addEventListener('DOMContentLoaded', () => {
    const inputBox = document.getElementById('inputBox');
    const submitButton = document.getElementById('submitButton');
    const outputBox = document.getElementById('outputBox');

    submitButton.addEventListener('click', async () => {
        const url = 'https://chatgpt-42.p.rapidapi.com/conversationgpt4';
        const apiKey = '6b4651d2f2mshae10e9b5260368ep1e6a69jsn377a6b2711c4'; 

        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-RapidAPI-Key': apiKey,
                'X-RapidAPI-Host': 'open-ai21.p.rapidapi.com'
            },
            body: JSON.stringify({
                messages: [
                    {
                        role: 'user',
                        content: inputBox.value
                    }
                ],
                web_access: true
            })
        };

        try {
            outputBox.innerHTML = 'Loading...'; // Display loading message
            const response = await fetch(url, options);
            const result = await response.json(); // Parse the JSON response

           const content = result?.MPT;
           outputBox.textContent = content || 'Content not found';
        } catch (error) {
            console.error(error);
            outputBox.textContent = 'An error occurred.';
        }
    });
});

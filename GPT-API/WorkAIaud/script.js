document.addEventListener('DOMContentLoaded', async () => {
    const inputBox = document.getElementById('inputBox');
    const submitButton = document.getElementById('submitButton');
    const outputBox = document.getElementById('outputBox');

    submitButton.addEventListener('click', async () => {
        const url = 'https://open-ai21.p.rapidapi.com/texttospeech';
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
            const result = await response.text();

            if (result) {
                const audio = new Audio(result);
                audio.play();
                outputBox.innerHTML = 'Audio is playing...';
            }
        } catch (error) {
            console.error(error);
            outputBox.textContent = 'An error occurred.';
        }
    });
});

const inputBox = document.querySelector(".input-box");
const resultsBox = document.querySelector(".result-box");

inputBox.addEventListener("input", function () {
    let input = inputBox.value.trim();

    if (input.length) {
        searchAudio(input);
    } else {
        resultsBox.innerHTML = ''; // Clear results if input is empty
    }
});

async function searchAudio(keyword) {
    try {
        const response = await fetch('audioTitles.json');
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.statusText}`);
        }
        const data = await response.json();
        const result = data.filter(audio => audio.audioTitle.toLowerCase().includes(keyword.toLowerCase()));
        display(result);
    } catch (error) {
        console.error('Error during fetch operation:', error);
    }
}

function display(result) {
    const content = result.map(audio => {
        return `<li onclick="selectInput(${audio.ID})">${audio.audioTitle}</li>`;
    });
    resultsBox.innerHTML = `<ul>${content.join('')}</ul>`;
}

function selectInput(selectedAudioId) {
    window.location.href = `../controllers/controller-audiolist.php?audioID=${selectedAudioId}`;
}

document.getElementById('filterForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const minPopulation = formData.get('minPopulation');
    const maxPopulation = formData.get('maxPopulation');

    try {
        const response = await fetch(`http://localhost:3000/cities?minPopulation=${minPopulation}&maxPopulation=${maxPopulation}`);
        const cities = await response.json();
        const cityList = document.getElementById('cityList').querySelector('ul');

        cityList.innerHTML = '';

        cities.forEach(city => {
            const listItem = document.createElement('li');
            listItem.textContent = `${city.name}: ${city.population}`;
            cityList.appendChild(listItem);
        });
    } catch (error) {
        console.error('Error fetching cities:', error);
    }
});

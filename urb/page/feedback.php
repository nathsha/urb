// Fetch resources from the PHP backend
fetch('http://localhost/resources.php')
  .then(response => response.json())
  .then(data => {
    // Manipulate data as needed (e.g., render a list of resources)
    renderResources(data);
  })
  .catch(error => console.error('Error fetching resources:', error));

function renderResources(resources) {
  const resourcesList = document.getElementById('resources-list');

  // Clear any existing content
  resourcesList.innerHTML = '';

  // Create a new article element for each resource and append it to the resources list
  resources.forEach(resource => {
    const article = document.createElement('article');
    article.innerHTML = `
      <h2>${resource.title}</h2>
      <p>${resource.description}</p>
      <p>For more information, visit <a href="${resource.link}">${resource.link}</a>.</p>
    `;
    resourcesList.appendChild(article);
  });
}

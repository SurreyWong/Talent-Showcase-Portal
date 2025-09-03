function createCard(talent) {
  return `
    <div class="card">
      <img src="${talent.profile_pic}" alt="profile"/>
      <h3>${talent.name}</h3>
      <p>${talent.education}</p>
      <p>${talent.bio}</p>
      <p>${talent.phone}</p>
      <a href="../php/media.php" target="_blank">See Info</a>
    </div>
  `;
}


function renderCards(data) {
  const grid = document.getElementById('talentGrid');
  grid.innerHTML = data.map(createCard).join('');
}

let allTalents = [];

function applyFilters() {
  const query = document.getElementById('searchInput').value.toLowerCase();
  const genre = document.getElementById('genreSelect').value;

  const filtered = allTalents.filter(talent => {
    const matchesName = talent.name.toLowerCase().includes(query);
    const matchesGenre = genre === '' || talent.bio.toLowerCase().includes(genre.toLowerCase());
    return matchesName && matchesGenre;
  });

  renderCards(filtered);
}

// Fetch talents from PHP
fetch('talent.php?api=getTalents')
  .then(response => response.json())
  .then(talents => {
    allTalents = talents;
    renderCards(allTalents);

    document.getElementById('searchInput').addEventListener('input', applyFilters);
    document.getElementById('genreSelect').addEventListener('change', applyFilters);
  })
  .catch(error => {
    console.error('Error fetching talents:', error);
  });

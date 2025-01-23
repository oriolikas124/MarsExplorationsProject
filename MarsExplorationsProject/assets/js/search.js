document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('search-input');
  const autocompleteList = document.getElementById('autocomplete-list');

  const form = document.querySelector('.search-form');
  form.addEventListener('submit', (e) => e.preventDefault());

  searchInput.addEventListener('input', function() {
    const query = this.value.trim();

    if (query.length < 1) {
      autocompleteList.innerHTML = '';
      return;
    }

    // Отправляем AJAX-запрос на live_search.php
    fetch(`live_search.php?q=${encodeURIComponent(query)}`)
      .then(response => response.json())
      .then(data => {
        autocompleteList.innerHTML = '';

        // Если ничего не нашли
        if (!data || data.length === 0) {
          const noResultItem = document.createElement('div');
          noResultItem.classList.add('no-result');
          noResultItem.textContent = 'Ничего не найдено';
          autocompleteList.appendChild(noResultItem);
          return;
        }

        // Генерируем подсказки xddd
        data.forEach(item => {
          const itemDiv = document.createElement('div');
          itemDiv.classList.add('autocomplete-item');
          // Выводим название миссии
          itemDiv.textContent = item.name; 

          // При клике переходим на страницу 
          itemDiv.addEventListener('click', () => {
            window.location.href = item.url; 
          });
          
          autocompleteList.appendChild(itemDiv);
        });
      })
      .catch(err => {
        console.error('Ошибка при поиске:', err);
      });
  });
});
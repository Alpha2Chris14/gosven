/*FILTER BUTTON*/
let filter = document.getElementById('filter-button');
filter.addEventListener('click', function() {
    let filterOption = document.getElementById('filter-options');

    if (filterOption.style.display === 'block') {
        filterOption.style.display = 'none';
    } else {
        filterOption.style.display = 'block';
    }
});

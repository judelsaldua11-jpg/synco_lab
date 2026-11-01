document.addEventListener('DOMContentLoaded', () => {
    const picker = document.getElementById('category-picker');
    if (!picker) return; // Exit if not on the Add/Edit product page

    const search = document.getElementById('cat-search');
    const selected = document.getElementById('cat-selected');
    const newValuesContainer = document.getElementById('cat-new-values');
    const options = [...picker.querySelectorAll('.cat-picker-option')];
    const newInput = document.getElementById('cat-new-input');
    const addBtn = document.getElementById('cat-add-btn');

    function refresh() {
        // 1. Filter existing categories based on search
        const query = search.value.trim().toLowerCase();
        options.forEach(option => {
            option.style.display = option.dataset.categoryName.includes(query) ? 'flex' : 'none';
        });

        // 2. Render selected chips
        selected.innerHTML = '';
        
        // Existing categories checked
        picker.querySelectorAll('input[name="categories[]"]:checked').forEach(input => {
            const label = input.closest('.cat-picker-option').querySelector('span').textContent;
            createChip(label, () => { input.checked = false; refresh(); });
        });

        // New categories added dynamically
        newValuesContainer.querySelectorAll('.category-new-value').forEach(input => {
            createChip(input.value, () => { input.remove(); refresh(); });
        });
    }

    function createChip(label, onRemove) {
        const chip = document.createElement('span');
        chip.className = 'cat-chip'; // Use CSS class instead of inline styles
        chip.textContent = label;

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'cat-chip-remove'; // Use CSS class
        removeBtn.textContent = 'x';
        removeBtn.setAttribute('aria-label', 'Remove ' + label);
        removeBtn.addEventListener('click', onRemove);

        chip.appendChild(removeBtn);
        selected.appendChild(chip);
    }

    // Event Listeners
    search.addEventListener('input', refresh);
    picker.querySelectorAll('input[name="categories[]"]').forEach(input => input.addEventListener('change', refresh));

    addBtn.addEventListener('click', () => {
        const value = newInput.value.trim();
        if (!value) return;

        const match = options.find(option => option.dataset.categoryName === value.toLowerCase());
        if (match) {
            match.querySelector('input').checked = true;
        } else {
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'new_categories[]';
            hidden.value = value;
            hidden.className = 'category-new-value';
            newValuesContainer.appendChild(hidden);
        }
        newInput.value = '';
        refresh();
    });

    newInput.addEventListener('keydown', event => {
        if (event.key === 'Enter') {
            event.preventDefault();
            addBtn.click();
        }
    });

    refresh();
});
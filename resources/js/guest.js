window.addMealField = function () 
{
    const mealContainer = document.getElementById('meal_menu');
    if (!mealContainer) return;

    const container = document.createElement('div');
    container.classList.add('d-flex', 'align-items-center', 'my-2', 'gap-2');

    // input field
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'meal_menu[]';
    input.classList.add('form-control', 'my-2');
    input.placeholder = "Ayam geprek, Nasi Goreng, etc.";

    // remove button
    const removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.classList.add('btn', 'btn-danger', 'btn-sm');
    removeBtn.textContent = 'Remove';
    removeBtn.onclick = function () {
        container.remove();
    }

    container.appendChild(input);
    container.appendChild(removeBtn);

    mealContainer.appendChild(container);
}
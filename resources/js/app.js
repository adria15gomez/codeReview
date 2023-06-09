import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const images = document.querySelectorAll('.rating img');
    
img.addEventListener('click', () => {
images.forEach(otherImg => otherImg.style.opacity = 0.3);
img.style.opacity = 1;
const input = img.parentElement.previousElementSibling;
input.checked = true;
});

img.addEventListener('mouseover', () => {
  const tooltip = img.nextElementSibling;
  tooltip.classList.add('show');
});

img.addEventListener('mouseout', () => {
  const tooltip = img.nextElementSibling;
  tooltip.classList.remove('show');
});

img.addEventListener('mouseover', () => {
    const tooltip = img.nextElementSibling;
    tooltip.classList.add('show');
});

img.addEventListener('mouseout', () => {
    const tooltip = img.nextElementSibling;
    tooltip.classList.remove('show');
});

const selectElement = document.getElementById('topics');
const newTopicInput = document.getElementById('new-topic-input');

selectElement.addEventListener('change', () => {
    const selectedValue = selectElement.value;
    if (selectedValue === '') {
        newTopicInput.style.display = 'block';
    } else {
        newTopicInput.style.display = 'none';
    }
});
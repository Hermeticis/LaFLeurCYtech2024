document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with class 'stock'
    let elements = document.getElementsByClassName('stock');
    // Add class 'cache' to each element
    for (let element of elements) {
        element.classList.add('cache');
    }
    // Get all elements with class 'modal'
    elements = document.getElementsByClassName('modal');
    // Add class 'cache' to each element
    for (let element of elements){
        element.classList.add('cache');
    }
}); 

// Toggle 'cache' class for stock elements
function affichage_stock() {
    // Get all elements with class 'stock'
    let elements = document.getElementsByClassName('stock');
    // Toggle 'cache' class for each element
    for (let element of elements) {
        element.classList.toggle('cache');
    }
}

// Increase stock counter by 1
function ajouter(plante, stock){
    // Get the current value of the counter input
    let value = document.getElementById(`compteur-${plante}`).value;
    value++;
    // Check if the value exceeds the stock limit
    if(value > stock){
        value = stock;
    }
    // Set the new value of the counter input
    document.getElementById(`compteur-${plante}`).value = value;
}

// Decrease stock counter by 1
function enlever(plante){
    // Get the current value of the counter input
    let value = document.getElementById(`compteur-${plante}`).value;
    value--;
    // Check if the value goes below 0
    if(value < 0){
        value++;
    }
    // Set the new value of the counter input
    document.getElementById(`compteur-${plante}`).value = value;
}

// Zoom in on the image
function zoom(image){
    // Get all elements with class 'modal'
    let elements = document.getElementsByClassName('modal');
    // Create an image element
    let Image = document.createElement("img");
    // Set image source
    Image.src= image;
    // Add 'modal-content' class to the image
    Image.classList.add('modal-content');
    // Remove 'cache' class from each modal element and append the image
    for (let element of elements){
        element.classList.remove('cache');
        element.appendChild(Image);
    }
}

// Close the zoomed image
function close_img(){
    // Get all elements with class 'modal'
    let elements = document.getElementsByClassName('modal');
    // Remove the last child element (image) from each modal and add 'cache' class
    for  (let element of elements) {
        element.removeChild(element.lastElementChild);
        element.classList.add('cache');
    }
}

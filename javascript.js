document.addEventListener('DOMContentLoaded', () => {
    let count = 0;
    const cartCountElement = document.getElementById('cart-count');
    const buttons = document.querySelectorAll('.add-to-cart');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            count++;
            cartCountElement.textContent = count;
        });
    });
});
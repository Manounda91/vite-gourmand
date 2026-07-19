document.addEventListener('DOMContentLoaded', function() {
    const cartCountElement = document.getElementById('cart-count');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartLink = cartCountElement ? cartCountElement.closest('a') : null;
    
    let totalItems = 0;

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            totalItems++;
            cartCountElement.textContent = totalItems;

            button.textContent = 'Ajouté !';
            button.classList.remove('btn-dark');
            button.classList.add('btn-success');

            setTimeout(() => {
                button.textContent = 'Ajouter';
                button.classList.remove('btn-success');
                button.classList.add('btn-dark');
            }, 1000);
        });
    });

    if (cartLink) {
        cartLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (totalItems > 0) {
                totalItems = 0;
                cartCountElement.textContent = totalItems;
            }
        });
    }
});
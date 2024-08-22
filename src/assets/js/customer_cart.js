$(document).ready(function() {
    let cart = [
        {name: "Product 1", price: 10.00, quantity: 2},
        {name: "Product 2", price: 20.00, quantity: 1},
        {name: "Product 3", price: 30.00, quantity: 3}
    ];


    function renderCart() {
        let $cartTableBody = $('#cart-items tbody'); 
        $cartTableBody.empty(); 
        let total = 0;

        
        cart.forEach((item, index) => {
            let itemTotal = item.price * item.quantity;
            total += itemTotal;
            $cartTableBody.append(`
                <tr>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>
                        <input type="number" class="quantity" data-index="${index}" value="${item.quantity}" min="1">
                    </td>
                    <td>$${itemTotal.toFixed(2)}</td>
                    <td><button class="remove-item" data-index="${index}">Remove</button></td>
                </tr>
            `); 
        });

        $('#total-price').text(`Total: $${total.toFixed(2)}`);
        $('.quantity').off('change').on('change', updateQuantity);
        $('.remove-item').off('click').on('click', removeItem);
    }

    
    function updateQuantity() {
        let index = $(this).data('index');
        let newQuantity = parseInt($(this).val());
        if (newQuantity > 0) { 
            cart[index].quantity = newQuantity;
            renderCart();
        }
    }

    
    function removeItem() {
        let index = $(this).data('index');
        cart.splice(index, 1);
        renderCart();
    }

    renderCart();
});




























// document.addEventListener('DOMContentLoaded', function() {

//     let cart = [
//         {name: "Product 1", price: 10.00, quantity: 2},
//         {name: "Product 2", price: 20.00, quantity: 1},
//         {name: "Product 3", price: 30.00, quantity: 3}
//     ];

//     function renderCart() {
//         let cartTableBody = document.querySelector('#cart-items tbody');
//         cartTableBody.innerHTML = '';
//         let total = 0;

//         cart.forEach((item, index) => {
//             let itemTotal = item.price * item.quantity;
//             total += itemTotal;
//             cartTableBody.innerHTML += `
//                 <tr>
//                     <td>${item.name}</td>
//                     <td>$${item.price.toFixed(2)}</td>
//                     <td>
//                         <input type="number" class="quantity" data-index="${index}" value="${item.quantity}" min="1">
//                     </td>
//                     <td>$${itemTotal.toFixed(2)}</td>
//                     <td><button class="remove-item" data-index="${index}">Remove</button></td>
//                 </tr>
//             `;
//         });

//         document.getElementById('total-price').innerText = `Total: $${total.toFixed(2)}`;

//         document.querySelectorAll('.quantity').forEach(input => {
//             input.addEventListener('change', updateQuantity);
//         });

//         document.querySelectorAll('.remove-item').forEach(button => {
//             button.addEventListener('click', removeItem);
//         });
//     }

//     function updateQuantity(event) {
//         let index = event.target.getAttribute('data-index');
//         let newQuantity = parseInt(event.target.value);
//         if (newQuantity > 0) {
//             cart[index].quantity = newQuantity;
//             renderCart();
//         }
//     }

//     function removeItem(event) {
//         let index = event.target.getAttribute('data-index');
//         cart.splice(index, 1);
//         renderCart();
//     }

//     renderCart();
// });

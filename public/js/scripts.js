// function agregarCarrito(id) {
//     $.ajax({
//         url: 'carrito/agregar/' + id,
//         type: 'GET',
//         dataType: 'json',
//         success: function (data) {
//             console.log(data);
//             alert("Producto agregado al carrito");

//             // Actualiza el número de productos en el carrito
//             var numProductos = document.getElementById('#num-productos');
//             numProductos.text(parseInt(numProductos.text()) + 1);
//         }
//     });
// }
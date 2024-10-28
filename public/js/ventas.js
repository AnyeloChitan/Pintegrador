let detalleCount = 0;
let select = document.getElementById('producto-select');
let precioventa=document.getElementById('precio-venta');
let subtotal_agregar= document.getElementById('subtotal-agregar');
let productoId ;
let productoSeleccionado ;
let subtotalTotal =0;
/////////////////////////////////////////////////////
// Obtener el array de productos desde el atributo data-productos
const productos = JSON.parse(document.getElementById('productos-data').getAttribute('data-productos'));

const cantidadInput = document.getElementById('cantidad');
cantidadInput.disabled = true;  

function updateAgregar() {
    productoId = select.value;
    productoSeleccionado = productos.find(p => p.id == productoId);
    const cantidad = cantidadInput.value;
    
    const subtotal = (cantidad *productoSeleccionado.precio_venta).toFixed(2);
   
    precioventa.textContent =productoSeleccionado.precio_venta;    
    subtotal_agregar.textContent =subtotal;
    
}

function updateTotals() {   
    subtotalTotal =0;
    const detalles = document.querySelectorAll('#detalle-body tr:not(:first-child)');

     
    detalles.forEach(detalle => {
        const cantidad = detalle.querySelector('input[name^="detalles"][name$="[cantidad]"]').value;
         console.log (cantidad);
        const precioUnitario = detalle.querySelector('input[name^="detalles"][name$="[precio_venta]"]').value;
        const subtotal = cantidad * precioUnitario;
       
        detalle.querySelector('.venta-subtotal').textContent = subtotal.toFixed(2);
        console.log  ("subtotal" +subtotal);

       subtotalTotal += subtotal;
       console.log  ("totalsub" +subtotal)
    });

    const descuento = parseFloat(document.getElementById('descuento').value) ;
    const total = subtotalTotal - subtotalTotal*descuento/100;

    document.getElementById('subtotal').textContent = subtotalTotal.toFixed(2);
    document.getElementById('total').textContent = total.toFixed(2);
}
//actualizar descuento

document.getElementById('descuento').addEventListener('input', function() {
    
    console.log("Nuevo descuento:");
   
    updateTotals();
});

document.getElementById('detalle-body').addEventListener('input', function(event) {
   
    if (event.target.id.includes('cantidad')  || event.target.id.includes('producto-select')) {
        cantidadInput.disabled = false;  
        updateAgregar();
    }
});

document.getElementById('detalle-body').addEventListener('click', function(event) {
    if (event.target.classList.contains('eliminar-detalle')) {
        event.target.closest('tr').remove();
        updateTotals();
    }
});



document.getElementById('agregar-detalle').addEventListener('click', function() {
   // console.log(productos); // Verifica que el array de productos esté bien formado
     productoId = select.value;
    
    if (productoId) {
        productoSeleccionado = productos.find(p => p.id == productoId);     
        const cantidad = cantidadInput.value;
        const detalleBody = document.getElementById('detalle-body');
        const nuevoDetalle = document.createElement('tr');
        
        const subtotal = (cantidad *productoSeleccionado.precio_venta).toFixed(2);
    
        nuevoDetalle.className = "venta-detalle"; // Agregar clase para el estilo
      
           
        nuevoDetalle.innerHTML = `
            
         <td>${productoSeleccionado.nombre}
         <input type="hidden" name="detalles[${detalleCount}][producto_id]" class="venta-form-control" required min="1" value="${productoId }">
         </td>
        <td>
            <input type="hidden" name="detalles[${detalleCount}][cantidad]" class="venta-form-control" required min="1" value="${cantidad}">
            ${cantidad}
        </td>
        <td>
         <input type="hidden" name="detalles[${detalleCount}][precio_venta]" class="venta-form-control" required min="1" value=" ${productoSeleccionado.precio_venta}">
           ${productoSeleccionado.precio_venta}
        </td>
        <td class="venta-subtotal">${subtotal}</td>
        <td>
            <button type="button" class="venta-btn eliminar-detalle" style="background-color: #dc3545;">Eliminar</button>
        </td>
    `;

        detalleBody.appendChild(nuevoDetalle);
        detalleCount++;
        select.value = "";
        cantidadInput.disabled = true;  
        cantidadInput.value=1;
        precioventa.textContent =0.00;    
        subtotal_agregar.textContent =0.00;
        // Actualizar totales después de agregar un nuevo detalle
    updateTotals();
    } else {
        alert('Por favor selecciona un producto.');

    }
});
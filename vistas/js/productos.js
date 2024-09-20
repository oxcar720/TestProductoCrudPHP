let selectedRow = null;

const btnEditar = document.getElementById('btn-editar');
const btnBorrar = document.getElementById('btn-borrar');
const btnAgregar = document.getElementById('btn-agregar');
const tableBody = document.getElementById('product-table-body');

function toggleButtons(enabled) {
    btnEditar.disabled = !enabled;
    btnBorrar.disabled = !enabled;
}

btnEditar.addEventListener('click', function(event){
    seleccion = document.getElementsByClassName("selected")[0];
    if(seleccion){
        let dataId = seleccion.getAttribute("data-id");
        window.location.href = `/editar?id=${dataId}`;
    }
});

btnBorrar.addEventListener('click', function(event){
    seleccion = document.getElementsByClassName("selected")[0];
    if(seleccion){
        let dataId = seleccion.getAttribute("data-id");
        window.location.href = `/eliminar?id=${dataId}`;
    }
});

tableBody.addEventListener('click', function(event) {
    let target = event.target;
    
    while (target && target.tagName !== 'TR') {
        target = target.parentElement;
    }

    if (target && target.classList.contains('selectable')) {
        if (selectedRow) {
            selectedRow.classList.remove('selected');
        }

        selectedRow = target;
        selectedRow.classList.add('selected');

        
        toggleButtons(true);
    }
});

toggleButtons(false);

let totales_inventarios = document.getElementsByClassName("total_inventario");
console.log(totales_inventarios);
let elemento_mayor=null;
for (let element of totales_inventarios){
    if (elemento_mayor === null || parseFloat(elemento_mayor.innerText) < parseFloat(element.innerText)) {
        elemento_mayor = element;
    }
}
if(elemento_mayor!=null){
    elemento_mayor.classList.add("mayor");
    elemento_mayor.setAttribute("title", "Este elemento es el mayor");
}
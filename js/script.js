////////////////////////////////////////////////////BARRA LATERAL//////////////////////////////////////////////////////
var sidebar = document.getElementById("mySidebar");
var openNavButton = document.getElementById("openNav");
function toggleNav() {
    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
    } else {
        sidebar.style.width = "250px";
    }
}

openNavButton.addEventListener("click", function() {
    toggleNav();
});

document.addEventListener("click", function(event) {
    if (event.target !== sidebar && event.target !== openNavButton) {
        if (sidebar.style.width === "250px") {
            toggleNav();
        }
    }
});

function ajustarDiseño() {
    const windowWidth = window.innerWidth;

    if (windowWidth < 768) { 
     
        document.body.style.fontSize = "14px"; 
    } else if (windowWidth >= 768 && windowWidth < 1024) { 
        document.body.style.fontSize = "16px"; 
    } else { 
        document.body.style.fontSize = "18px"; 
    }

}

window.addEventListener('load', ajustarDiseño);
window.addEventListener('resize', ajustarDiseño);

ajustarDiseño();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        const enlaces = document.querySelectorAll(".enlaces-lista li a");
        let currentIndex = -1;

        document.addEventListener("keydown", (event) => {
            if (event.key === "ArrowUp") {
                event.preventDefault();
                currentIndex = currentIndex > 0 ? currentIndex - 1 : enlaces.length - 1;
                enlaces[currentIndex].focus();
            } else if (event.key === "ArrowDown") {
                event.preventDefault();
                currentIndex = currentIndex < enlaces.length - 1 ? currentIndex + 1 : 0;
                enlaces[currentIndex].focus();
            }
        });


/////////////////////////////////////////MODAL 1//////////////////////////////////////////////////////
function openModal() {
    const modalContainer = document.getElementById('modal_container');
    modalContainer.classList.add('show');
}

function closeModal() {
    const modalContainer = document.getElementById('modal_container');
    
    modalContainer.classList.remove('show');
  
}

const openButton = document.getElementById('openModal');
const closeButton = document.getElementById('close');

openButton.addEventListener('click', function(event) {
    event.preventDefault(); 
    openModal();
});

closeButton.addEventListener('click', closeModal);

document.addEventListener('DOMContentLoaded', function() {
    const open = document.getElementById('open');

    open.addEventListener('click', () => {
        openModal();
    });
});

////////////////////////////////////////MODAL 2//////////////////////////////////////////////////
function openModal2() {
    const modalContainer2 = document.getElementById('modal_container2');
    modalContainer2.classList.add('show');
}

function closeModal2() {
    const modalContainer2 = document.getElementById('modal_container2');
    modalContainer2.classList.remove('show'); 
}

const openButton2 = document.getElementById('openModal2');
const closeButton2 = document.getElementById('close2');

openButton2.addEventListener('click', function (event) {
    event.preventDefault(); 
    openModal2();
});

closeButton2.addEventListener('click', function (event) {
    event.preventDefault();
    closeModal2();
});

document.addEventListener('DOMContentLoaded', function () {
    const open2 = document.getElementById('openModal2');

    open2.addEventListener('click', () => {
        openModal2();
    });
});

////////////////////////////////////////MODAL 3//////////////////////////////////////////////////
function openModal3() {
    const modalContainer3 = document.getElementById('modal_container3');
    modalContainer3.classList.add('show');
}

function closeModal3() {
    const modalContainer3 = document.getElementById('modal_container3');
    modalContainer3.classList.remove('show'); 
}

const openButton3 = document.getElementById('openModal3');
const closeButton3 = document.getElementById('close3');

openButton3.addEventListener('click', function (event) {
    event.preventDefault(); 
    openModal3();
});

closeButton3.addEventListener('click', function (event) {
    event.preventDefault();
    closeModal3();
});

document.addEventListener('DOMContentLoaded', function () {
    const open3 = document.getElementById('openModal3');

    open3.addEventListener('click', () => {
        openModal3();
    });
});
////////////////////////////////////////MODAL 4//////////////////////////////////////////////////
function openModal4() {
    const modalContainer4 = document.getElementById('modal_container4');
    modalContainer4.classList.add('show');
}

function closeModal4() {
    const modalContainer4 = document.getElementById('modal_container4');
    modalContainer4.classList.remove('show'); 
}

const openButton4 = document.getElementById('openModal4');
const closeButton4 = document.getElementById('close4');

openButton4.addEventListener('click', function (event) {
    event.preventDefault(); 
    openModal4();
});

closeButton4.addEventListener('click', function (event) {
    event.preventDefault();
    closeModal4();
});

document.addEventListener('DOMContentLoaded', function () {
    const open4 = document.getElementById('openModal4');

    open4.addEventListener('click', () => {
        openModal4();
    });
});

////////////////////////////////////////MODAL 5//////////////////////////////////////////////////
function openModal5() {
    const modalContainer5 = document.getElementById('modal_container5');
    modalContainer5.classList.add('show');
}

function closeModal5() {
    const modalContainer5 = document.getElementById('modal_container5');
    modalContainer5.classList.remove('show'); 
}

const openButton5 = document.getElementById('openModal5');
const closeButton5 = document.getElementById('close5');

openButton5.addEventListener('click', function (event) {
    event.preventDefault(); 
    openModal5();
});

closeButton5.addEventListener('click', function (event) {
    event.preventDefault();
    closeModal5();
});

document.addEventListener('DOMContentLoaded', function () {
    const open5 = document.getElementById('openModal5');

    open5.addEventListener('click', () => {
        openModal5();
    });
});

////////////////////////////////////////MODAL 6 RECHAZO DE SOLICITUD//////////////////////////////////////////////////
function openModal6() {
    const modalContainer6 = document.getElementById('modal_container6');
    modalContainer6.classList.add('show');
}

function closeModal6() {
    const modalContainer6 = document.getElementById('modal_container6');
    modalContainer6.classList.remove('show'); 
}

const openButton6 = document.getElementById('openModal6');
const closeButton6 = document.getElementById('close6');

openButton6.addEventListener('click', function (event) {
    event.preventDefault(); 
    openModal6();
});

closeButton6.addEventListener('click', function (event) {
    event.preventDefault();
    closeModal6();
});

document.addEventListener('DOMContentLoaded', function () {
    const open6 = document.getElementById('openModal6');

    open6.addEventListener('click', () => {
        openModal6();
    });
});

/////////////////////////////////////////////// SUBIR ARCHIVOS /////////////////////////////////////////////
const fileInput = document.getElementById('file-input');
const filePreview = document.querySelector('.file-preview');
const fileName = document.querySelector('.file-name');
const uploadButton = document.querySelector('.upload-button');

fileInput.addEventListener('change', function() {
    const selectedFile = fileInput.files[0];

    if (selectedFile) {

        filePreview.style.display = 'flex';
        fileName.textContent = selectedFile.name;
        uploadButton.removeAttribute('disabled');
    } else {

        filePreview.style.display = 'none';
        fileName.textContent = 'Ningún archivo seleccionado';
        uploadButton.setAttribute('disabled', 'disabled');
    }
});

// // uploadButton.addEventListener('click', function() {

// //     alert('Archivo subido con éxito.');
// // });
//////////////////////////////////////// CUADROS DE NOMECLATURA /////////////////////////////////////////////// 
function showMessage(message) {
    const messageElement = document.getElementById('message');
    messageElement.textContent = message;
    
    const messageContainer = document.getElementById('message-container');
    messageContainer.style.display = 'block';
}

function hideMessage() {
    const messageContainer = document.getElementById('message-container');
    messageContainer.style.display = 'none';
}
////////////////////////////////////////ventas emergentes
 const openButtons = document.querySelectorAll('.open-button');
 const closeButtons = document.querySelectorAll('.close-button');
 
 openButtons.forEach(button => {
     button.addEventListener('click', () => {
         const target = button.getAttribute('data-target');
         const modal = document.getElementById(target);
         modal.style.display = 'block';
     });
 });
 
 closeButtons.forEach(button => {
     button.addEventListener('click', () => {
         const target = button.getAttribute('data-target');
         const modal = document.getElementById(target);
         modal.style.display = 'none';
     });
 });

///////////////////////////////////////////Busqueda de USUARIOS///////////////////////////////////////////////////
// const searchBoxUsuarios = document.getElementById('search-text');
// const searchFormUsuarios = document.getElementById('search-form');
// const userListUsuarios = document.getElementById('userList');
// const deleteUserButtonUsuarios = document.getElementById('deleteUserButton');
// let selectedUserUsuarios = null;

// deleteUserButtonUsuarios.style.width = '100%';


// const noMatchesItemUsuarios = document.createElement('div');
// noMatchesItemUsuarios.textContent = 'No se encuentran coincidencias';
// noMatchesItemUsuarios.style.display = 'none'; 
// noMatchesItemUsuarios.classList.add('no-matches'); 

// userListUsuarios.appendChild(noMatchesItemUsuarios);

// function selectUserUsuarios(userItem) {
//     const userItemsUsuarios = userListUsuarios.querySelectorAll('.userItem');
//     userItemsUsuarios.forEach(item => {
//         item.classList.remove('selectedUserUsuarios');
//     });
//     userItem.classList.add('selectedUserUsuarios');
// }

// function showNoMatchesMessageUsuarios() {
//     noMatchesItemUsuarios.style.display = 'block';
// }

// function hideNoMatchesMessageUsuarios() {
//     noMatchesItemUsuarios.style.display = 'none';
// }

// searchBoxUsuarios.addEventListener('input', () => {
//     const query = searchBoxUsuarios.value.toLowerCase();

//     const userItemsUsuarios = userListUsuarios.querySelectorAll('.userItem');
//     let hasMatchesUsuarios = false;

//     userItemsUsuarios.forEach(userItem => {
//         const userNameUsuarios = userItem.textContent.toLowerCase();
//         if (userNameUsuarios.includes(query)) {
//             userItem.style.display = 'block';
//             hasMatchesUsuarios = true;
//         } else {
//             userItem.style.display = 'none';
//         }
//     });

//     if (!hasMatchesUsuarios) {
//         showNoMatchesMessageUsuarios();
//     } else {
//         hideNoMatchesMessageUsuarios();
//     }

//     selectedUserUsuarios = null;
//     deleteUserButtonUsuarios.style.display = 'none';
// });

// userListUsuarios.addEventListener('click', (event) => {
//     const clickedUserUsuarios = event.target.closest('.userItem');
//     if (clickedUserUsuarios) {

//         selectUserUsuarios(clickedUserUsuarios);

//         deleteUserButtonUsuarios.style.display = 'block';

//         selectedUserUsuarios = clickedUserUsuarios.getAttribute('data-id');
//     }
// });

// deleteUserButtonUsuarios.addEventListener('click', () => {
//     if (selectedUserUsuarios) {
//         if (confirm(`¿Eliminar al usuario con ID "${selectedUserUsuarios}"?`)) {
//             const userItemsUsuarios = userListUsuarios.querySelectorAll('.userItem[data-id]');

//             let selectedUserElementUsuarios = null;

//             userItemsUsuarios.forEach(userItem => {
//                 const userId = userItem.getAttribute('data-id');
//                 if (userId === selectedUserUsuarios) {
//                     selectedUserElementUsuarios = userItem;
//                 }
//             });

//             if (selectedUserElementUsuarios) {
//                 selectedUserElementUsuarios.remove();

//                 fetch('../bd/eliminar_usuario.php', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json',
//                     },
//                     body: JSON.stringify({ id: selectedUserUsuarios }),
//                 })
               
//                 .then(data => {
//                     window.alert(data.message || 'Usuario eliminado exitosamente');
//                 })
//                 .catch(error => {
//                     window.alert(error.message || 'Error al eliminar el usuario');
//                 });
//                 selectedUserUsuarios = null;
//                 deleteUserButtonUsuarios.style.display = 'none';
//             }
//         }
//     }
// });

// searchFormUsuarios.addEventListener('submit', (event) => {
//     event.preventDefault();
// });


 ///////////////////////////////////////////Busqueda de LIBRERIAS///////////////////////////////////////////////////
// $(document).ready (function(){
// const searchBoxLibrerias = document.getElementById('search-text1');
// const searchFormLibrerias = document.getElementById('search-form1');
// const libreriaList1 = document.getElementById('libreriaList1');
// const deleteLibreriaButton1 = document.getElementById('deletelibreriaButton1');
// let selectedLibreria1 = null;

// deleteLibreriaButton1.style.width = '100%';

// const noMatchesItemLibrerias = document.createElement('div');
// noMatchesItemLibrerias.textContent = 'No se encuentran coincidencias';
// noMatchesItemLibrerias.style.display = 'none'; 
// noMatchesItemLibrerias.classList.add('no-matches'); 

// libreriaList1.appendChild(noMatchesItemLibrerias);
// // });


// function selectLibreria1(libreriaItem) {
//     const libreriaItems = libreriaList1.querySelectorAll('.libreriaItem');
//     libreriaItems.forEach(item => {
//         item.classList.remove('selectedLibreria');
//     });
//     libreriaItem.classList.add('selectedLibreria');
// }

// function showNoMatchesMessageLibrerias() {
//     noMatchesItemLibrerias.style.display = 'block';
// }

// function hideNoMatchesMessageLibrerias() {
//     noMatchesItemLibrerias.style.display = 'none';
// }
// searchBoxLibrerias.addEventListener('input', () => {
//     const query = searchBoxLibrerias.value.toLowerCase();
//     const libreriaItems = libreriaList1.querySelectorAll('.libreriaItem');
//     let hasMatches = false;

//     libreriaItems.forEach(libreriaItem => {
//         const libreriaName = libreriaItem.textContent.toLowerCase();
//         if (libreriaName.includes(query)) {
//             libreriaItem.style.display = 'block';
//             hasMatches = true;
//         } else {
//             libreriaItem.style.display = 'none';
//         }
//     });

//     if (!hasMatches) {
//         showNoMatchesMessageLibrerias();
//     } else {
//         hideNoMatchesMessageLibrerias();
//     }

//     selectedLibreria1 = null;
//     deleteLibreriaButton1.style.display = 'none';
// });

// libreriaList1.addEventListener('click', (event) => {
//     const clickedLibreria = event.target.closest('.libreriaItem');
//     if (clickedLibreria) {

//         selectLibreria1(clickedLibreria);

//         deleteLibreriaButton1.style.display = 'block';

//         // selectedLibreria1 = clickedLibreria.textContent.trim();
//         selectedLibreria1= clickedLibreria.getAttribute('data-id-l');
        
//     }
// });

// deleteLibreriaButton1.addEventListener('click', () => {
//     if (selectedLibreria1) {
//         if (confirm(`¿Eliminar la librería con ID "${selectedLibreria1}"?`)) {
//             const libreriaItems = document.querySelectorAll('.libreriaItem[data-id-l]');
//             let selectedLibreriaElement = null;

//             libreriaItems.forEach(libreriaItem => {
//                 const libreriaId = libreriaItem.getAttribute('data-id-l');
//                 if (libreriaId === selectedLibreria1) {
//                     selectedLibreriaElement = libreriaItem;
//                 }
//             });

//             if (selectedLibreriaElement) {
//                 selectedLibreriaElement.remove();

//                 fetch('../bd/eliminar_libreria.php', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json',
//                     },
//                     body: JSON.stringify({ id_libreria: selectedLibreria1 }),
//                 })
//                 .then(data => {
//                     window.alert(data.message || 'Librería eliminada exitosamente');
//                 })
//                 .catch(error => {
//                     window.alert(error.message || 'Error al eliminar la librería');
//                 });

//                 selectedLibreria1 = null;
//                 deleteLibreriaButton1.style.display = 'none';
//             }
//         }
//     }
// });

// searchFormLibrerias.addEventListener('submit', (event) => {
//     event.preventDefault();
// });


///////////////////////////////////////////////////CREAR LIBRERIA//////////////////////////////////////////////
const createLibraryButton = document.getElementById('createLibraryButton');

    createLibraryButton.addEventListener('click', (event) => {
        const confirmResult = confirm('¿Estás seguro de que deseas crear esta librería?');
        return confirmResult;
    });

// //////////////////////////////////////////////NOMECLATURAS///////////////////////////////////////////////////
function obtenerColorSegunFecha(fechaExpiracion) {
    const fechaActual = new Date();

    if (fechaActual > fechaExpiracion) {
        return '#ff0000'; 
    } else if (fechaActual < fechaExpiracion) {
        return '#00ff00'; 
    } else {
        return '#ffff00'; 
    }
}


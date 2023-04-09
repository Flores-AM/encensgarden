let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

let venta = {
  id: "",
  nombre: "",
  celular: "",
  direccion: "",
  entre: "",
  codigo: "",
  carrito: [],
};

let { carrito } = venta;

document.addEventListener("DOMContentLoaded", function () {
  iniciarApp();

  if (localStorage.getItem("carro")) {
    carro = JSON.parse(localStorage.getItem("carro"));
    actualizarCarro();
  }
  if (localStorage.getItem("venta")) {
    venta = JSON.parse(localStorage.getItem("venta"));
  }
});

function iniciarApp() {
  mostrarSeccion();
  tabs(); // Cambia la secicon cuando se presionen los tabs
  botonesPaginador(); // Agrega o saca los botones del paginador
  paginaSiguiente();
  paginaAnterior();

  consultarApi(); // Consulta la api en el backend de php

  idUser();
  datosCliente();

  mostrarResumen(); // Muestra el resumen de la cita
  // mostrarCarrito(); // Muestra el carrito
}

function mostrarSeccion() {
  const seccionAnterior = document.querySelector(".mostrar");
  if (seccionAnterior) {
    seccionAnterior.classList.remove("mostrar");
  }

  // Seleccionar la seccion con el paso
  const pasoSelector = `#paso-${paso}`;
  const seccion = document.querySelector(pasoSelector);
  seccion.classList.add("mostrar");

  // Quita la clase de actual al tab anterior
  const tabAnterior = document.querySelector(".actual");
  if (tabAnterior) {
    tabAnterior.classList.remove("actual");
  }

  // Resalta el tab actual
  const tab = document.querySelector(`[data-paso="${paso}"]`);
  tab.classList.add("actual");
}

function tabs() {
  const botones = document.querySelectorAll(".img-btn");

  botones.forEach((boton) => {
    boton.addEventListener("click", function (e) {
      paso = parseInt(e.target.dataset.paso);

      mostrarSeccion();

      botonesPaginador();
    });
  });
}

function botonesPaginador() {
  const paginaAnterior = document.querySelector("#anterior");
  const paginaSiguiente = document.querySelector("#siguiente");

  if (paso === 1) {
    paginaAnterior.classList.add("ocultar");
    paginaSiguiente.classList.remove("ocultar");
    // mostrarCarrito();
  } else if (paso === 3) {
    paginaAnterior.classList.remove("ocultar");
    paginaSiguiente.classList.add("ocultar");

    mostrarResumen();
  } else {
    paginaAnterior.classList.remove("ocultar");
    paginaSiguiente.classList.remove("ocultar");
  }

  mostrarSeccion();
}

function paginaAnterior() {
  const paginaAnterior = document.querySelector("#anterior");
  paginaAnterior.addEventListener("click", () => {
    if (paso <= pasoInicial) return;
    paso--;
    botonesPaginador();
  });
}

function paginaSiguiente() {
  const paginaSiguiente = document.querySelector("#siguiente");
  paginaSiguiente.addEventListener("click", () => {
    if (paso >= pasoFinal) return;
    paso++;
    botonesPaginador();
  });
}

async function consultarApi() {
  try {
    const url = "http://localhost:3000/api/carrito";
    const resultado = await fetch(url);
    const sahumerios = await resultado.json();
    mostrarSahumerios(sahumerios);
  } catch (error) {
    console.log(error);
  }
}

function mostrarSahumerios(sahumerios) {
  sahumerios.forEach((sahumerio) => {
    const { id, nombre, marca, imagen, precio, descripcion } = sahumerio;

    const imagenSahumerio = document.createElement("IMG");
    imagenSahumerio.classList.add("img-anuncio");
    imagenSahumerio.src = `/img/${imagen}`;

    const imagenDiv = document.createElement("DIV");
    imagenDiv.classList.add("caja-imagen");
    imagenDiv.appendChild(imagenSahumerio);
    imagenDiv.addEventListener("click", () => {
      Swal.fire({
        title: `${nombre}`,
        text: `${descripcion}`,
        imageUrl: `/img/${imagen}`,
        width: 400,
        imageHeight: 350,
        imageAlt: `${nombre}`,
      });
    });

    const nombreSahumerio = document.createElement("H3");
    nombreSahumerio.textContent = nombre;

    const marcaSahumerio = document.createElement("P");
    marcaSahumerio.textContent = marca;

    const precioSahumerio = document.createElement("P");
    precioSahumerio.classList.add("precio");
    precioSahumerio.textContent = `$${precio}`;

    const botonSahumerio = document.createElement("BUTTON");
    botonSahumerio.classList.add("agregar");
    botonSahumerio.textContent = "";
    botonSahumerio.dataset.idSahumerio = id;
    botonSahumerio.onclick = function () {
      seleccionarProducto(sahumerio);
      agregarAlCarro(sahumerio.id);
    };

    const cajaBoton = document.createElement("DIV");
    cajaBoton.classList.add("precio-agregar");
    cajaBoton.appendChild(precioSahumerio);
    cajaBoton.appendChild(botonSahumerio);

    const productoDiv = document.createElement("DIV");
    productoDiv.classList.add("producto");

    productoDiv.appendChild(imagenDiv);
    productoDiv.appendChild(nombreSahumerio);
    productoDiv.appendChild(marcaSahumerio);
    productoDiv.appendChild(cajaBoton);

    document.querySelector(".caja-productos").appendChild(productoDiv);
  });
}

let carro = [];
const contenedorCarro = document.querySelector(".lista-carro");
const contadorCarro = document.querySelector("#contador");
const precioTotal = document.querySelector("#total");

const agregarAlCarro = (prodId) => {
  const existe = carro.some((sahumerio) => sahumerio.id === prodId);
  const { carrito } = venta;

  if (existe) {
    const sahumerio = carro.map((sahumerio) => {
      if (sahumerio.id === prodId) {
        if (sahumerio.cantidad < sahumerio.stock) {
          sahumerio.cantidad++;
        } else {
          sahumerio.cantidad = sahumerio.stock;
        }
      }
    });
  } else {
    const prod = carrito.find((sahumerio) => sahumerio.id === prodId);
    carro.push(prod);
    console.log(carro);
  }
  actualizarCarro();
};

const eliminarDelCarro = (id) => {
  const item = carro.find((sahumerio) => sahumerio.id === id);
  console.log(item);
  const indice = carro.indexOf(item);
  const { carrito } = venta;
  const itemCarrito = carrito.find((sahumerio) => sahumerio.id === id);
  const indiceCarrito = carrito.indexOf(itemCarrito);
  carro.splice(indice, 1);
  carrito.splice(indiceCarrito, 1);
  localStorage.removeItem("item");
  localStorage.removeItem("carrito");
  if (carro.length === 0) {
    localStorage.removeItem("carro");
    localStorage.removeItem("venta");
  }
  actualizarCarro();
};

const actualizarCarro = () => {
  contenedorCarro.innerHTML = "";

  let { carrito } = venta;

  carro.forEach((carrito) => {
    const div = document.createElement("div");
    div.className = "producto-carro";
    div.innerHTML = `
    <img src="/img/${carrito.imagen}">
    <div>
      <p>${carrito.nombre}</p>
      <p>${carrito.marca}</p>
      <p>$${carrito.precio}</p>
      
      <p>Cantidad: ${carrito.cantidad}</p>
    </div>
    <button class="eliminar"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
    <line x1="4" y1="7" x2="20" y2="7" />
    <line x1="10" y1="11" x2="10" y2="17" />
    <line x1="14" y1="11" x2="14" y2="17" />
    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
    </svg></button>
    `;

    contenedorCarro.appendChild(div);

    localStorage.setItem("carro", JSON.stringify(carro));
  });

  contadorCarro.innerText = carro.length;
  precioTotal.innerText = carro.reduce(
    (acc, carrito) => acc + carrito.precio * carrito.cantidad,
    0
  );

  const eliminarprod = document.querySelectorAll(".eliminar");
  eliminarprod.forEach((borrar) => {
    borrar.addEventListener("click", () => {
      eliminarDelCarro();
    });
  });
};

function seleccionarProducto(sahumerio) {
  const { id } = sahumerio;
  const { carrito } = venta;

  if (carrito.some((agregado) => agregado.id === id)) {
    sahumerio.length++;
  } else {
    venta.carrito = [...carrito, sahumerio];
  }
  console.log(venta);
}

function idUser() {
  venta.id = document.querySelector("#idUser").value;
}

function datosCliente() {
  const inputNombre = document.querySelector("#nombre-venta");
  inputNombre.addEventListener("input", function (e) {
    venta.nombre = inputNombre.value;
  });

  const inputCelular = document.querySelector("#celular-venta");
  inputCelular.addEventListener("input", function (e) {
    venta.celular = inputCelular.value;
  });

  const inputDireccion = document.querySelector("#direccion-venta");
  inputDireccion.addEventListener("input", function (e) {
    venta.direccion = inputDireccion.value;
  });

  const inputEntre = document.querySelector("#entre-venta");
  inputEntre.addEventListener("input", function (e) {
    venta.entre = inputEntre.value;
  });

  const inputCodigo = document.querySelector("#codigo-venta");
  inputCodigo.addEventListener("input", function (e) {
    venta.codigo = inputCodigo.value;
  });

  console.log(venta);
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {
  // const alertaPrevia = document.querySelector(".alerta");
  // if (alertaPrevia) {
  //   alertaPrevia.remove();
  // }

  const alerta = document.createElement("DIV");
  alerta.textContent = mensaje;
  alerta.classList.add("alerta");
  alerta.classList.add(tipo);

  const referencia = document.querySelector(elemento);
  referencia.appendChild(alerta);

  if (desaparece) {
    setTimeout(() => {
      alerta.remove();
    }, 3000);
  }
}

function mostrarResumen() {
  const resumen = document.querySelector(".contenido-resumen");
  actualizarCarro();
  const iniciarResumen = document.querySelector(".caja-iniciar-resumen");

  while (resumen.firstChild) {
    resumen.removeChild(resumen.firstChild);
  }

  if (
    Object.values(venta).includes("") ||
    venta.carrito.length === 0 ||
    iniciarResumen
  ) {
    mostrarAlerta(
      "Faltan datos o seleccionar productos",
      "error",
      ".contenido-resumen",
      false
    );

    return;
  }

  const tituloResumen = document.createElement("H3");
  tituloResumen.textContent = "Resumen";
  resumen.appendChild(tituloResumen);

  const { nombre, celular, direccion, entre, codigo, carrito } = venta;

  const nombreCliente = document.createElement("P");
  nombreCliente.innerHTML = `<span>Nombre: ${nombre}</span>`;

  const celularCliente = document.createElement("P");
  celularCliente.innerHTML = `<span>Celular: ${celular}</span>`;

  const direccionCliente = document.createElement("P");
  direccionCliente.innerHTML = `<span>Direccion: ${direccion}</span>`;

  const entreCliente = document.createElement("P");
  entreCliente.innerHTML = `<span>Entre Calles: ${entre}</span>`;

  const codigoCliente = document.createElement("P");
  codigoCliente.innerHTML = `<span>Codigo Postal: ${codigo}</span>`;

  const cajaDatos = document.createElement("DIV");

  carrito.forEach((carrito) => {
    const { id, imagen, nombre, marca, precio, cantidad } = carrito;
    const contenedorSahumerio = document.createElement("DIV");
    contenedorSahumerio.classList.add("datos");
    const cajaImagen = document.createElement("DIV");
    const cajaProductoResumen = document.createElement("DIV");
    cajaProductoResumen.classList.add("contenedor-sahumerios-datos");

    const imagenSahumerio = document.createElement("IMG");
    imagenSahumerio.classList.add("img-anuncio");
    imagenSahumerio.src = `/img/${imagen}`;

    const nombreSahumerio = document.createElement("P");
    nombreSahumerio.textContent = nombre;

    const marcaSahumerio = document.createElement("P");
    marcaSahumerio.textContent = marca;

    const precioSahumerio = document.createElement("P");
    precioSahumerio.innerHTML = `<span>$${precio}</span>`;

    const cantidadSahumerio = document.createElement("P");
    cantidadSahumerio.innerHTML = `<span>Cantidad: ${cantidad}</span>`;

    cajaImagen.appendChild(imagenSahumerio);
    contenedorSahumerio.appendChild(nombreSahumerio);
    contenedorSahumerio.appendChild(marcaSahumerio);
    contenedorSahumerio.appendChild(precioSahumerio);
    contenedorSahumerio.appendChild(cantidadSahumerio);

    cajaProductoResumen.appendChild(cajaImagen);
    cajaProductoResumen.appendChild(contenedorSahumerio);

    resumen.appendChild(cajaProductoResumen);
  });

  cajaDatos.classList.add("caja-datos-resumen");

  cajaDatos.appendChild(nombreCliente);
  cajaDatos.appendChild(celularCliente);
  cajaDatos.appendChild(direccionCliente);
  cajaDatos.appendChild(entreCliente);
  cajaDatos.appendChild(codigoCliente);

  resumen.appendChild(cajaDatos);

  const precioTotal = carrito.reduce(
    (acc, sahumerio) => acc + sahumerio.precio * sahumerio.cantidad,
    0
  );
  const total = document.createElement("DIV");
  total.classList.add("totales");
  total.innerHTML = `TOTAL: $<span>${precioTotal}</span>`;

  resumen.appendChild(total);

  const botonPedido = document.createElement("DIV");
  botonPedido.classList.add("container-btn");
  botonPedido.classList.add("btn-resumen");
  botonPedido.innerHTML = `
    <a class="button">
      <div class="button__line"></div>
      <div class="button__line"></div>
      <span class="button__text">Hacer Pedido</span>
      <div class="button__drow1 violeta"></div>
      <div class="button__drow2 violeta"></div>
    </a>
  `;
  botonPedido.onclick = realizarPedido;

  resumen.appendChild(botonPedido);
  localStorage.setItem("venta", JSON.stringify(venta));
}

async function realizarPedido() {
  const { id, nombre, celular, direccion, entre, codigo, carrito } = venta;
  const idProductos = carrito.map((carrito) => carrito.id);
  const cantidadProductos = carrito.map((carrito) => carrito.cantidad);

  const datos = new FormData();
  datos.append("nombre", nombre);
  datos.append("celular", celular);
  datos.append("direccion", direccion);
  datos.append("entre", entre);
  datos.append("codigo", codigo);
  datos.append("usuarios_id", id);
  datos.append("carrito", idProductos);
  datos.append("cantidad", cantidadProductos);

  try {
    //? Peticion a la api
    const url = "http://localhost:3000/api/venta";
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });
    const resultado = await respuesta.json();

    if (resultado.resultado) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Pedido Realizado Correctamente",
        showConfirmButton: false,
        timer: 3500,
      }).then(() => {
        window.location.reload();
        localStorage.removeItem("carro");
      });
    }

    console.log(resultado.resultado);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "No se pudo realizar el pedido. ¡Volve a intentarlo!",
    });
  }
}

//! Animacion hover

carritoCompleto = document.querySelector(".carrito");
carritoChiquito = document.querySelector(".img-carrito");
cerrarCarrito = document.querySelector(".cerrar-carrito");
body = document.querySelector(".body");

function translateActive() {
  carritoCompleto.style.transform = "translateX(0px)";
}

function translateNormal() {
  carritoCompleto.style.transform = "translateX(380px)";
}

function zindexFull() {
  carritoCompleto.style.zIndex = "100";
}

function zindexNormal() {
  carritoCompleto.style.zIndex = "80";
}

carritoChiquito.addEventListener("click", translateActive);
carritoChiquito.addEventListener("click", zindexFull);
cerrarCarrito.addEventListener("click", translateNormal);
cerrarCarrito.addEventListener("click", zindexNormal);

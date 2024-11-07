


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Molino | Peru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-light">

    <header class="bg-dark text-white">
        <div class="container py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <img src="./imgs/logi.png" alt="logo" width="50" height="50">
                </div>
                <div class="col-4 text-center">
                    <h3><a class="text-white text-decoration-none" href="./index.html">LicorPe</a></h3>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-light btn-sm" href="./index.html">Volver a la Tienda</a>
                </div>
            </div>
        </div>
    </header>

    <?php
// Recibir los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$email = $_POST['email'] ?? '';
$telefo = $_POST['telefono'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$total = $_POST['total'] ?? '';
$productos = $_POST['cartItems'] ?? '';  // Cambié 'productos' a 'cartItems' para recibir los datos correctos

// Decodificar los productos (carrito) si es necesario
$cartItems = json_decode($productos, true);

// Si no se recibieron productos, establecer un carrito vacío
if (!$cartItems) {
    $cartItems = [];
}

?>

<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalTour">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body p-5">
                <h2 class="fw-bold mb-0">Datos de la Compra</h2>

                <ul class="d-grid gap-4 my-5 list-unstyled small">
                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Nombre:</h5>
                            <p><?php echo htmlspecialchars($nombre); ?></p>
                        </div>
                    </li>
                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Apellido:</h5>
                            <p><?php echo htmlspecialchars($apellido); ?></p>
                        </div>
                    </li>
                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Correo Electrónico:</h5>
                            <p><?php echo htmlspecialchars($email); ?></p>
                        </div>
                    </li>
                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Telefono:</h5>
                            <p><?php echo htmlspecialchars($telefo); ?></p>
                        </div>
                    </li>
                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Dirección de Envío:</h5>
                            <p><?php echo htmlspecialchars($direccion); ?></p>
                        </div>
                    </li>

                    <!-- Mostrar los productos -->
                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Productos Comprados:</h5>
                            <ul>
                                <?php
                                $totalCompra = 0;
                                foreach ($cartItems as $item) {
                                    $subtotal = $item['price'] * $item['quantity'];
                                    echo "<li><strong>{$item['name']}</strong> - S/. {$item['price']} x {$item['quantity']} = S/. {$subtotal}</li>";
                                    $totalCompra += $subtotal;
                                }
                                ?>
                            </ul>
                        </div>
                    </li>

                    <li class="d-flex gap-4">
                        <div>
                            <h5 class="mb-0">Total de la Compra:</h5>
                            <p>S/.<?php echo number_format($totalCompra, 2); ?></p>
                        </div>
                    </li>
                </ul>
                <button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal"><a href="./index.html" style="text-decoration: none; color: white;">Enviar Datos</a></button>
            </div>
        </div>
    </div>
</div>



<!--Footer-->
<div class="container">
            <footer class="py-3 my-4">
              <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Inicioo</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre Nosotros</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contacto</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Preguntas Frecuentes</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Terminos y Condiciones</a></li>
              </ul>
              <p class="text-center text-body-secondary">&copy; 2024 LicorPe, Peruano</p>
            </footer>
          </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
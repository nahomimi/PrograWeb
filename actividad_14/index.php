<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 14</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="/img/icono-udg.png" type="image/x-icon">

</head>

  <body>
    <header>
      <section class="section header">
        <div class="container is-fullwidth">
          <img src="../img/logo-udg.png" alt="Logo CUCEA" class="logo" />
        </div>
      </section>
    </header>

    <section class="section">
      <div class="container">
        <div class="buttons">
          <button class="button is-primary is-dark">
            <a href="../index.html" class="has-text-white">Inicio</a>
          </button>
        </div>

        <h1 class="title">ISSET / EMPTY</h1>
        <p class="subtitle">By <strong>Nahomi Venegas Preciado</strong></p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-narrow is-half" >
            <div class="card">
              <div class="card-content">
                <form action="index.php" method="post">
                  <div class="field">
                    <label class="label" for="nombre">Nombre: </label>
                    <div class="field">
                      <div class="control has-icons-left">
                        <input
                          class="input"
                          type="text"
                          name="nombre"
                          id="nombre"
                          placeholder="Ej. Nahomi Venegas Preciado"
                          required
                        />
                        <span class="icon is-medium is-left">
                          <i class="fa-solid fa-user-astronaut"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label" for="nombre">Edad: </label>
                    <div class="field">
                      <div class="control has-icons-left">
                        <input
                          class="input"
                          type="number"
                          name="edad"
                          id="edad"
                          placeholder="Ej. 22"
                          required
                        />
                        <span class="icon is-medium is-left">
                          <i class="fa-solid fa-arrow-up-9-1"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label" for="nombre">Correo: </label>
                      <div class="field">
                        <div class="control has-icons-left">
                          <input
                            class="input"
                            type="email"
                            name="correo"
                            id="correo"
                            placeholder="Ej. Naho@hotmail.es"
                            required
                          />
                          <span class="icon is-medium is-left">
                            <i class="fa-solid fa-envelope"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="field has-text-centered">
                    <input
                      class="button is-primary mb-5"
                      type="submit"
                      value="Enviar"
                    />
                  </div>
                    
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
      // Validar cuando se envía el formulario
      if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['correo'])) {

          $nombre = $_POST['nombre'];
          $edad = $_POST['edad'];
          $correo = $_POST['correo'];

          // Validar que no estén vacíos
          if (!empty($nombre) && !empty($edad) && !empty($correo)) {

              // Validar formato de edad
              if (is_numeric($edad)) {

                  // Validar formato de correo
                  if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

                      // Mostrar datos si todo es correcto - SECCIÓN CORREGIDA
                      echo '<section class="section">';
                      echo '  <div class="container">';
                      echo '    <div class="columns is-centered">';
                      echo '      <div class="column is-narrow is-half">';
                      echo '        <div class="notification is-primary">';
                      echo '          <h3 class="title is-4">Datos recibidos:</h3>';
                      
                      echo '          <div class="icon-text">';
                      echo '            <span class="icon"><i class="fa-solid fa-user-astronaut"></i></span>';
                      echo '            <span>Nombre: <strong>'.htmlspecialchars($nombre).'</strong></span>';
                      echo '          </div>';
                      
                      echo '          <div class="icon-text">';
                      echo '            <span class="icon"><i class="fa-solid fa-arrow-up-9-1"></i></span>';
                      echo '            <span>Edad: <strong>'.htmlspecialchars($edad).'</strong> años</span>';
                      echo '          </div>';
                      
                      echo '          <div class="icon-text">';
                      echo '            <span class="icon"><i class="fa-solid fa-envelope"></i></span>';
                      echo '            <span>Correo: <strong>'.htmlspecialchars($correo).'</strong></span>';
                      echo '          </div>';
                      
                      echo '        </div>'; // cierre notification
                      echo '      </div>'; // cierre column is-narrow
                      echo '    </div>'; // cierre columns
                      echo '  </div>'; // cierre container
                      echo '</section>'; // cierre section

                  } else {
                      echo '<div class="notification is-danger mt-4">';
                      echo '  <span class="icon-text">';
                      echo '    <span class="icon"><i class="fas fa-exclamation-circle"></i></span>';
                      echo '    <span>Error: El correo no tiene un formato válido</span>';
                      echo '  </span>';
                      echo '</div>';
                  }
              } else {
                  echo '<div class="notification is-danger mt-4">';
                  echo '  <span class="icon-text">';
                  echo '    <span class="icon"><i class="fas fa-exclamation-circle"></i></span>';
                  echo '    <span>Error: La edad debe ser un número</span>';
                  echo '  </span>';
                  echo '</div>';
              }
          } else {
              echo '<div class="notification is-danger mt-4">';
              echo '  <span class="icon-text">';
              echo '    <span class="icon"><i class="fas fa-exclamation-circle"></i></span>';
              echo '    <span>Error: Todos los campos son obligatorios</span>';
              echo '  </span>';
              echo '</div>';
          }
      }
      ?>
      
    <footer class="footer">
      <div class="container">
        <div class="columns is-vcentered is-centered">
          <!-- Columna del logo - centrada -->
          <div class="column is-4 has-text-centered">
            <img
              src="../img/logo-cucea-blanco.png"
              alt="Logo CUCEA"
              width="256"
            />
          </div>

          <!-- Columna de contacto - centrada -->
          <div class="column is-5 has-text-centered-mobile">
            <h4 class="title is-5 has-text-white mb-3">Contacto</h4>
            <div class="content has-text-white">
              <p class="mb-2">
                <span class="icon-text is-justify-content-center">
                  <span class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                  </span>
                  <span>Periférico Norte 799, Zapopan, Jal.</span>
                </span>
              </p>
              <p class="mb-2">
                <span class="icon-text is-justify-content-center">
                  <span class="icon">
                    <i class="fas fa-phone"></i>
                  </span>
                  <span>+52 33 3770 3300</span>
                </span>
              </p>
              <p>
                <span class="icon-text is-justify-content-center">
                  <span class="icon">
                    <i class="fas fa-envelope"></i>
                  </span>
                  <span>Nahomi.venegas@alumnos.udg.mx</span>
                </span>
              </p>
            </div>
          </div>

          <!-- Columna de redes sociales - centrada -->
          <div class="column is-2 has-text-centered">
            <h4 class="title is-5 has-text-white mb-3">Redes Sociales</h4>
            <div class="buttons is-centered">
              <a
                class="button"
                href="https://www.facebook.com/share/g/1Bawj6i4vX/"
                target="_blank"
              >
                <span class="icon">
                  <i class="fab fa-facebook-f"></i>
                </span>
              </a>
              <a
                class="button"
                href="https://www.instagram.com/cucea_oficial/?hl=es"
                target="_blank"
              >
                <span class="icon">
                  <i class="fab fa-instagram"></i>
                </span>
              </a>
              <a
                class="button"
                href="https://wa.me/523337703300"
                target="_blank"
              >
                <span class="icon">
                  <i class="fab fa-whatsapp"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Derechos reservados -->
        <div
          class="has-text-centered mt-5 pt-4"
          style="border-top: 1px solid rgba(255, 255, 255, 0.1)"
        >
          <p class="has-text-white">
            © 2025 CUCEA - Universidad de Guadalajara
          </p>
          <p class="is-size-7 mt-2">
            <a
              href="https://www.cucea.udg.mx/aviso-de-privacidad"
              class="has-text-white"
              target="_blank"
              >Política de privacidad</a
            >
            |
            <a
              href="https://www.cucea.udg.mx/terminos-y-condiciones"
              class="has-text-white"
              target="_blank"
              >Términos de servicio</a
            >
          </p>
        </div>
      </div>
    </footer>

    <script src=".main.js"></script>
  </body>
</html>

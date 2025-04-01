<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="/img/icono-udg.png" type="image/x-icon">

</head>
<body>
<header>
        <section class="section header">
            <div class="container">
                <img src="/img/logo-udg.png" alt="Logo CUCEA" class="logo">
            </div>
        </section>
    </header>

    <section class="section">
        <div class="container">
            <div class="buttons">
                <button class="button is-primary is-dark"><a  href="/index.html" class="has-text-white">Inicio</a></button>
            </div>
            <div class="buttons">
                <button class="button is-warning is-dark"><a  href="index.html" class="has-text-white">Calculadora bonis</a></button>
            </div>
            <h1 class="title">Calculadora</h1>
            <p class="subtitle">By <strong>Nahomi Venegas Preciado</strong></p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">                    
                    <div class="box">
                    <form action="" method="post">
                            <!-- Campos de entrada -->
                            <div class="field">
                                <label class="label">Primer número</label>
                                <div class="control">
                                    <input class="input" type="text" name="numero1" placeholder="Ingrese el primer número" required>
                                </div>
                            </div>
                            
                            <div class="field">
                                <label class="label">Segundo número</label>
                                <div class="control">
                                    <input class="input" type="text" name="numero2" placeholder="Ingrese el segundo número" required>
                                </div>
                            </div>
                            
                            <!-- Botones de operación en una sola fila -->
                            <div class="field">
                                <label class="label">Operación</label>
                                <div class="control">
                                    <div class="field is-grouped is-grouped-multiline">
                                        <div class="control is-expanded">
                                            <label class="button is-warning is-selected is-fullwidth">
                                                <input type="radio" name="operacion" value="suma" checked hidden>
                                                <span class="icon">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="control is-expanded">
                                            <label class="button is-danger is-fullwidth">
                                                <input type="radio" name="operacion" value="resta" hidden>
                                                <span class="icon">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="control is-expanded">
                                            <label class="button is-info is-fullwidth">
                                                <input type="radio" name="operacion" value="multiplicacion" hidden>
                                                <span class="icon">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="control is-expanded">
                                            <label class="button is-success is-fullwidth">
                                                <input type="radio" name="operacion" value="division" hidden>
                                                <span class="icon">
                                                    <i class="fas fa-divide"></i>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Botón de calcular -->
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-primary is-dark is-fullwidth">
                                        <span class="icon">
                                            <i class="fas fa-equals"></i>
                                        </span>
                                        <span>Calcular</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Obtener los valores del formulario
                        $numero1 = $_POST['numero1'];
                        $numero2 = $_POST['numero2'];
                        $operacion = $_POST['operacion'];
                        
                        // Validar que los valores sean numéricos
                        if (is_numeric($numero1) && is_numeric($numero2)) {
                            $resultado = 0;
                            $operador = '';
                            
                            // Realizar la operación seleccionada
                            switch ($operacion) {
                                case 'suma':
                                    $resultado = $numero1 + $numero2;
                                    $operador = '+';
                                    break;
                                case 'resta':
                                    $resultado = $numero1 - $numero2;
                                    $operador = '-';
                                    break;
                                case 'multiplicacion':
                                    $resultado = $numero1 * $numero2;
                                    $operador = '×';
                                    break;
                                case 'division':
                                    if ($numero2 != 0) {
                                        $resultado = $numero1 / $numero2;
                                        $operador = '÷';
                                    } else {
                                        echo '<div class="notification is-danger">';
                                        echo '<span class="icon-text">';
                                        echo '<span class="icon"><i class="fas fa-exclamation-triangle"></i></span>';
                                        echo '<span>Error: División por cero</span>';
                                        echo '</span>';
                                        echo '</div>';
                                        exit;
                                    }
                                    break;
                            }
                            
                            // Mostrar el resultado
                            echo '<div class="notification is-primary">';
                            echo '<div class="icon-text">';
                            echo '<span class="icon"><i class="fas fa-calculator"></i></span>';
                            echo '<span>'.$numero1.' '.$operador.' '.$numero2.' = <strong>'.$resultado.'</strong></span>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<div class="notification is-danger">';
                            echo '<span class="icon-text">';
                            echo '<span class="icon"><i class="fas fa-exclamation-circle"></i></span>';
                            echo '<span>Error: Ingrese números válidos</span>';
                            echo '</span>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer ">
        <div class="container">
          <div class="columns is-vcentered is-centered">
            
            <!-- Columna del logo - centrada -->
            <div class="column is-4 has-text-centered">
              <img src="/img/logo-cucea-blanco.png" alt="Logo CUCEA" width="256">
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
                <a class="button" href="https://www.facebook.com/share/g/1Bawj6i4vX/" target="_blank">
                  <span class="icon">
                    <i class="fab fa-facebook-f"></i>
                  </span>
                </a>
                <a class="button" href="https://www.instagram.com/cucea_oficial/?hl=es" target="_blank">
                  <span class="icon">
                    <i class="fab fa-instagram"></i>
                  </span>
                </a>
                <a class="button" href="https://wa.me/523337703300" target="_blank">
                  <span class="icon">
                    <i class="fab fa-whatsapp"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          
          <!-- Derechos reservados -->
          <div class="has-text-centered mt-5 pt-4" style="border-top: 1px solid rgba(255,255,255,0.1);">
            <p class="has-text-white">© 2025 CUCEA - Universidad de Guadalajara</p>
            <p class="is-size-7 mt-2">
              <a href="https://www.cucea.udg.mx/aviso-de-privacidad" class="has-text-white" target="_blank">Política de privacidad</a> | 
              <a href="https://www.cucea.udg.mx/terminos-y-condiciones" class="has-text-white" target="_blank">Términos de servicio</a>
            </p>
          </div>
        </div>
      </footer>

      <script src="./main.js"></script>

</body>
</html>
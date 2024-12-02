<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrusel de Productos</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado */
        .carousel-inner {
            position: relative;
            width: 100%;
            height: 40vh; /* 25% del alto de la pantalla */
            overflow: hidden;
        }

        .carousel-item {
            height: 100%; /* Ocupa todo el espacio del contenedor */
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajuste perfecto para evitar espacios */
        }

        .carousel-caption {
            bottom: 10px;
        }

        .carousel-caption h5, .carousel-caption p {
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
        }

        .carousel-indicators button {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .carousel-indicators .active {
            background-color: white;
        }
    </style>
</head>
<body>

<!-- Carrusel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/reposteria/img/menu/1.jpg" alt="Imagen 1">
      <div class="carousel-caption">
        <h5>Título 1</h5>
        <p>Descripción de la imagen 1.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/reposteria/img/menu/2.jpg" alt="Imagen 2">
      <div class="carousel-caption">
        <h5>Título 2</h5>
        <p>Descripción de la imagen 2.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/reposteria/img/menu/3.jpg" alt="Imagen 3">
      <div class="carousel-caption">
        <h5>Título 3</h5>
        <p>Descripción de la imagen 3.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </button>
</div>

<!-- Incluir Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Activar el movimiento automático del carrusel
  var myCarousel = document.getElementById('carouselExampleCaptions');
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 3000, // Tiempo en milisegundos
    ride: 'carousel' // Inicio automático
  });
</script>

</body>
</html>

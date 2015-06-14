<?php include('config/funciones.php'); ?>
<!-- inicio_box -->
<div class="inicio_box">

<!-- bloque izquierda -->
<div class="bloque_izq">

<div class="clear"></div>
<h1>Ultimos Episodios Agregados</h1>

<!-- ultimos episodios -->
<div class="ultimos_epis">

<!-- episodios -->
<?php jm_ultimos_episodios(home) ?>
<!-- episodios -->

</div>
<!-- ultimos episodios -->

</div>
<!-- bloque izquierda -->


<!-- bloque derecha -->
<div class="bloque_der">

    <!-- episodios mas vistos -->
    <h1>Episodios mas vistos</h1>
    <ul class="lista_simple lista_estrella">
	<?php jm_capitulos_mas_vistos() ?>
    </ul>
    <!-- episodios mas vistos -->

    <!-- animes recientes -->
    <h1>Animes Recientes</h1>
    <ul class="lista_simple lista_tv">
	<?php jm_ultimos_animes('lista') ?>
    </ul>
    <!-- animes recientes -->

</div>
<!-- bloque derecha -->

<div class="clear"></div>


</div>
<!-- inicio_box -->
<div class="contenedor">
     <h2>Editar Aporte</h2>
<?
$animeinfo = @mysql_query("SELECT * FROM $SQL_Base.series_anime where Codigo='".$_GET['id']."'", $coxwb);
if (@mysql_num_rows($animeinfo) > 0){
$Codigo=mysql_result($animeinfo,0,'Codigo');
$Nombre=mysql_result($animeinfo,0,'Nombre');
$Nombre_Alternativo=mysql_result($animeinfo,0,'Nombre_Alternativo');
$Url=mysql_result($animeinfo,0,'Url');
$Imagen=mysql_result($animeinfo,0,'Imagen');
$Mini=mysql_result($animeinfo,0,'Mini');
$Sipnosis=mysql_result($animeinfo,0,'Sipnosis');
$Categoria=mysql_result($animeinfo,0,'Categoria');
$Generos=mysql_result($animeinfo,0,'Generos');
$Estado=mysql_result($animeinfo,0,'Estado');
$Slider=mysql_result($animeinfo,0,'Slider');
$Fecha=mysql_result($animeinfo,0,'Fecha');
$thumb=mysql_result($animeinfo,0,'thumb');
}else{
//$Codigo=$_GET['codserie'];
}
?>
	 
<form action="?op=get" method="post">
<input name="codseriexd" type="hidden" value="<?=@$Codigo?>">
<?php echo '<h2>'.@$Codigo.'</h2>'; ?>

<table border="0">
  <tr>
    <td width="5" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"></td>
    <th scope="col"></th>
    <td width="75" nowrap="nowrap" class="clms" scope="col"><strong>Sipnosis:</strong></td>
    <th colspan="3" rowspan="9" valign="top" scope="col"><textarea name="Sipnosis" cols="40" rows="11" id="Sipnosis"><?=@$Sipnosis?></textarea></th>
    </tr>
  <tr>
    <td width="5" nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"><strong>Nombre:</strong></td>
    <th scope="col"><input name="Nombre" type="text" id="Nombre" value="<?=@$Nombre?>" size="20" /></th>
    <td width="75" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"><strong>Nombre_Alternativo</strong></td>
    <th scope="col"><input name="Nombre_Alternativo" type="text" id="Nombre_Alternativo" value="<?=@$Nombre_Alternativo?>" size="20" /></th>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
  </tr>
  <tr>
    <td width="5" nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td width="75" nowrap="nowrap" class="clms" scope="row"><strong>Generos:</strong></td>
    <td width="100"><input name="Generos" type="text" id="Generos" value="<?=@$Generos?>" size="20" /></td>
    <td width="75" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    </tr>
  <tr>
    <td width="5" nowrap="nowrap" class="clms" scope="row"></td>
    <td nowrap="nowrap" class="clms" scope="row"><strong><label for="Categoria">Categoria:</label></strong></td>
    <td>
      <select name="Categoria" id="Categoria">
        <option value="Anime"<? if(@$Categoria=='Anime'){echo ' selected="selected"';}?>>Anime</option>
		<option value="Animada"<? if(@$Categoria=='Animada'){echo 'selected="selected"';}?>>Animada</option>
        <option value="Ova"<? if(@$Categoria=='Ova'){echo 'selected="selected"';}?>>Ova</option>
        <option value="Pelicula"<? if(@$Categoria=='Pelicula'){echo 'selected="selected"';}?>>Pelicula</option>
      </select></td>
    <td width="75" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    </tr>
  <tr>
    <td width="5" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td width="75" nowrap="nowrap" class="clms" scope="col"><strong><label for="Categoria">Estado:</label> </strong></td>
    <td width="100">
      <select name="Estado" id="Estado">
        <option value="1"<? if(@$Estado=='1'){echo 'selected="selected"';}?>>En Emision</option>
        <option value="0"<? if(@$Estado=='0'){echo ' selected="selected"';}?>>Finalizado</option>
      </select></td>
    <td width="75" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td width="75" nowrap="nowrap" class="clms" scope="col"><strong>Url: </strong></td>
    <td><input name="Url" type="text" id="Url" value="<?=@$Url?>" size="20" /></td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
  </tr>
    <tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td width="75" nowrap="nowrap" class="clms" scope="col"><strong>Imagen Portada: </strong></td>
    <td><input name="Imagen" type="text" id="Imagen" value="<?=@$Imagen?>" size="20" /></td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
  </tr>
   <tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"><strong>Imagen Mini: </strong></td>
    <td colspan="5"><input name="Mini" type="text" id="Mini" value="<?=@$Mini?>" size="20" /></td>
    </tr>
	<tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"><strong>Imagen Thumb: </strong></td>
    <td colspan="5"><input name="thumb" type="text" id="thumb" value="<?=@$thumb?>" size="20" /></td>
    </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"><strong>Img Slider (No desarrollado): </strong></td>
    <td colspan="5"><input name="Slider" type="text" id="Slider" value="<?=@$Slider?>" size="50" maxlength="150" /></td>
    </tr>
   <tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col"><strong>Fecha: <?php echo date("Y/m/d"); ?></strong></td>
    <td colspan="5"><input name="Fecha" type="text" id="Fecha" value="<?=@$Fecha?>" size="20" /></td>
    </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td><label for="actmini"></label>
      <select name="acthumb" id="acthumb">
        <option value="si">Actualizar Thumb</option>
        <option value="no">No Actualizar Thumb</option>
      </select></td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td>&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="5" nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td><label for="actmini"></label>
      <select name="actmini" id="actmini">
        <option value="si">Actualizar Mini</option>
        <option value="no">No Actualizar Mini</option>
      </select></td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td>&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="col">&nbsp;</td>
    <td><input type="submit" name="Submit" value="Enviar" /></td>
  </tr>
</table>
</form>
</div>
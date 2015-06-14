<!-- INCLUIR CSS tabs.css -->
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/tabs.css">

<script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".tab_content").hide();
            jQuery(".subtab_content").hide();
            jQuery("ul.opvid li:first").addClass("active").show();
            jQuery("ul.subtabs li:first").addClass("active").show();
            jQuery(".tab_content:first").show();
            jQuery(".subtab_content:first").show();
            jQuery("ul.opvid li").click(function () {
                jQuery("ul.opvid li").removeClass("active");
                jQuery(this).addClass("active");
                jQuery(".tab_content").hide();
                var a = jQuery(this).find("a").attr("href");
                jQuery(a).fadeIn();
                return false
            });
            jQuery("ul.subtabs li").click(function () {
                jQuery("ul.subtabs li").removeClass("active");
                jQuery(this).addClass("active");
                jQuery(".subtab_content").hide();
                var a = jQuery(this).find("a").attr("href");
                jQuery(a).fadeIn();
                return false
            });
        });
		
</script>


    <!-- Reproductor pestana -->
    <div class="box_opc" id="repro_box">
        <!-- Reproductor -->
        <div id="video_player">
<div class="container">
<? //Empezamos con los tabs?>

<ul class="opvid">

<? if($growsx['html5repro']!=='' && $growsx['html5repro']!==NULL){$opnumber++;?>
<li><a class="tip" href="#html5repro" title="Html">Hyperion</a></li>
<? } ?>

<? if($growsx['Nowvideo']!=='' && $growsx['Nowvideo']!==NULL){ $opnumber++;?>
<li><a class="tip" href="#tabnowvideo" title="Nowvideo">Nowvideo</a></li>
<? } ?>
<? if($growsx['Powerbold']!=='' && $growsx['Powerbold']!==NULL){ $opnumber++;?>
<li><a class="tip" href="#tabpowerbold" title="Putlocker">Powerbold</a></li>
<? } ?>
<? if($growsx['Videoweed']!=='' && $growsx['Videoweed']!==NULL){ $opnumber++;?>
<li><a class="tip" href="#tabweed" title="Videoweed">Videoweed</a></li>
<? } ?>
<? if($growsx['VK']!=='' && $growsx['VK']!==NULL){ $opnumber++;?>
<li><a class="tip" href="#tabvk" title="Vkontakte">Vk</a></li>
<? } ?>
<? if($growsx['Youtube']!=='' && $growsx['Youtube']!==NULL){$opnumber++;?>
<li><a class="tip" href="#youtu" title="YouTubE">Youtube</a></li>
<? } ?>

<? // Sin fuentes  
if(
$growsx['html5repro']==NULL &&
$growsx['Nowvideo']==NULL &&
$growsx['Putlocker']==NULL &&
$growsx['Videoweed']==NULL &&
$growsx['Youtube']==NULL &&
$growsx['VK']==NULL)
{
$sinfuentesxd = 'yes';?>
<li><a href="#tab1" class="trailer">No disponible</a></li>
<? } ?>
</ul>

<? //Empezamos con los divs de video?>
<div class="tab_container">
<? if($growsx['html5repro']!=='' && $growsx['html5repro']!==NULL){?>
<div id="html5repro" class="tab_content">
<div id="mediaplayer">JW Player goes here</div>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			flashplayer: "<?=$urlpath?>js/player.swf",
			file: "<?=$growsx['html5repro']?>",
			image: "preview.jpg",
			screencolor: "ffffff",
			width: "793",
			height: "<?=$fj_repro_heigh?>",
			stretching: "fill",
            skin: "<?=$urlpath?>skins/NewTube.zip",
			abouttext: "Animedroide",
            aboutlink: "http://animedroide.com/"
		});
	</script>
</div>
<? } ?>

<? if( $plugin=='ok' ){?>
<div id="tabharry" class="tab_content">
<div id="frans_1">
<iframe id="player_framev2" style="position:relative;" name="player_frans" width="<?=$fj_repro_width?>" height="<?=$fj_repro_heigh?>" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" src="<?=$urlpath_plugin?>harry/player/harrystream.php?id=<?=$growsx['../plantillausxd/CodEpisodio']?>"></iframe>
</div>
</div>
<? } ?>

<? if($growsx['Nowvideo']!=='' && $growsx['Nowvideo']!==NULL){?>
<div id="tabnowvideo" class="tab_content"><iframe width="<?=$fj_repro_width?>" height="<?=$fj_repro_heigh?>" frameborder="0" src="http://embed.nowvideo.eu/embed.php?v=<?=$growsx['Nowvideo']?>&amp;width=<?=$fj_repro_width?>&amp;height=<?=$fj_repro_heigh?>" scrolling="no"></iframe></div>
<? } ?>

<? if($growsx['Powerbold']!=='' && $growsx['Powerbold']!==NULL){?>
<div id="tabpowerbold" class="tab_content">
<embed allowfullscreen="true" src="<?=$urlpath?>player.swf" bgcolor="#000" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="file=<?=$growsx['Powerbold']?>&amp;provider=video&amp;abouttext=Animedroide Player&amp;controlbar=bottom&amp;stretching=exactfit&amp;screencolor=000&amp;plugins=backstroke-1,timeslidertooltipplugin-1" height="463" width="773">
</div>
<? } ?>

<? if($growsx['VK']!=='' && $growsx['VK']!==NULL){?>
<div id="tabvk" class="tab_content"><iframe src="http://vk.com/video_ext.php?oid=<?=$growsx['VK']?>&hd=2" width="<?=$fj_repro_width?>" height="<?=$fj_repro_heigh?>" frameborder="0"></iframe></div>
<? } ?>


<? if($growsx['Videoweed']!=='' && $growsx['Videoweed']!==NULL){?>
<div id="tabweed" class="tab_content"><iframe width="<?=$fj_repro_width?>" height="<?=$fj_repro_heigh?>" frameborder="0" src="http://embed.videoweed.es/embed.php?v=<?=$growsx['Videoweed']?>&width=<?=$fj_repro_width?>&height=<?=$fj_repro_heigh?>" scrolling="no"></iframe></div>
<? } ?>
</div>

<? //Terminams todos los divs y tabs ?>
</div>
        </div>
        <!-- Reproductor -->
        
        <!-- detalles video -->
        <div class="sub_h1">Información del video:</div>
            <img class="info_icon" src="<?=$urlpath?>imagenes/img/i48/info.png" id="detalle_avatar">
            <ul class="detalles">
                <li><b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png" alt="" id="detalle_audio"></li>
                <li><b>Servidor:</b> <span id="detalle_server">Powerbold</span></li>
                <li><b>Fansub:</b> <span id="detalle_fansub">Desconocido</span></li>
                <li><b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png" alt="" id="detalle_subs"></li>
                <li><b>Publicado:</b> <span id="detalle_fecha"><?=$growsx['timestamp']?></span></li>
            </ul>
        <!-- detalles video -->
     </div>
    <!-- Reproductor pestana -->
    
   
    <!-- Opciones detalladas -->
    <div class="box_opc" id="opciones_box" style="display: none;">
        <!-- hyperion -->
        <div class="opcion video_opcion" data-id="1">
            <img src="<?=$urlpath?>imagenes/img/servers/hyperion.png" class="server">
            <b>Opción 1: Hyperion</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- hyperion -->
        
        <!-- videobam -->
        <div class="opcion video_opcion" data-id="280063">
            <img src="<?=$urlpath?>imagenes/img/servers/videobam.png" class="server">
            <b>Opción 2: Videobam</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- videobam -->
    
        <!-- zyppyshare -->
        <div class="opcion video_opcion" data-id="280064">
            <img src="<?=$urlpath?>imagenes/img/servers/zippyshare.png" class="server">
            <b>Opción 3: Zippyshare</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- zyppyshare -->
    
        <!-- nowvideo -->
        <div class="opcion video_opcion" data-id="280067">
            <img src="<?=$urlpath?>imagenes/img/servers/nowvideo.png" class="server">
            <b>Opción 4: Nowvideo</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- nowvideo -->
    
        <!-- putlocker -->
        <div class="opcion video_opcion" data-id="280066">
            <img src="<?=$urlpath?>imagenes/img/servers/putlocker.png" class="server">
            <b>Opción 5: Putlocker</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- putlocker -->
    
        <!-- novamov -->
        <div class="opcion video_opcion" data-id="280068">
            <img src="<?=$urlpath?>imagenes/img/servers/novamov.png" class="server">
            <b>Opción 6: Novamov</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- novamov -->
    
        <!-- videoweed -->
        <div class="opcion video_opcion" data-id="280065">
            <img src="<?=$urlpath?>imagenes/img/servers/videoweed.png" class="server">
            <b>Opción 7: Videoweed</b>
            <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
            </span>
        </div>
        <!-- videoweed -->
        
    </div>
    <!-- Opciones detalladas -->
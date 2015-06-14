$(function () {	
	// jquery lazy
    $("img.lazy").lazyload();

	// mostrar alfabeto 
    $("#mostrar_alfabeto").click(function () {
        $(".generos_box").css("display", "none");
        if ($(".alfabeto_box").css("display") == 'none')
            $(".alfabeto_box").css("display", "");
        else
            $(".alfabeto_box").css("display", "none");
    });
	
	// mostrar generos
    $("#mostrar_generos").click(function () {
        if ($(".generos_box").css("display") == 'none')
            $(".generos_box").css("display", "");
        else
            $(".generos_box").css("display", "none");
        $(".alfabeto_box").css("display", "none");
    });
	
	// botones ver anime
    $(".opt").click(function () {
        $(".box_opc").css("width", "0px").css("height", "0px").css("overflow", "hidden");
        $("#menu_epi .opt").removeClass("actual");
        $("#" + $(this).attr("data-bloque")).css("height", "auto").css("width", "auto").css("overflow", "auto").css("display", "");
        if ($(this).attr("data-bloque") == 'opciones_box')
            $(".detalladas").addClass("actual");
        else
            $(this).addClass("actual");
    });
	
	// opciones video
    $(".video_opcion").click(function () {
        $("#menu_epi div").removeClass("actual");
        $("#menu_epi div").first().addClass("actual");
        $(".box_opc").css("width", "0px").css("height", "0px").css("overflow", "hidden");
        $("#repro_box").css("height", "auto").css("width", "auto").css("overflow", "auto").css("display", "");
        play_opcion($(this).attr("data-id"));
    });
	
    $(".opvid ul").click(function () {
        if ($(this).attr("data-id"))
            play_opcion($(this).attr("data-id"));
    });
	
	// Opciones reproductor
    play_opcion = function (oid) {
        var act = videos[oid];
        act[4] = act[4] || "jpg";
        $("#detalle_audio").attr("src", "" + act[11] + "imagenes/img/idiomas/" + act[0] + ".png");
        $("#detalle_subs").attr("src", "" + act[11] + "imagenes/img/idiomas/" + act[1] + ".png");
        $("#detalle_fecha").html(act[8]);
        $("#detalle_fansub").html((act[7] ? '<a href="' + act[7] + '" target="_blank" rel="nofollow">' : '') + act[5] + (act[6] ? ' [' + act[6] + ']' : '') + (act[7] ? '</a>' : ''));
        $("#detalle_server").html(ucfirst(act[9]));
        $(".opvid li").removeClass("actual");
        $("#video_player").html(act[10]);
        $("#vid_" + oid).addClass("actual");
        if (multi_idioma) {
            $(".opvid li").css("display", "none");
            $('.opvid *[data-audio="' + act[0] + '"]').css("display", "");
            $("#idioma_sel").val(act[0]);
        }
    }
	
    $("#idioma_sel").change(function () {
        var audio = $(this).val();
        $(".opvid li").css("display", "none");
        $('.opvid *[data-audio="' + audio + '"]').css("display", "");
        play_opcion(idiomas_defs[audio]);
    });

    function ucfirst(str) {
        str += '';
        var f = str.charAt(0).toUpperCase();
        return f + str.substr(1);
    }
	
    $(".filtro_el").click(function () {
        var datos = $(this).attr("data-filtro").split(':');
        $("#anime_" + datos[0]).val(datos[1]);
        if (datos[0] == 'orden')
            $("#anime_pagina").val('1');
        $("#filtro_anime").submit();
    });
	
    $('#busqueda_rapida').keypress(function () {
        $(this).unbind("keypress");
        var obj = $('#busqueda_rapida');
    
        $.ajaxSetup({
            cache: true
        });
        $.getScript(url_lista, function (data, textStatus, jqxhr) {
            $("#pre_busqueda").remove();
            $("#busqueda_rapida").jsonSuggest({
                data: lanime,
                onSelect: callback,
                maxResults: 10,
                minCharacters: 2,
                imagePath: 'http://cdn.animeflv.net/img/portada/thumb/'
            });
            var e = $.Event("keyup");
            e.keyCode = 39;
            $("#busqueda_rapida").trigger(e);
        });
    });

    function callback(item) {
        window.location = '/anime/' + item.d + '.html';
    }
    $(".cerrar_bloque_ads").mouseover(function () {
        $(".cerrar_bloque_ads").css("display", "none");
        $(".cerrar_bloque_ads2").css("display", "");
    });
    $(".cerrar_bloque_ads2").click(function () {
        $(".bloque_ads").remove();
    });
});
! function (a) {
    function d() {
        a(b).each(function () {
            e(a(this)).removeClass("open")
        })
    }

    function e(b) {
        var c = b.attr("data-target"),
            d;
        return c || (c = b.attr("href"), c = c && /#/.test(c) && c.replace(/.*(?=#[^\s]*$)/, "")), d = a(c), d.length || (d = b.parent()), d
    }
    var b = "[data-toggle=dropdown]",
        c = function (b) {
            var c = a(b).on("click.dropdown.data-api", this.toggle);
            a("html").on("click.dropdown.data-api", function () {
                c.parent().removeClass("open")
            })
        };
    c.prototype = {
        constructor: c,
        toggle: function (b) {
            var c = a(this),
                f, g;
            if (c.is(".disabled, :disabled")) return;
            return f = e(c), g = f.hasClass("open"), d(), g || f.toggleClass("open"), c.focus(), !1
        },
        keydown: function (b) {
            var c, d, f, g, h, i;
            if (!/(38|40|27)/.test(b.keyCode)) return;
            c = a(this), b.preventDefault(), b.stopPropagation();
            if (c.is(".disabled, :disabled")) return;
            g = e(c), h = g.hasClass("open");
            if (!h || h && b.keyCode == 27) return c.click();
            d = a("[role=menu] li:not(.divider):visible a", g);
            if (!d.length) return;
            i = d.index(d.filter(":focus")), b.keyCode == 38 && i > 0 && i--, b.keyCode == 40 && i < d.length - 1 && i++, ~i || (i = 0), d.eq(i).focus()
        }
    };
    var f = a.fn.dropdown;
    a.fn.dropdown = function (b) {
        return this.each(function () {
            var d = a(this),
                e = d.data("dropdown");
            e || d.data("dropdown", e = new c(this)), typeof b == "string" && e[b].call(d)
        })
    }, a.fn.dropdown.Constructor = c, a.fn.dropdown.noConflict = function () {
        return a.fn.dropdown = f, this
    }, a(document).on("click.dropdown.data-api touchstart.dropdown.data-api", d).on("click.dropdown touchstart.dropdown.data-api", ".dropdown form", function (a) {
        a.stopPropagation()
    }).on("touchstart.dropdown.data-api", ".dropdown-menu", function (a) {
        a.stopPropagation()
    }).on("click.dropdown.data-api touchstart.dropdown.data-api", b, c.prototype.toggle).on("keydown.dropdown.data-api touchstart.dropdown.data-api", b + ", [role=menu]", c.prototype.keydown)
}(window.jQuery)

// facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


(jQuery);
(function ($) {
    function fixTitle(a) {
        if (a.attr("title") || typeof (a.attr("original-title")) != "string") {
            a.attr("original-title", a.attr("title") || "").removeAttr("title")
        }
    }

    function Tipsy(a, b) {
        this.$element = $(a);
        this.options = b;
        this.enabled = true;
        fixTitle(this.$element)
    }
    Tipsy.prototype = {
        show: function () {
            var a = this.getTitle();
            if (a && this.enabled) {
                var b = this.tip();
                b.find(".tipsy-inner")[this.options.html ? "html" : "text"](a);
                b[0].className = "tipsy";
                b.remove().css({
                    top: 0,
                    left: 0,
                    visibility: "hidden",
                    display: "block"
                }).appendTo(document.body);
                var c = $.extend({}, this.$element.offset(), {
                    width: this.$element[0].offsetWidth,
                    height: this.$element[0].offsetHeight
                });
                var d = b[0].offsetWidth,
                    actualHeight = b[0].offsetHeight;
                var e = (typeof this.options.gravity == "function") ? this.options.gravity.call(this.$element[0]) : this.options.gravity;
                var f;
                switch (e.charAt(0)) {
                case "n":
                    f = {
                        top: c.top + c.height + this.options.offset,
                        left: c.left + c.width / 2 - d / 2
                    };
                    break;
                case "s":
                    f = {
                        top: c.top - actualHeight - this.options.offset,
                        left: c.left + c.width / 2 - d / 2
                    };
                    break;
                case "e":
                    f = {
                        top: c.top + c.height / 2 - actualHeight / 2,
                        left: c.left - d - this.options.offset
                    };
                    break;
                case "w":
                    f = {
                        top: c.top + c.height / 2 - actualHeight / 2,
                        left: c.left + c.width + this.options.offset
                    };
                    break
                }
                if (e.length == 2) {
                    if (e.charAt(1) == "w") {
                        f.left = c.left + c.width / 2 - 15
                    } else {
                        f.left = c.left + c.width / 2 - d + 15
                    }
                }
                b.css(f).addClass("tipsy-" + e);
                if (this.options.fade) {
                    b.stop().css({
                        opacity: 0,
                        display: "block",
                        visibility: "visible"
                    }).animate({
                        opacity: this.options.opacity
                    })
                } else {
                    b.css({
                        visibility: "visible",
                        opacity: this.options.opacity
                    })
                }
            }
        },
        hide: function () {
            if (this.options.fade) {
                this.tip().stop().fadeOut(function () {
                    $(this).remove()
                })
            } else {
                this.tip().remove()
            }
        },
        getTitle: function () {
            var a, $e = this.$element,
                o = this.options;
            fixTitle($e);
            var a, o = this.options;
            if (typeof o.title == "string") {
                a = $e.attr(o.title == "title" ? "original-title" : o.title)
            } else {
                if (typeof o.title == "function") {
                    a = o.title.call($e[0])
                }
            }
            a = ("" + a).replace(/(^\s*|\s*$)/, "");
            return a || o.fallback
        },
        tip: function () {
            if (!this.$tip) {
                this.$tip = $('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"/></div>')
            }
            return this.$tip
        },
        validate: function () {
            if (!this.$element[0].parentNode) {
                this.hide();
                this.$element = null;
                this.options = null
            }
        },
        enable: function () {
            this.enabled = true
        },
        disable: function () {
            this.enabled = false
        },
        toggleEnabled: function () {
            this.enabled = !this.enabled
        }
    };
    $.fn.tipsy = function (c) {
        if (c === true) {
            return this.data("tipsy")
        } else {
            if (typeof c == "string") {
                return this.data("tipsy")[c]()
            }
        }
        c = $.extend({}, $.fn.tipsy.defaults, c);

        function get(a) {
            var b = $.data(a, "tipsy");
            if (!b) {
                b = new Tipsy(a, $.fn.tipsy.elementOptions(a, c));
                $.data(a, "tipsy", b)
            }
            return b
        }

        function enter() {
            var a = get(this);
            a.hoverState = "in";
            if (c.delayIn == 0) {
                a.show()
            } else {
                setTimeout(function () {
                    if (a.hoverState == "in") {
                        a.show()
                    }
                }, c.delayIn)
            }
        }

        function leave() {
            var a = get(this);
            a.hoverState = "out";
            if (c.delayOut == 0) {
                a.hide()
            } else {
                setTimeout(function () {
                    if (a.hoverState == "out") {
                        a.hide()
                    }
                }, c.delayOut)
            }
        }
        if (!c.live) {
            this.each(function () {
                get(this)
            })
        }
        if (c.trigger != "manual") {
            var d = c.live ? "live" : "bind",
                eventIn = c.trigger == "hover" ? "mouseenter" : "focus",
                eventOut = c.trigger == "hover" ? "mouseleave" : "blur";
            this[d](eventIn, enter)[d](eventOut, leave)
        }
        return this
    };
    $.fn.tipsy.defaults = {
        delayIn: 0,
        delayOut: 0,
        fade: false,
        fallback: "",
        gravity: "n",
        html: false,
        live: false,
        offset: 0,
        opacity: 1,
        title: "title",
        trigger: "hover"
    };
    $.fn.tipsy.elementOptions = function (a, b) {
        return $.metadata ? $.extend({}, b, $(a).metadata()) : b
    };
    $.fn.tipsy.autoNS = function () {
        return $(this).offset().top > ($(document).scrollTop() + $(window).height() / 2) ? "s" : "n"
    };
    $.fn.tipsy.autoWE = function () {
        return $(this).offset().left > ($(document).scrollLeft() + $(window).width() / 2) ? "e" : "w"
    }
})


(jQuery);
(function ($) {
    $.fn.jsonSuggest = function (g) {
        var h = {
                url: "http://animedroide.com",
                data: [],
                minCharacters: 4,
                maxResults: 9,
                wildCard: "",
                caseSensitive: false,
                notCharacter: "!",
                highlightMatches: false,
                onSelect: callbackSJ,
            },
            getJSONTimeout;
        g = $.extend(h, g);
        return this.each(function () {
            function regexEscape(a, b) {
                var c = ["/", ".", "*", "+", "?", "|", "(", ")", "[", "]", "{", "}", "\\"];
                if (b) {
                    for (var i = 0; i < c.length; i++) {
                        if (c[i] === b) {
                            c.splice(i, 1)
                        }
                    }
                }
                var d = new RegExp("(\\" + c.join("|\\") + ")", "g");
                return a.replace(d, "\\$1")
            }
            var f = $(this),
                wildCardPatt = new RegExp(regexEscape(g.wildCard || ""), "g"),
                results = $("<ul />"),
                currentSelection, pageX, pageY;

            function selectResultItem(a) {
                $(results).html("").hide();
                if (typeof g.onSelect === "function") {
                    g.onSelect(a)
                }
            }

            function setHoverClass(a) {
                $("li a", results).removeClass("ui-state-hover");
                if (a) {
                    $("a", a).addClass("ui-state-hover")
                }
                currentSelection = a
            }

            function buildResults(b, c) {
                c = "(" + c + ")";
                var d = true,
                    i, iFound = 0,
                    filterPatt = g.caseSensitive ? new RegExp(c, "g") : new RegExp(c, "ig");
                $(results).html("").hide();
                for (i = 0; i < b.length; i += 1) {
                    var e = $("<li />"),
                        text = b[i].text;
                    valor = b[i].id;
                    if (g.highlightMatches === true) {
                        text = text.replace(filterPatt, "<strong>$1</strong>")
                    }
                    $(e).append('<a class="ui-all"><div class="ch" id="x' + valor + '" title="' + text + '">' + text + "</div></a>");
                    if (typeof b[i].image === "string") {
                        $(">a", e).prepend('<div class="th"><img src="' + b[i].image + '" /></div>')
                    }
                    if (typeof b[i].date === "string") {
                        $(">a", e).append('<div class="date" title="' + b[i].date + '">' + b[i].date + "</div>")
                    }
                    if (typeof b[i].html === "string") {
                        $(">a", e).append('<div class="html">' + b[i].html + "</div>")
                    }
                    $(e).addClass("itemBox").addClass((d) ? "odd" : "even").attr("role", "menuitem").click((function (n) {
                        return function () {
                            selectResultItem(b[n])
                        }
                    })(i)).mouseover((function (a) {
                        return function () {
                            setHoverClass(a)
                        }
                    })(e));
                    $(results).append(e);
                    d = !d;
                    iFound += 1;
                    if (typeof g.maxResults === "number" && iFound >= g.maxResults) {
                        break
                    }
                }
                if ($("li", results).length > 0) {
                    currentSelection = undefined;
                    $(results).show().css("height", "auto");
                    if ($(results).height() > g.maxHeight) {
                        $(results).css({
                            "overflow": "hidden",
                            "height": g.maxHeight + "px"
                        })
                    }
                }
            }

            function runSuggest(e) {
                var c = function (a) {
                    if (this.value.length < g.minCharacters) {
                        $(results).html("").hide();
                        return false
                    }
                    var b = [],
                        filterTxt = (!g.wildCard) ? regexEscape(this.value) : regexEscape(this.value, g.wildCard).replace(wildCardPatt, ".*"),
                        bMatch = true,
                        filterPatt, i;
                    if (g.notCharacter && filterTxt.indexOf(g.notCharacter) === 0) {
                        filterTxt = filterTxt.substr(g.notCharacter.length, filterTxt.length);
                        if (filterTxt.length > 0) {
                            bMatch = false
                        }
                    }
                    filterTxt = filterTxt || ".*";
                    filterTxt = g.wildCard ? "^" + filterTxt : filterTxt;
                    filterPatt = g.caseSensitive ? new RegExp(filterTxt) : new RegExp(filterTxt, "i");
                    for (i = 0; i < a.length; i += 1) {
                        if (filterPatt.test(a[i].text) === bMatch) {
                            b.push(a[i])
                        }
                    }
                    buildResults(b, filterTxt)
                };
                if (g.data && g.data.length) {
                    c.apply(this, [g.data])
                } else {
                    if (g.url && typeof g.url === "string") {
                        var d = this.value;
                        $(results).html('<li class="itemBox ajaxSearching odd"><a class="ui-all"><div class="th"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" /></div><div class="ch">Buscando...</div></a></li>').show().css("height", "auto");
                        getJSONTimeout = window.clearTimeout(getJSONTimeout);
                        getJSONTimeout = window.setTimeout(function () {
                            $.getJSON(g.url, {
                                q: d
                            }, function (a) {
                                if (a) {
                                    buildResults(a, d)
                                } else {
                                    $(results).html("").hide()
                                }
                            })
                        }, 500)
                    }
                }
            }

            function keyListener(e) {
                switch (e.keyCode) {
                case 13:
                    $(currentSelection).trigger("click");
                    return false;
                case 40:
                    if (typeof currentSelection === "undefined") {
                        currentSelection = $("li:first", results).get(0)
                    } else {
                        currentSelection = $(currentSelection).next().get(0)
                    }
                    setHoverClass(currentSelection);
                    if (currentSelection) {
                        $(results).scrollTop(currentSelection.offsetTop)
                    }
                    return false;
                case 38:
                    if (typeof currentSelection === "undefined") {
                        currentSelection = $("li:last", results).get(0)
                    } else {
                        currentSelection = $(currentSelection).prev().get(0)
                    }
                    setHoverClass(currentSelection);
                    if (currentSelection) {
                        $(results).scrollTop(currentSelection.offsetTop)
                    }
                    return false;
                default:
                    runSuggest.apply(this, [e])
                }
            }
            $(results).addClass("jsonSuggest").attr("role", "listbox").attr("id", "jSearch").css({
                "z-index": 999,
            }).hide();
            f.after(results).keyup(keyListener).keydown(function (e) {
                if (e.keyCode === 9 && currentSelection) {
                    $(currentSelection).trigger("click");
                    return true
                }
            }).blur(function (e) {
                var a = $(results).offset();
                a.bottom = a.top + $(results).height();
                a.right = a.left + $(results).width();
                if (pageY < a.top || pageY > a.bottom || pageX < a.left || pageX > a.right) {
                    $(results).hide()
                }
            }).focus(function (e) {
                $(results).css({

                });
                if ($("li", results).length > 0) {
                    $(results).show()
                }
            }).attr("autocomplete", "off");
            $(window).mousemove(function (e) {
                pageX = e.pageX;
                pageY = e.pageY
            });
            g.notCharacter = regexEscape(g.notCharacter || "");
            if (g.data && typeof g.data === "string") {
                g.data = $.parseJSON(g.data)
            }
        })
    }
})

(jQuery);
$.fn.sweetPages = function (c) {
    if (!c) {
        c = {}
    }
    var d = c.perPage || 3;
    var f = this;
    var g = f.find("li");
    g.each(function () {
        var a = $(this);
        a.data("height", a.outerHeight(true))
    });
    var h = Math.ceil(g.length / d);
    if (h < 2) {
        return this
    }
    var j = $('<div class="swControls">');
    for (var i = 0; i < h; i++) {
        g.slice(i * d, (i + 1) * d).wrapAll('<div class="swPage" />');
        j.append('<a href="javascript:void(0);" class="swShowPage">' + (i + 1) + "</a>")
    }
    f.append(j);
    var k = 0;
    var l = 0;
    var m = f.find(".swPage");
    m.each(function () {
        var a = $(this);
        var b = 0;
        a.find("li").each(function () {
            b += $(this).data("height")
        });
        if (b > k) {
            k = b
        }
        l += a.outerWidth();
        a.css("float", "left").width(f.width())
    });
    m.wrapAll('<div class="swSlider" />');
    f.height(k);
    var n = f.find(".swSlider");
    n.append('<div class="clear" />').width(l);
    var o = f.find("a.swShowPage");
    o.click(function (e) {
        $(this).addClass("active").siblings().removeClass("active");
        n.stop().animate({
            "margin-left": -(parseInt($(this).text()) - 1) * f.width()
        }, "normal");
        e.preventDefault()
    });
    o.eq(0).addClass("active");
    j.css({
        "left": "50%",
        "margin-left": -j.width() / 2
    });
    return this
};




$.fn.tipsy.autoTT = function () {
    return (window.pageYOffset >= "97") ? "n" : "s"
};




$(document).on("ready", function () {
    var j = (iscap === true) ? "?cap" : "";
    $("#generos .generos").sweetPages({
        perPage: 10
    });
    var k = $(".swControls").detach();
    k.appendTo("#generos .generos");
    $.getJSON("/ajax.js" + j, function (f) {
        if (f.status === true) {
            $("nav .right div.load").remove();
            $("nav .right").prepend('<li><img src="' + f.user.pic + '" id="user-pic" width="24" height="24" /><a id="user-link" href="' + f.user.link + '" title="Ver mi perfil (Foro)" target="_blank">' + f.user.nick + '</a></li><div class="btns"><a href="/favoritos" id="favs" title="Ver mis favoritos"></a><a href="javascript:void(0);" id="logout" title="Cerrar sesi&oacute;n"></a></div>');
            if (iscap === true) {
                if (f.isfav === true) {
                    $("#share ul").append('<li id="tofav"><button id="remfav" title="Borrar de mis Favoritos"></button></li>')
                } else {
                    $("#share ul").append('<li id="tofav"><button id="addfav" title="Agregar a mis Favoritos"></button></li>')
                }
            }
        } else {
            $("nav .right div.load").remove();
            $("nav .right").prepend('<li><a href="javascript:void(0);" id="login">Iniciar Sesi&oacute;n</a></li><li><a href="http://animeid.jp/index.php?app=core&module=global&section=register" target="_blank">Reg&iacute;strate</a></li>')
        }
        var g = f.ads;
        $(".dia").each(function () {
            var a = $(this).children("article").size();
            var b = g[Math.floor(Math.random() * g.length)];
            var c = '<article><a href="' + b.href + '" target="_blank"><header>' + b.text + '</header><figure><img src="' + b.img + '" /></figure><div class="mask"></div><aside>Ads</aside></a></article>';
            var d = g[Math.floor(Math.random() * g.length)];
            var e = '<article><a href="' + d.href + '" target="_blank"><header>' + d.text + '</header><figure><img src="' + d.img + '" /></figure><div class="mask"></div><aside>Ads</aside></a></article>';
            if (a == 2 || a == 5) {
                $(this).append(c)
            }
            if (a == 1 || a == 4) {
                $(this).prepend(e).append(c)
            }
        })
    });
	
	// pone la imagen vacia a los thumbs
    $(".topfive img.minithumb").each(function () {
        var b = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNXG14zYAAAAWdEVYdENyZWF0aW9uIFRpbWUAMDkvMjUvMTIxTlGMAAABWElEQVRYhe3SP0vDQBgG8OdNHEutKE4S2jl/6NCWdhIcRZRM3ULiDX4A+ymKHZwdssQvkE+gQtOhW3sZCxlcBB1KnBriuSgU9/M65IFb7/ndvS8VRSHm8/nnbDaLOeeLMAyXkJggCGzLspzBYHDZ7XZrlCRJHkXR7Wg0WhuG0dB1XcgElGVJWZatx+Pxvu/7dzSZTB5d141brVYJ4AnABwBZCAJwDOB0tVppcRxfaJzzhWEYDQAvAN4lluPn7jcAz81ms56m6ZIAnAshTgA8SC7fjgaAEdGr9kf3X/nalihNBfgFbBR0b7YBhQJAsVOAagTKAdUIlAOqEaj4gd3aAeWAagmrH1AHCILAVlAOItIZY45mWZZDRHUFhgPTNG1Mp9Pc87xrAIcANCEEZB4AOoCj4XB4kyRJvtfr9WpEdN9ut8/SNF0S0ULmsxljjmmadr/fv+p0OrVvDnrOauBFVV4AAAAASUVORK5CYII=";
 
        if ($(this).hasClass("thumb")) {
            $(this).attr({
                "src": b
            })
        }
    });
	

    $("#navsearch").jsonSuggest();
});

function callbackSJ(a) {
    if (a.link) {
        document.location.href = a.link
    }
}



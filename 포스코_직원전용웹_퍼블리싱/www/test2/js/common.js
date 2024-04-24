(function (window) {
    var target = document.querySelector(".nav-bar");
    var navigation = document.querySelectorAll(".ly-gnb a");

    function gnbHoverEffect() {
        for (var i = 0; i < navigation.length; i++) {
            navigation[i].addEventListener("click", mouseClicked);
            console.log("aaaa1");
        }
    }

    function loadedMenuOn() {
        for (var i = 0; i < navigation.length; i++) {
            if (navigation[i].parentNode.classList.contains("on")) {
                var width = navigation[i].getBoundingClientRect().width;
                var left = navigation[i].getBoundingClientRect().left;
                target.style.width = Math.ceil(width) + "px";
                target.style.left = Math.ceil(left) + "px";
                target.style.transition = "all 0.2s ease-out";
                console.log("aaaa2");
            }
        }
    }

    function mouseClicked(e) {
        if (!this.parentNode.classList.contains("on")) {
            for (var i = 0; i < navigation.length; i++) {
                if (navigation[i].parentNode.classList.contains("on")) {
                    navigation[i].parentNode.classList.remove("on");
                    console.log("aaaa3");
                }
            }
        }
        if (e.target.dataset.target === "true") {
            var width = this.getBoundingClientRect().width;
            var left = this.getBoundingClientRect().left;
            target.style.width = Math.ceil(width) + "px";
            target.style.left = Math.ceil(left) + "px";
            target.style.transition = "all 0.2s ease-out";
            console.log("aaaa4");
        }
    }

    function resizeFunc() {
        const on = document.querySelector("nav li.on");

        if (on) {
            setTimeout(function () {
                var left = on.getBoundingClientRect().left;
                target.style.left = Math.ceil(left) + "px";
                target.style.transition = "all 0.2s ease-out";
                console.log("aaaa5");
            }, 400);
        }
    }

    function customSelect() {
        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /* For each element, create a new DIV that will act as the selected item: */
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /* For each element, create a new DIV that will contain the option list: */
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /* For each option in the original select element,
    create a new DIV that will act as an option item: */
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function (e) {
                    /* When an item is clicked, update the original select box,
        and the selected item: */
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function (e) {
                /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /* A function that will close all select boxes in the document,
  except the current select box: */
            var x,
                y,
                i,
                xl,
                yl,
                arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i);
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }

        document.addEventListener("click", closeAllSelect);
    }

    function sideToggle() {
        var button = document.querySelector(".side-toggle button");
        var side = document.querySelector(".ly-side");
        var toggle = document.querySelector(".side-toggle");
        var wrapper = document.querySelector(".ly-wrapper");
        // console.log(button);
        if(button){
        button.addEventListener("click", function () {
            side.classList.toggle("slide");
            toggle.classList.toggle("slide");
            wrapper.classList.toggle("slide");
            setTimeout(function () {
                $("#TB_S70_SUGK170").setGridWidth($("#TB_S70_SUGK170_CONTAINER").width(), true);
                $("#TB_S70_SUGT030").setGridWidth($("#TB_S70_SUGT030_CONTAINER").width(), true);
                $("#S700201A010_jqGrid_view0").setGridWidth($("#S700201A010_jqGrid_container0").width(), true);
                $("#S700101A010_jqGrid_view1").setGridWidth($("#S700101A010_jqGrid_container1").width(), true);
                $("#S700101A010_jqGrid_view2").setGridWidth($("#S700101A010_jqGrid_container2").width(), true);
                $("#S700101A010_jqGrid_view3").setGridWidth($("#S700101A010_jqGrid_container3").width(), true);
                $("#S700101A010_jqGrid_view4").setGridWidth($("#S700101A010_jqGrid_container4").width(), true);
                $("#S700101A010_jqGrid_view5").setGridWidth($("#S700101A010_jqGrid_container5").width(), true);
                $("#S700101A010_jqGrid_view6").setGridWidth($("#S700101A010_jqGrid_container6").width(), true);
                $("#S700101A010_jqGrid_view7").setGridWidth($("#S700101A010_jqGrid_container7").width(), true);
                $("#S700101A010_jqGrid_view8").setGridWidth($("#S700101A010_jqGrid_container8").width(), true);
                $("#S700101A010_jqGrid_view9").setGridWidth($("#S700101A010_jqGrid_container9").width(), true);
                $("#S700101A010_jqGrid_view10").setGridWidth($("#S700101A010_jqGrid_container10").width(), true);
                $("#S700101A010_jqGrid_view11").setGridWidth($("#S700101A010_jqGrid_container11").width(), true);
                $("#S700101A010_jqGrid_view12").setGridWidth($("#S700101A010_jqGrid_container12").width(), true);
                $("#S700101A010_jqGrid_view13").setGridWidth($("#S700101A010_jqGrid_container13").width(), true);
                $("#S700101A010_jqGrid_view14").setGridWidth($("#S700101A010_jqGrid_container14").width(), true);
                $("#S700101A010_jqGrid_view15").setGridWidth($("#S700101A010_jqGrid_container15").width(), true);
                $("#S700101A010_jqGrid_view16").setGridWidth($("#S700101A010_jqGrid_container16").width(), true);
                $("#S700203A030_jqGrid_view1").setGridWidth($("#S700203A030_jqGrid_container1").width(), true);
                $("#S700203A030_jqGrid_view2").setGridWidth($("#S700203A030_jqGrid_container2").width(), true);
                $("#S700203A030_jqGrid_view3").setGridWidth($("#S700203A030_jqGrid_container3").width(), true);
        				$("#S700201A010_jqGrid_view2").setGridWidth($("#S700201A010_jqGrid_container2").width(), true);
                $("#S700201A010_jqGrid_view3").setGridWidth($("#S700201A010_jqGrid_container3").width(), true);
                $("#S700201A010_jqGrid_view1").setGridWidth($("#S700201A010_jqGrid_container1").width(), true);
                $("#S700203A030_jqGrid_view4").setGridWidth($("#S700203A030_jqGrid_container4").width(), true);
                $("#S700203A030_jqGrid_view0").setGridWidth($("#S700203A030_jqGrid_container0").width(), true);
                $("#S700201A010_jqGrid_view5").setGridWidth($("#S700201A010_jqGrid_container5").width(), true);
                $("#S700201A010_jqGrid_view6").setGridWidth($("#S700201A010_jqGrid_container6").width(), true);
                $("#S700201A010_jqGrid_view7").setGridWidth($("#S700201A010_jqGrid_container7").width(), true);
                $("#S700201A010_jqGrid_view8").setGridWidth($("#S700201A010_jqGrid_container8").width(), true);
                $("#S700201A010_jqGrid_view4").setGridWidth($("#S700201A010_jqGrid_container4").width(), true);
                $("#S700303A010_jqGrid_view1").setGridWidth($("#S700303A010_jqGrid_container1").width(), false);

                // $(".swiper-container").css({"width":"100%"});
                const swiper = document.querySelector('.swiper-container').swiper;

                swiper.update();
            }, 500);
        });
        }
    }

    function headBoxToggle() {
        var button = document.querySelector(".box-toggle button");
        var headBox = document.querySelector(".ly-box");
        // console.log(button);
        if(button){
          button.addEventListener("click", function () {
              headBox.classList.toggle("slide");
              button.classList.toggle("slide");
          });
        }
    }

    window.addEventListener("resize", resizeFunc);

    var init = function () {
        gnbHoverEffect();
        customSelect();
        setTimeout(function () {
            loadedMenuOn();
        }, 400);
        headBoxToggle();
        sideToggle();
        // console.log('aaa');
    };
    document.addEventListener("DOMContentLoaded", init(), false);
})(window);

(function (window) {
    var target = document.querySelector(".nav-bar");
    var navigation = document.querySelectorAll(".ly-gnb a");

    function gnbHoverEffect() {
        for (var i = 0; i < navigation.length; i++) {
            navigation[i].addEventListener("click", mouseClicked);
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
            }
        }
    }

    function mouseClicked() {
        if (!this.parentNode.classList.contains("on")) {
            for (var i = 0; i < navigation.length; i++) {
                if (navigation[i].parentNode.classList.contains("on")) {
                    navigation[i].parentNode.classList.remove("on");
                }
            }
            this.parentNode.classList.add("on");
        }
        var width = this.getBoundingClientRect().width;
        var left = this.getBoundingClientRect().left;
        target.style.width = Math.ceil(width) + "px";
        target.style.left = Math.ceil(left) + "px";
        target.style.transition = "all 0.2s ease-out";
    }

    function resizeFunc() {
        const on = document.querySelector("nav li.on");

        if (on) {
            setTimeout(function () {
                var left = on.getBoundingClientRect().left;
                target.style.left = Math.ceil(left) + "px";
                target.style.transition = "all 0.2s ease-out";
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

    window.addEventListener("resize", resizeFunc);

    var init = function () {
        gnbHoverEffect();
        customSelect();
        setTimeout(function () {
            loadedMenuOn();
        }, 400);
    };
    document.addEventListener("DOMContentLoaded", init(), false);
})(window);

function initSparkline() {
    $(".sparkline").each(function () {
        var t = $(this);
        t.sparkline("html", t.data());
    }),
        $(".bh_visitors").sparkline("html", {
            type: "bar",
            height: "42px",
            barColor: "#a27ce6",
            barWidth: 5,
        }),
        $(".bh_visits").sparkline("html", {
            type: "bar",
            height: "42px",
            barColor: "#3eacff",
            barWidth: 5,
        }),
        $(".bh_chats").sparkline("html", {
            type: "bar",
            height: "42px",
            barColor: "#50d38a",
            barWidth: 5,
        });
}
function skinChanger() {
    $(".choose-skin li").on("click", function () {
        var t = $("body"),
            e = $(this),
            i = $(".choose-skin li.active").data("theme");
        $(".choose-skin li").removeClass("active"),
            t.removeClass("theme-" + i),
            e.addClass("active"),
            t.addClass("theme-" + e.data("theme"));
    });
}
$(function () {
    "use strict";
    skinChanger(),
        initSparkline(),
        setTimeout(function () {
            $(".page-loader-wrapper").fadeOut();
        }, 50);
}),
    $(document).ready(function () {
        $(".main-menu").metisMenu(),
            $(".cwidget-scroll").slimScroll({
                height: "263px",
                wheelStep: 10,
                touchScrollStep: 50,
                color: "#efefef",
                size: "2px",
                borderRadius: "3px",
                alwaysVisible: !1,
                position: "right",
            }),
            $(".btn-toggle-fullwidth").on("click", function () {
                $("body").hasClass("layout-fullwidth")
                    ? $("body").removeClass("layout-fullwidth")
                    : $("body").addClass("layout-fullwidth"),
                    $(this)
                        .find(".fa")
                        .toggleClass("fa-arrow-left fa-arrow-right");
            }),
            $(".btn-toggle-offcanvas").on("click", function () {
                $("body").toggleClass("offcanvas-active");
            }),
            $("#main-content").on("click", function () {
                $("body").removeClass("offcanvas-active");
            }),
            $(".dropdown").on("show.bs.dropdown", function () {
                $(this)
                    .find(".dropdown-menu")
                    .first()
                    .stop(!0, !0)
                    .animate({ top: "100%" }, 200);
            }),
            $(".dropdown").on("hide.bs.dropdown", function () {
                $(this)
                    .find(".dropdown-menu")
                    .first()
                    .stop(!0, !0)
                    .animate({ top: "80%" }, 200);
            }),
            $('.navbar-form.search-form input[type="text"]')
                .on("focus", function () {
                    $(this).animate({ width: "+=50px" }, 300);
                })
                .on("focusout", function () {
                    $(this).animate({ width: "-=50px" }, 300);
                }),
            0 < $('[data-toggle="tooltip"]').length &&
                $('[data-toggle="tooltip"]').tooltip(),
            0 < $('[data-toggle="popover"]').length &&
                $('[data-toggle="popover"]').popover(),
            $(window).on("load", function () {
                $("#main-content").height() < $("#left-sidebar").height() &&
                    $("#main-content").css(
                        "min-height",
                        $("#left-sidebar").innerHeight() -
                            $("footer").innerHeight()
                    );
            }),
            $(window).on("load resize", function () {
                $(window).innerWidth() < 420
                    ? $(".navbar-brand logo.svg").attr(
                          "src",
                          "../assets/images/logo-icon.svg"
                      )
                    : $(".navbar-brand logo-icon.svg").attr(
                          "src",
                          "../assets/images/logo.svg"
                      );
            });
    }),
    ($.fn.clickToggle = function (e, i) {
        return this.each(function () {
            var t = !1;
            $(this).bind("click", function () {
                return t
                    ? ((t = !1), i.apply(this, arguments))
                    : ((t = !0), e.apply(this, arguments));
            });
        });
    }),
    $(".select-all").on("click", function () {
        this.checked
            ? $(this)
                  .parents("table")
                  .find(".checkbox-tick")
                  .each(function () {
                      this.checked = !0;
                  })
            : $(this)
                  .parents("table")
                  .find(".checkbox-tick")
                  .each(function () {
                      this.checked = !1;
                  });
    }),
    $(".checkbox-tick").on("click", function () {
        $(this).parents("table").find(".checkbox-tick:checked").length ==
        $(this).parents("table").find(".checkbox-tick").length
            ? $(this).parents("table").find(".select-all").prop("checked", !0)
            : $(this).parents("table").find(".select-all").prop("checked", !1);
    });
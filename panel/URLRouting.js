var urlRoute = {
    baseUrl: "",
    folderUrl: "",
    previousUrl: "",
    currentUrl: "",
    runOn: function() {

    },
    previousCode: "",
    folderUrl: function(e) {
        return this.folderUrl = e, this
    },
    setBaseUrl: function(e) {
        return this.baseUrl = e + "/", this
    },
    setPreviousUrl: function(e) {
        return this.previousUrl = e, this
    },
    setPreviousCode: function(e) {
        return this.previousCode = e, this
    },
    getRun: function() {
      return this.runOn;
    },
    getBaseUrl: function() {
        return this.baseUrl
    },
    setRunJS: function(e) {
        return this.runOn = e, this
    },
    checkCurrent: function(e) {
        if (this.baseUrl != document.URL) {
            document.URL;
            var t = document.URL.replace("https://imaginears.club/hub/panel/", "");
            this.loadPage(t);
        } else this.loadPage("Hub.Dashboard")
    },
    loadPage: function(e) {

        "/" != e.substring(0, 1) && (e = "/" + e), pathGlobal = e;
        console.log(e);
        if (e == "/") {
          e = "/Hub.Dashboard";
        }
        var t = e.split("."),
            o = t[1].split("?");
        if (null == o[1]) r = "Hub";
        else var r = o[1];
        var l = this.baseUrl + "Pages" + t[0] + "/" + o[0] + ".php?" + r;
        var r = "Pages" + t[0] + "/" + o[0] + ".php";
        $("#content").addClass("loading"), urlRoute.loadPageContent(l, `${t[0]}.${o[0]}`, r), "function" == typeof destroy && destroy(), window.history.pushState(null, null, this.folderUrl + e)
    },
    loadPageContent: function(e, o, r) {
        this.runOn = function run() {};
        $.ajax({
            url: 'scripts/testPage.php?page=' + r,
            type: "get",
            success: function(re) {
                if (re == 'true') {
                  urlRoute.currentUrl = e, urlRoute.getBaseUrl(), $.ajax({
                      url: e,
                      type: "get",
                      success: function(e) {
                          this.setPreviousCode = o;
                          $("#content").removeClass("loading").html(e);
                          $("body").removeClass("page-sidebar-visible");
                      },
                      error: function() {
                          urlRoute.pageError();
                      }
                  });
                } else {
                  urlRoute.pageError();
                }
            },
            error: function() {
                urlRoute.pageError();
            }
        });
    },
    pageError: function() {
      urlRoute.loadPage("Hub.Dashboard")
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["error"]("That page does not exist!", "Unknown Page")
    }
};
$("body").on("click", "a", function(e) {
    if (e.preventDefault(), $(this).hasClass("web-page")) urlRoute.loadPage($(this).attr("href"));
    else if ("modal" == $(this).attr("data-toggle")) $(".modal-backdrop").remove();
    else {
        var t = $(this).attr("href");
        t && "#" !== t && (console.log("1"), "#" !== t.substring(0, 1) && (console.log("2"), "" !== t && window.open(t, "_blank")))
    }
}), window.onpopstate = function(e) {
    var t = document.URL.replace("https://imaginears.club/hub/panel/", "");
    if (t == null) {
      urlRoute.loadPage("Hub.Dashboard")
    } else {
      urlRoute.loadPage(t)
    }
};

// alert('hellow word');

(function ($) {
    $(".popup-img").each(function () {
        var img = $(this).find("img").attr("src");
        $(this).attr("href", img);
    });
})(jQuery);
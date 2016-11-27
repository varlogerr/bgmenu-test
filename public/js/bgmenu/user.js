var bgmenu = (function (bgmenu, $) {
    bgmenu.user = (function (user) {
        user.getAll = function () {
            $.ajax('/api/users', {
                dataType : 'json',
                method   : 'GET',
                contentType : 'application/json; utf-8'
            })
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (error) {
                    // TODO
                });
        };

        return user;
    }(bgmenu.user || {}));

    return bgmenu;
}(bgmenu || {}, jQuery));

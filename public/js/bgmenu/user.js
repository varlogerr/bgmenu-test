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

        user.create = function (data) {
            $.ajax('/api/users', {
                dataType : 'json',
                method   : 'POST',
                data     : data,
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

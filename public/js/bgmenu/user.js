var bgmenu = (function (bgmenu, requester) {
    bgmenu.user = (function (user) {
        user.getAll = function () {
            return requester.get('/api/users')
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (error) {
                    // TODO
                });
        };

        user.create = function (data) {
            return requester.post('/api/users', data)
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
}(bgmenu || {}, bgmenu.lib.request));

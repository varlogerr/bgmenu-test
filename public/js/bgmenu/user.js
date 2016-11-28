var bgmenu = (function (bgmenu, requester) {
    bgmenu.user = (function (user) {
        user.list = function () {
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

        user.login = function (data) {
            return requester.post('/api/login', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (error) {
                    // TODO
                });
        };

        user.delete = function (id) {
            return requester.delete('/api/users/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (error) {
                    // TODO
                });
        };

        user.update = function (id, data) {
            return requester.put('/api/users/' + id, data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (error) {
                    // TODO
                });
        };

        user.show = function (id) {
            return requester.get('/api/users/' + id)
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

var bgmenu = (function (bgmenu, requester) {
    bgmenu.user = (function (user) {
        user.list = function () {
            return requester.get('/api/users')
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        user.create = function (data) {
            return requester.post('/api/users', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        user.login = function (data) {
            return requester.post('/api/login', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        user.delete = function (id) {
            return requester.delete('/api/users/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        user.update = function (id, data) {
            return requester.put('/api/users/' + id, data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        user.show = function (id) {
            return requester.get('/api/users/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        return user;
    }(bgmenu.user || {}));

    return bgmenu;
}(bgmenu || {}, bgmenu.lib.request));

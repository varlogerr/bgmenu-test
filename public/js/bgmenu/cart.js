var bgmenu = (function (bgmenu, requester) {
    bgmenu.cart = (function (cart) {
        cart.add = function (data) {
            return requester.post('/api/orders', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        cart.list = function () {
            return requester.get('/api/orders')
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        cart.show = function (id) {
            return requester.get('/api/orders/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        cart.changeStatus = function (hash, status) {
            return requester.put('/api/orders/' + hash, {status : status})
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        return cart;
    }(bgmenu.cart || {}));

    return bgmenu;
}(bgmenu || {}, bgmenu.lib.request));

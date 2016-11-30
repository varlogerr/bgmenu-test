var bgmenu = (function (bgmenu, requester) {
    bgmenu.cart = (function (cart) {
        cart.add = function (data) {
            return requester.post('/api/orders', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function () {
                    console.log('Error');
                });
        };

        cart.list = function () {
            return requester.get('/api/orders')
                .done(function (data) {
                    console.log(data);
                })
                .fail(function () {
                    console.log('Error');
                });
        };

        cart.show = function (id) {
            return requester.get('/api/orders/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function () {
                    console.log('Error');
                });
        };

        return cart;
    }(bgmenu.cart || {}));

    return bgmenu;
}(bgmenu || {}, bgmenu.lib.request));

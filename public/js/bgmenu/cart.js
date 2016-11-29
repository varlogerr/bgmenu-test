var bgmenu = (function (bgmenu, requester) {
    bgmenu.cart = (function (cart) {
        cart.add = function (data) {
            requester.post('/api/orders', data)
                .done(function (data) {

                })
                .fail(function () {
                    console.log('Error');
                });
        };

        return cart;
    }(bgmenu.cart || {}));

    return bgmenu;
}(bgmenu || {}, bgmenu.lib.request));
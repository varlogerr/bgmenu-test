var bgmenu = (function (bgmenu, requester) {
    bgmenu.product = (function (product) {
        product.create = function (data) {
            return requester.post('/api/products', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function () {
                    // TODO
                });
        };

        product.list = function () {
            return requester.get('/api/products')
                .done(function (data) {
                    console.log(data);
                })
                .fail(function () {
                    // TODO
                });
        };

        return product;
    }(bgmenu.product || {}));

    return bgmenu;
}(bgmenu || {}, bgmenu.lib.request));

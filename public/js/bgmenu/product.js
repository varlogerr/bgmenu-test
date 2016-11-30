var bgmenu = (function (bgmenu, requester) {
    bgmenu.product = (function (product) {
        product.create = function (data) {
            return requester.post('/api/products', data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        product.list = function () {
            return requester.get('/api/products')
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        product.delete = function (id) {
            return requester.delete('/api/products/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        product.show = function (id) {
            return requester.get('/api/products/' + id)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        product.update = function (id, data) {
            return requester.put('/api/products/' + id, data)
                .done(function (data) {
                    console.log(data);
                })
                .fail(function (xhr, status, error) {
                    console.log("error: " + xhr.responseText);
                });
        };

        return product;
    }(bgmenu.product || {}));

    return bgmenu;
}(bgmenu || {}, bgmenu.lib.request));

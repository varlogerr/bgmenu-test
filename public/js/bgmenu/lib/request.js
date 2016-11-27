var bgmenu = (function (bgmenu, $) {
    bgmenu.lib = (function (lib) {
        lib.request = (function (request) {
            /**
             * Make get request and return promise
             *
             * @param url
             * @param data
             */
            request.get = function (url, data) {
                var settings = {
                    dataType : 'json',
                    method   : 'GET',
                    contentType : 'application/json; utf-8'
                };

                if (typeof data !== 'undefined') {
                    $.extend(settings, {data : data});
                }

                return $.ajax(url, settings);
            };

            request.post = function (url, data) {
                var settings = {
                    dataType : 'json',
                    method   : 'POST',
                    contentType : 'application/json; utf-8'
                };

                if (typeof data !== 'undefined') {
                    $.extend(settings, {data : data});
                }

                return $.ajax(url, settings);
            };

            return request;
        }(lib.request || {}));

        return lib;
    }(bgmenu.lib || {}));

    return bgmenu;
}(bgmenu || {}, jQuery));

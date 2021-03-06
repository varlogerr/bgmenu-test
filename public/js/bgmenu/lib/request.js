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
                return this.makeRequest('GET', url, data);
            };

            /**
             * Make post request and return promise
             *
             * @param url
             * @param data
             */
            request.post = function (url, data) {
                return this.makeRequest('POST', url, data);
            };

            /**
             * Make delete request and return promise
             *
             * @param url
             * @param data
             */
            request.delete = function (url, data) {
                return this.makeRequest('DELETE', url, data);
            };

            /**
             * Make put request and return promise
             *
             * @param url
             * @param data
             */
            request.put = function (url, data) {
                return this.makeRequest('PUT', url, data);
            };

            /**
             * Make ajax request
             *
             * @param method
             * @param url
             * @param data
             */
            request.makeRequest = function (method, url, data) {
                var settings = {
                    dataType : 'json',
                    method   : method,
                    contentType : 'application/json; charset=utf-8'
                };

                if (typeof data !== 'undefined') {
                    settings.data = JSON.stringify(data);
                }

                return $.ajax(url, settings);
            };

            return request;
        }(lib.request || {}));

        return lib;
    }(bgmenu.lib || {}));

    return bgmenu;
}(bgmenu || {}, jQuery));

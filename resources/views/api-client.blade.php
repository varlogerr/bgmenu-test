<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>BGMenu Client</title>
    </head>
    <body>

        <h1>Client usage</h1>
        <p>Press F12 and switch to console and use JS models baked for you. Each model "method" returns a promise, so you can handle errors and results.</p>
        <h2>User</h2>
        <h3>Create a user</h3>
        <code>bgmenu.user.create({email: "wanna eat some spam?", name: "pick a name", phone: "our assassin will contact you", password: "don't forget about qwerty"});</code>
        <h3>List users</h3>
        <code>bgmenu.user.list();</code>
        <h3>Show user</h3>
        <code>bgmenu.user.show(user_id here, can take one from bgmenu.user.list());</code>
        <h3>Login</h3>
        <code>bgmenu.user.login({email: "your email please", password: "your qwerty"});</code>
        <h3>Update user</h3>
        <code>bgmenu.user.update(user_id, {name: "...", password: "...", phone: "..."}); // email is immutable</code>
        <h3>Delete user</h3>
        <code>bgmenu.user.delete(user_id);</code>

        <h2>Product</h2>
        <h3>Create</h3>
        <code>
            Price should be in format /^\d{1,7}\.\d{2}$/, available dates Y-m-d
            <br>
            bgmenu.product.create({name: "...", description: "...", price: "...", amount: "...", available_from: "...", available_to: "..."});
        </code>
        <h3>List</h3>
        <code>bgmenu.product.list();</code>
        <h3>Show</h3>
        <code>bgmenu.product.show(product_id || product_slug);</code>
        <h3>Delete</h3>
        <code>bgmenu.product.delete(product_id || product_slug);</code>
        <h3>Update</h3>
        <code>bgmenu.product.update(product_id, {...}); // for object in the second param see demo of create</code>

        <h2>Order</h2>
        <h3>Create cart / add product to non-checkedout cart</h3>
        <code>bgmenu.product.cart({product_id: "...", quantity: "..."});</code>
        <h3>List</h3>
        <code>bgmenu.product.list();</code>
        <h3>Show</h3>
        <code>bgmenu.product.show(order_hash);</code>
        <h3>Change status</h3>
        <code>
            // status rules: 'new' can be changed only to 'processing' or 'cancelled'. 'processing' can be changed only to 'completed'
            <br>
            // 'cancelled' and 'completed' statuses are unchangable
            <br>
            bgmenu.product.show(order_hash, status);
        </code>


        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ URL::asset('js/bgmenu/lib/request.js') }}"></script>
        <script src="{{ URL::asset('js/bgmenu/user.js') }}"></script>
        <script src="{{ URL::asset('js/bgmenu/product.js') }}"></script>
        <script src="{{ URL::asset('js/bgmenu/cart.js') }}"></script>
    </body>
</html>

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/custom_order', [
    'uses' => 'ProductController@getCustomOrder',
    'as' => 'product.custom_order'
]);

Route::post('/custom_order', [
    'uses' => 'ProductController@postCustomOrder',
    'as' => 'product.custom_order'
]);

Route::get('/xyz', [
    'uses' => 'ProductController@getIndexX',
    'as' => 'product.indexX'
]);

Route::get('/product/{id}', [
    'uses' => 'ProductController@showItem',
    'as' => 'product.show'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout',
    'middleware' => 'auth'
]);

Route::get('/contact', [
    'uses' => 'ProductController@getContact',
    'as' => 'product.contact'
]);

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postRegUser',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);

        Route::get('/reset_pass', [
            'uses' => 'UserController@getResetPass',
            'as' => 'user.resetPass'
        ]);

        Route::post('/reset_pass', [
            'uses' => 'UserController@postResetPass',
            'as' => 'user.resetPass'
        ]);
    });

    Route::group(['middleware' => ['auth', 'user']], function () {
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/profile/vieworders', [
            'uses' => 'UserController@viewOrders',
            'as' => 'user.orders'
        ]);

        Route::get('/add-to-cart/{id}', [
            'uses' => 'ProductController@getAddToCart',
            'as' => 'product.addToCart'
        ]);

        Route::get('/remove_item/{count}/{rowid}/{curcount?}', [
            'uses' => 'ProductController@getRemoveFromCart',
            'as' => 'product.RemoveFromCart'
        ]);

        Route::get('/plus_item/{rowid}/{curcount}', [
            'uses' => 'ProductController@getPlusOneCart',
            'as' => 'product.PlusOneCart'
        ]);

        Route::post('/changeCart', function (\Illuminate\Http\Request $request) {
            return response()->json(['message' => $request['_token']]);
        })->name('changeCart');

        Route::get('/cart', [
            'uses' => 'ProductController@getCart',
            'as' => 'user.getCart'
        ]);

        Route::get('/checkout/{id}', [
            'uses' => 'ProductController@checkout',
            'as' => 'user.checkout'
        ]);

        Route::post('/checkout/{id}', [
            'uses' => 'ProductController@postcheckout',
            'as' => 'user.checkout'
        ]);

        Route::post('/editinfo', [
            'uses' => 'UserController@postEditInfo',
            'as' => 'user.editinfo'
        ]);

        Route::get('paywithpaypal/{id}', array('as' => 'addmoney.paywithpaypal', 'uses' => 'AddMoneyController@postPaymentWithpaypal',));

        //Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal', 'uses' => 'AddMoneyController@payWithPaypal',));
        Route::post('paypal', array('as' => 'addmoney.paypal', 'uses' => 'AddMoneyController@postPaymentWithpaypal',));
        Route::get('paypal', array('as' => 'payment.status', 'uses' => 'AddMoneyController@getPaymentStatus',));

    });
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [
        'uses' => 'AdminController@getIndex',
        'as' => 'admin.index',
    ]);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/reports', [
            'uses' => 'AdminController@getReports',
            'as' => 'admin.reports',
        ]);

        Route::get('/additems', [
            'uses' => 'AdminController@getAdditems',
            'as' => 'admin.additems',
        ]);

        Route::post('/additems', [
            'uses' => 'AdminController@postAdditems',
            'as' => 'admin.additems',
        ]);

        Route::post('/signup', [
            'uses' => 'AdminController@postRegUser',
            'as' => 'admin.reguser'
        ]);

        Route::post('/remove_user', [
            'uses' => 'AdminController@postRemoveUser',
            'as' => 'admin.rmvuser'
        ]);

        Route::get('/user_history', [
            'uses' => 'AdminController@getUserHistory',
            'as' => 'admin.getUserHistory'
        ]);

        Route::post('/edit_items', [
            'uses' => 'AdminController@postEditItem',
            'as' => 'admin.editItems'
        ]);

        Route::get('/edit_item', [
            'uses' => 'AdminController@getEditItem',
            'as' => 'admin.geteditItem'
        ]);

        Route::post('/edit_item', [
            'uses' => 'AdminController@postRemoveItem',
            'as' => 'admin.RemoveItem'
        ]);

        Route::get('/change_available', [
            'uses' => 'AdminController@getAvailability',
            'as' => 'admin.getAvailability'
        ]);

        //xoxoxoxo

        Route::get('/current_orders', [
            'uses' => 'AdminController@getCurrentOrders',
            'as' => 'admin.getCurrentOrders'
        ]);

        Route::get('/item_list', [
            'uses' => 'AdminController@getItems',
            'as' => 'admin.getItems'
        ]);

        Route::get('/pending_orders', [
            'uses' => 'AdminController@getPendingOrders',
            'as' => 'admin.getPendingOrders'
        ]);


        // xoxoxoxo
        Route::post('/view_sal', [
            'uses' => 'AdminController@salaryCalc',
            'as' => 'admin.view_sal'
        ]);
        Route::get('/calc_sal/{id}', [
            'uses' => 'AdminController@getSalary',
            'as' => 'admin.calc_sal'
        ]);


        Route::post('/syncNoti', [
            'uses' => 'AdminController@syncData',
            'as' => 'sync_noti'
        ]);

        Route::post('/syncEarning', [
            'uses' => 'AdminController@syncEarning',
            'as' => 'sync_earning'
        ]);

    });

});

Route::group(['middleware' => ['auth', 'cashier']], function () {
    Route::get('/cashier', [
        'uses' => 'CashierController@getIndex',
        'as' => 'cashier.index',
    ]);
});

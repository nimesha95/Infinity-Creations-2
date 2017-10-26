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

        Route::get('/cart', [
            'uses' => 'ProductController@getCart',
            'as' => 'user.getCart'
        ]);

        Route::get('/checkout', [
            'uses' => 'ProductController@checkout',
            'as' => 'user.checkout'
        ]);

        Route::post('/editinfo', [
            'uses' => 'UserController@postEditInfo',
            'as' => 'user.editinfo'
        ]);

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

        Route::post('/edit_item', [
            'uses' => 'AdminController@postEditItem',
            'as' => 'admin.editItem'
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

    });

});

Route::group(['middleware' => ['auth', 'cashier']], function () {
    Route::get('/cashier', [
        'uses' => 'CashierController@getIndex',
        'as' => 'cashier.index',
    ]);
});

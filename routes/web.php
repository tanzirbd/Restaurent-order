<?php



Route::get('/','TomatoController@homeIndex');
Route::get('/menu','TomatoController@menu');
Route::get('/shop','TomatoController@shop');
Route::get('/product-details/{id}','TomatoController@productDetails');
Route::get('/reservation','TomatoController@reservation');
Route::get('/about','TomatoController@about');
Route::post('/make-reservation', 'TomatoController@makeReservation');

Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/show-cart', 'CartController@showCart');
Route::get('/delete-cart-product/{rowId}', 'CartController@deleteCartProduct');
Route::post('/update-cart-product', 'CartController@updateCartProduct');
Route::get('/order-now', 'OrderController@orderNow');

Route::post('/new-order', 'OrderController@newOrderInfo');







//Backend Controller

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/homeV2', 'HomeController@homeV2');
Route::get('/reservation-details', 'HomeController@reservationDetails');
Route::get('/order-details', 'HomeController@orderDetails');


Route::get('/forms/mainmenu', 'MainmenuController@index');
Route::post('/forms/mainmenu/mainmenu-add', 'MainmenuController@saveMainmenuInfo');
Route::get('/forms/mainmenu/mainmenu-unpublish/{id}', 'MainmenuController@unpublishMainmenuInfo');
Route::get('/forms/mainmenu/mainmenu-publish/{id}', 'MainmenuController@publishMainmenuInfo');
Route::get('/forms/mainmenu/mainmenu-edit/{id}', 'MainmenuController@editMainmenuInfo');
Route::post('/forms/mainmenu/mainmenu-update', 'MainmenuController@updateMainmenuInfo');
Route::get('/forms/mainmenu/mainmenu-delete/{id}', 'MainmenuController@deleteMainmenuInfo');


Route::get('/forms/category', 'CategoryController@index');
Route::post('/forms/category/category-add', 'CategoryController@saveCategoryInfo');
Route::get('/forms/category/category-unpublish/{id}', 'CategoryController@unpublishCategoryInfo');
Route::get('/forms/category/category-publish/{id}', 'CategoryController@publishCategoryInfo');
Route::get('/forms/category/category-edit/{id}', 'CategoryController@editCategoryInfo');
Route::post('/forms/category/category-update', 'CategoryController@updateCategoryInfo');
Route::get('/forms/category/category-delete/{id}', 'CategoryController@deleteCategoryInfo');


Route::get('/forms/sub-category', 'SubCategoryController@index');
Route::post('/forms/sub-category/sub-category-add', 'SubCategoryController@saveSubCategoryInfo');
Route::get('/forms/sub-category/sub-category-unpublish/{id}', 'SubCategoryController@unpublishSubCategoryInfo');
Route::get('/forms/sub-category/sub-category-publish/{id}', 'SubCategoryController@publishSubCategoryInfo');
Route::get('/forms/sub_category/sub_category-edit/{id}', 'SubCategoryController@editSubCategoryInfo');
Route::post('/forms/sub_category/sub_category-update', 'SubCategoryController@updateSubCategoryInfo');
Route::get('/forms/sub_category/sub_category-delete/{id}', 'SubCategoryController@deleteSubCategoryInfo');

Route::get('/forms/brand', 'BrandController@index');
Route::post('/forms/brand/brand-add', 'BrandController@saveBrandInfo');
Route::get('/forms/brand/brand-unpublish/{id}', 'BrandController@unpublishBrandInfo');
Route::get('/forms/brand/brand-publish/{id}', 'BrandController@publishBrandInfo');
Route::get('/forms/brand/brand-edit/{id}', 'BrandController@editBrandInfo');
Route::post('/forms/brand/brand-update', 'BrandController@updateBrandInfo');
Route::get('/forms/brand/brand-delete/{id}', 'BrandController@deleteBrandInfo');



Route::get('/forms/product', 'ProductController@index');
Route::post('/forms/product/product-add', 'ProductController@saveProductInfo');
Route::get('/forms/product/product-manage', 'ProductController@manageProductInfo');
Route::get('/forms/product/product-unpublish/{id}', 'ProductController@unpublishProductInfo');
Route::get('/forms/product/product-publish/{id}', 'ProductController@publishProductInfo');
Route::get('/forms/product/product-delete/{id}', 'ProductController@deleteProductInfo');
Route::get('/forms/product/product-view/{id}', 'ProductController@viewProductInfo');
Route::get('/forms/product/product-edit/{id}', 'ProductController@editProductInfo');

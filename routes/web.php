<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
Route::get('/kas-masuk', 'Frontend\KasMasukController@index')->name('kas.masuk.user');
Route::get('/kas-keluar', 'Frontend\KasKeluarController@index')->name('kas.keluar.user');
Route::get('/rincian-kas', 'Frontend\RincianKasController@index')->name('rincian.kas.user');
Route::get('/data-siswa', 'Frontend\DataSiswaController@index')->name('data.user');
Route::get('/profile/{id}', 'Frontend\ProfileController@index')->name('profile.user');
Route::get('/bayar-kas', 'Frontend\BayarKasController@index')->name('bayar.kas');
Route::post('/bayar-kas', 'Frontend\BayarKasController@bayarKas')->name('bayar.kas.submit');
Route::put('/ubah-foto', 'Frontend\ProfileController@ubahFoto')->name('ubah.foto.profil');
Route::put('/ubah-profil', 'Frontend\ProfileController@ubahProfil')->name('ubah.profil');
Route::put('/ubah-password', 'Frontend\ProfileController@ubahPassword')->name('ubah.password.user');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
	Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');

	Route::get('/profil', 'AdminController@profilForm')->name('admin.profile');
	Route::put('/ubah-profil', 'AdminController@ubahProfil')->name('admin.ubah.profile');
	Route::put('/ubah-password', 'AdminController@ubahPassword')->name('admin.ubah.password');
	Route::put('/konfirmasi/{id}', 'KonfirmasiController@konfirmasi')->name('konfirmasi');
	Route::resource('/kas-masuk', 'KasMasukController');
	Route::resource('/kas-keluar', 'KasKeluarController');
	Route::resource('/kelas', 'KelasController');
	Route::resource('/wali-kelas', 'WaliKelasController');
	Route::resource('/bendahara', 'BendaharaController');
	Route::resource('/data-siswa', 'UserController');
	Route::resource('/data-admin', 'DataAdminController');
	Route::post('/import-siswa', 'ImportSiswaController@import')->name('import.siswa');
	Route::get('/export-kas-masuk/{value}', 'KasMasukController@exportKasMasuk')->name('export.kas.masuk');
	Route::post('/export-kas-masuk-between', 'KasMasukController@exportBetween')
				->name('export.between.kas.masuk');

});

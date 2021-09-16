<?php

use Illuminate\Support\Facades\Route;

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
Route::get('{dominio}',[App\Http\Controllers\DominioController::class, 'open_page'])->name('open_page');
Route::get('{dominio}/contenido/pagina/galeria',[App\Http\Controllers\DominioController::class, 'open_galeria'])->name('open_galeria');
Route::get('{dominio}/contenido/pagina/blog',[App\Http\Controllers\DominioController::class, 'open_blog'])->name('open_blog');
Route::get('{dominio}/contenido/pagina/blog/{slug}',[App\Http\Controllers\DominioController::class, 'open_blog_single'])->name('open_blog_single');
Route::get('{dominio}/contenido/pagina/contacto',[App\Http\Controllers\DominioController::class, 'open_contacto'])->name('open_contacto');
Route::post('{dominio}/contenido/pagina/contacto',[App\Http\Controllers\DominioController::class, 'store_contacto'])->name('store_contacto');
Route::get('{dominio}/contenido/{slug}',[App\Http\Controllers\DominioController::class, 'open_entrada'])->name('open_entrada');


Route::get('home/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

//REGISTRAR
Route::get('/op/registrar', [App\Http\Controllers\RegistroController::class, 'index'])->name('registro');
Route::post('/op/registrar', [App\Http\Controllers\RegistroController::class, 'store'])->name('store.registro');
//PLANTILLAS
Route::get('/admin/plantillas', [App\Http\Controllers\PlantillaController::class, 'index'])->name('index.plantilla');
Route::get('/admin/plantillas/create', [App\Http\Controllers\PlantillaController::class, 'create'])->name('create.plantilla');
Route::post('/admin/plantilla/create', [App\Http\Controllers\PlantillaController::class, 'store'])->name('store.plantilla');
Route::get('/admin/plantillas/actualizar/{id}', [App\Http\Controllers\PlantillaController::class, 'edit'])->name('edit.plantilla');
Route::put('/admin/plantilla/actualizar/{id}', [App\Http\Controllers\PlantillaController::class, 'update'])->name('update.plantilla');
Route::delete('/admin/plantilla/{id}', [App\Http\Controllers\PlantillaController::class, 'destroy'])->name('destroy.plantilla');

//PAGINAS
Route::get('/admin/paginas', [App\Http\Controllers\PaginaController::class, 'index'])->name('index.pagina');
Route::get('/admin/paginas/create', [App\Http\Controllers\PaginaController::class, 'create'])->name('create.pagina');
Route::post('/admin/paginas/create', [App\Http\Controllers\PaginaController::class, 'store'])->name('store.pagina');
Route::put('/admin/paginas/actualizar/{id}', [App\Http\Controllers\PaginaController::class, 'update'])->name('update.pagina');
Route::delete('/admin/pagina/{id}', [App\Http\Controllers\PaginaController::class, 'destroy'])->name('destroy.pagina');
Route::put('/admin/paginas/current_page/{id}', [App\Http\Controllers\PaginaController::class, 'current_page'])->name('current_page');

//MENU
Route::get('/admin/configuracion/menu', [App\Http\Controllers\ConfigMenuController::class, 'index'])->name('index.menu');
Route::put('/admin/configuracion/menu/{id}', [App\Http\Controllers\ConfigMenuController::class, 'update'])->name('update.menu');
Route::post('/admin/configuracion/menu', [App\Http\Controllers\ConfigMenuController::class, 'store'])->name('store.menu');
Route::delete('/admin/configuracion/menu/{id}', [App\Http\Controllers\ConfigMenuController::class, 'destroy'])->name('destroy.menu');
Route::get('/admin/configuracion/menu/{id}', [App\Http\Controllers\ConfigMenuController::class, 'edit_item'])->name('edit_item');
Route::put('/admin/configuracion/item/menu/{id}', [App\Http\Controllers\ConfigMenuController::class, 'update_item'])->name('update_item');

//GENERAL
Route::get('admin/configuracion/general', [App\Http\Controllers\ConfigGeneralController::class, 'index'])->name('index.general');
Route::put('/admin/configuracion/general/{id}', [App\Http\Controllers\ConfigGeneralController::class, 'update_general'])->name('update.general');

//FOOTER
Route::get('admin/configuracion/footer', [App\Http\Controllers\ConfigFooterController::class, 'index'])->name('index.footer');
Route::put('/admin/configuracion/footer/{id}', [App\Http\Controllers\ConfigFooterController::class, 'update_footer'])->name('update.footer');

//ENTRADA
Route::get('admin/entrada', [App\Http\Controllers\EntradaController::class, 'index'])->name('index.entrada');
Route::get('admin/entrada/crear', [App\Http\Controllers\EntradaController::class, 'create'])->name('create.entrada');
Route::post('admin/entrada/crear', [App\Http\Controllers\EntradaController::class, 'store'])->name('store.entrada');
Route::get('admin/entrada/{id}', [App\Http\Controllers\EntradaController::class, 'edit'])->name('edit.entrada');
Route::put('admin/entrada/{id}', [App\Http\Controllers\EntradaController::class, 'update'])->name('update.entrada');
Route::delete('admin/entrada/{id}', [App\Http\Controllers\EntradaController::class, 'destroy'])->name('destroy.entrada');

//EQUIPO
Route::get('admin/equipo', [App\Http\Controllers\EquipoController::class, 'index'])->name('index.equipo');
Route::get('admin/equipo/crear', [App\Http\Controllers\EquipoController::class, 'create'])->name('create.equipo');
Route::post('admin/equipo/crear', [App\Http\Controllers\EquipoController::class, 'store'])->name('store.equipo');
Route::get('admin/equipo/{id}', [App\Http\Controllers\EquipoController::class, 'edit'])->name('edit.equipo');
Route::put('admin/equipo/{id}', [App\Http\Controllers\EquipoController::class, 'update'])->name('update.equipo');
Route::delete('admin/equipo/{id}', [App\Http\Controllers\EquipoController::class, 'destroy'])->name('destroy.equipo');

//ENLACE
Route::get('admin/enlace', [App\Http\Controllers\EnlaceController::class, 'index'])->name('index.enlace');
Route::get('admin/enlace/crear', [App\Http\Controllers\EnlaceController::class, 'create'])->name('create.enlace');
Route::post('admin/enlace/crear', [App\Http\Controllers\EnlaceController::class, 'store'])->name('store.enlace');
Route::get('admin/enlace/{id}', [App\Http\Controllers\EnlaceController::class, 'edit'])->name('edit.enlace');
Route::put('admin/enlace/{id}', [App\Http\Controllers\EnlaceController::class, 'update'])->name('update.enlace');
Route::delete('admin/enlace/{id}', [App\Http\Controllers\EnlaceController::class, 'destroy'])->name('destroy.enlace');

//GALERIA
Route::get('admin/galeria', [App\Http\Controllers\GaleriaController::class, 'index'])->name('index.galeria');
Route::post('admin/galeria/crear', [App\Http\Controllers\GaleriaController::class, 'store'])->name('store.galeria');
Route::delete('admin/galeria/{id}', [App\Http\Controllers\GaleriaController::class, 'destroy'])->name('destroy.galeria');

//SECCION UNO
Route::get('admin/seccion_uno', [App\Http\Controllers\SeccionUnoController::class, 'index'])->name('index.seccion_uno');
Route::put('admin/seccion_uno/{id}', [App\Http\Controllers\SeccionUnoController::class, 'update'])->name('update.seccion_uno');

//SECCION DOS
Route::get('admin/seccion_dos', [App\Http\Controllers\SeccionDosController::class, 'index'])->name('index.seccion_dos');
Route::put('admin/seccion_dos/{id}', [App\Http\Controllers\SeccionDosController::class, 'update'])->name('update.seccion_dos');

//SLIDER
Route::get('admin/slider', [App\Http\Controllers\SliderController::class, 'index'])->name('index.slider');
Route::get('admin/slider/crear', [App\Http\Controllers\SliderController::class, 'create'])->name('create.slider');
Route::post('admin/slider/crear', [App\Http\Controllers\SliderController::class, 'store'])->name('store.slider');
Route::get('admin/slider/{id}', [App\Http\Controllers\SliderController::class, 'edit'])->name('edit.slider');
Route::put('admin/slider/{id}', [App\Http\Controllers\SliderController::class, 'update'])->name('update.slider');
Route::delete('admin/slider/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('destroy.slider');

//BLOG
Route::get('admin/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('index.blog');
Route::get('admin/blog/crear', [App\Http\Controllers\BlogController::class, 'create'])->name('create.blog');
Route::post('admin/blog/crear', [App\Http\Controllers\BlogController::class, 'store'])->name('store.blog');
Route::get('admin/blog/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit.blog');
Route::put('admin/blog/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update.blog');
Route::delete('admin/blog/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('destroy.blog');

//CONTACTO
Route::get('admin/mensajes', [App\Http\Controllers\ContactoController::class, 'index'])->name('index.contacto');
Route::get('admin/change/plantillas', [App\Http\Controllers\PaginaController::class, 'change_theme'])->name('change_theme');
Route::put('admin/change/plantillas', [App\Http\Controllers\PaginaController::class, 'update_theme'])->name('update_theme');

//ADMINISTRADOR
Route::get('administrador/usuario', [App\Http\Controllers\AdminController::class, 'index'])->name('index.usuarios');

Route::get('admin/fondos', [App\Http\Controllers\ConfigGeneralController::class, 'select_fondo'])->name('index.fondo');
Route::put('admin/fondos/{id}', [App\Http\Controllers\ConfigGeneralController::class, 'update_select_fondo'])->name('update.fondo');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

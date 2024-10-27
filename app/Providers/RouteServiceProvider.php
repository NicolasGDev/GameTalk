<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este es el namespace aplicado a las rutas de tu controlador.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();  // Rutas generales para los usuarios
        $this->mapAdminRoutes();  // Rutas para el panel administrativo
    }

    /**
     * Definir las rutas generales.
     *
     * Estas rutas reciben el middleware "web" y todas las funcionalidades de sesión.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Definir las rutas para el panel administrativo.
     *
     * Estas rutas reciben el middleware "web", pero puedes añadir el middleware que desees.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth', 'role:admin'])  // Middleware para admin
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));  // Archivo de rutas del admin
    }
}

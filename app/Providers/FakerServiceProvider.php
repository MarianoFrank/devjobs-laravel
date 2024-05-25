<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//clase del generador
use Faker\Generator as FakerGenerator;
//para crear el generador
use Faker\Factory as FakerFactory;


class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        //el singleton asegura que tengamos solo una instancia del servicio corriendo en al app
        //esto mejora el rendimiento al evitar instanciar constantemente
        $this->app->singleton(FakerGenerator::class, function () {

            //esta funcion se ejecuta al momento de instancias Fake\Generator

            $fakerGeneratorInstance = FakerFactory::create(); //retorna un generador configurado por defecto

            $fakerGeneratorInstance->addProvider(new \Mmo\Faker\PicsumProvider($fakerGeneratorInstance));

            return $fakerGeneratorInstance;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

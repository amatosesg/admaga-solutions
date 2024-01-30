<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseRequest;
use Illuminate\Support\Facades\DB;

class EnterpriseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(EnterpriseRequest $request)
    {
        try{
            DB::transaction(function() use ($request) {
                $enterprise = Enterprise::create([
                    'name' => $request->get('name'),
                    'bbdd_name' => strtolower(str_replace(' ', '_', $request->get('bbdd_name'))), 
                    'bbdd_status' => true,
                    'url_name' => strtolower(str_replace(' ', '-', $request->get('url_name'))),
                    'order_id' => $request->get('o')
                ]);
    
                $enterprise->save();

                $order = Order::find($request->get('o'));
                $order->status = 'shipped';
                $order->save();
            });
        }catch(\Exception $e){
            return redirect()->back()->withErrors("Error: " . $e->getMessage());
        }

        $enterprise_bbdd = strtolower(str_replace(' ', '_', $request->get('bbdd_name')));
        if($enterprise_bbdd != ''){
            $this->createDatabaseStructure($enterprise_bbdd);

            // TODO: Crear, compilar y desplegar la web

            return redirect()->route('profiles.services')->withSuccess("Se ha configurado y creado la empresa {$request->get('name')} correctamente");
        } 
        return redirect()->back()->withErrors("Error: No se ha podido configurar la base de datos correctamente. Contacta con soporte por favor.");
    }

    public function createDatabaseStructure($enterprise_bbdd){
        // TODO Pasar a migrations y ejecutar desde un Artisan::call
        // Crear BBDD
        DB::statement('CREATE SCHEMA `'. $enterprise_bbdd .'` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;');
        
        // Crear tablas laravel
        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`migrations` (
            `id` int unsigned NOT NULL AUTO_INCREMENT,
            `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `batch` int NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');

        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`failed_jobs` (
            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
            `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
        
        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`password_reset_tokens` (
            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`email`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');

        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`password_resets` (
            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            KEY `password_resets_email_index` (`email`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');

        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`personal_access_tokens` (
            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
            `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `tokenable_id` bigint unsigned NOT NULL,
            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
            `abilities` text COLLATE utf8mb4_unicode_ci,
            `last_used_at` timestamp NULL DEFAULT NULL,
            `expires_at` timestamp NULL DEFAULT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
            KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');

        // Create enterprise tables
        DB::statement('CREATE TABLE `' . $enterprise_bbdd . '`.`roles` (
            `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
            `role_name` VARCHAR(45) NULL DEFAULT NULL,
            `created_at` TIMESTAMP NULL DEFAULT NULL,
            `updated_at` TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (`id`))
          ENGINE = InnoDB
          DEFAULT CHARACTER SET = utf8mb4
          COLLATE = utf8mb4_0900_ai_ci;'
        );

        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`users` (
            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `email_verified_at` timestamp NULL DEFAULT NULL,
            `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `role_id` bigint unsigned NOT NULL,
            `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `users_email_unique` (`email`),
            CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `'. $enterprise_bbdd .'`.`roles`(`id`) ON DELETE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'
        );
        
        DB::statement('CREATE TABLE `'. $enterprise_bbdd .'`.`images` (
            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
            `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `imageable_id` bigint unsigned NOT NULL,
            PRIMARY KEY (`id`),
            KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
        
    }
}

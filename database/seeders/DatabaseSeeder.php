<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    $ana = User::factory()->create(['name' => 'Ana', 'email' => 'ana@test.com']);
    $luis = User::factory()->create(['name' => 'Luis', 'email' => 'luis@test.com']);
    $marta = User::factory()->create(['name' => 'Marta', 'email' => 'marta@test.com']);

    $web = $ana->ownedProjects()->create([
        'title' => 'Rediseño de la web',
        'description' => 'Nueva web corporativa con diseño responsive.',
        'deadline' => '2026-12-15',
        'status' => 'en curso',
    ]);
    $web->participants()->attach($luis->id, ['role' => 'Desarrollador', 'contribution_hours' => 12]);
    $web->participants()->attach($marta->id, ['role' => 'Diseñadora', 'contribution_hours' => 8]);

    $app = $luis->ownedProjects()->create([
        'title' => 'App de tareas',
        'description' => 'Aplicación móvil para gestionar tareas personales.',
        'deadline' => '2027-01-30',
        'status' => 'pendiente',
    ]);
    $app->participants()->attach($ana->id, ['role' => 'Tester', 'contribution_hours' => 3]);

    $marta->ownedProjects()->create([
        'title' => 'Guía de estilo',
        'status' => 'completado',
    ]);
}
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'title' => 'Estudar Laravel',
            'description' => 'Estudar migrations, models e controllers',
            'status' => 'pendente',
            'due_date' => now()->addDays(7),
        ]);

        Task::create([
            'title' => 'Fazer projeto de Teste Tecnico',
            'description' => 'Criar um sistema basico de gerenciamento de tarefas',
            'status' => 'em andamento',
            'due_date' => now()->addDays(14),
        ]);

        Task::create([
            'title' => 'Revisar código antigo',
            'description' => null,
            'status' => 'concluído',
            'due_date' => now()->subDays(2),
        ]);
    }
}

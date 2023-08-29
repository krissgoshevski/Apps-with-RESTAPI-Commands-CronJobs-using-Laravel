<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteInactiveUsers extends Command
{
    protected $signature = 'delete:users';
    protected $description = 'Deletes all inactive users';

    public function handle()
    {
        $users = User::withTrashed()->where('deleted_at', '<=', now()->subMonths(6))->get();

        $bar = $this->output->createProgressBar(count($users));

        foreach ($users as $user) {
            $user->forceDelete();
            $bar->advance();
        }

        $bar->finish();
    }
}

<?php

namespace Rndwiga\Gatekeeper\Console;


use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Rndwiga\Gatekeeper\Model\AdministratorModel;
use Rndwiga\Gatekeeper\Model\User;


class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gatekeeper:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run database migrations for gatekeeper';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('migrate', [
            '--database' => config('ui.database_connection'),
            '--path' => 'vendor/rndwiga/gatekeeper/src/Database/Migrations',
        ]);
        $shouldCreateNewAuthor =
            ! Schema::connection(config('gatekeeper.database_connection'))->hasTable('users') ||
            ! User::count();

        if ($shouldCreateNewAuthor) {
            User::create([
                'user_uid' => (string) Str::uuid(),
                'first_name' => 'Marie',
                'last_name' => 'Ndwiga',
                'email' => 'admin@mail.com',
                'password' => Hash::make($password = 'password'),
            ]);

            $this->line('');
            $this->line('');
            $this->line('krypto ui is ready for use.');
            $this->line('You may log in using <info>admin@mail.com</info> and password: <info>'.$password.'</info>');
        }

    }
}

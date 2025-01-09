<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um novo usuário administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'Informe seu nome',
            placeholder: 'Ex: David',
            hint: 'Isso será usado como seu primeiro nome.',
        );
        $email = text(
            label: 'Informe seu e-mail',
            placeholder: 'Ex: user@hotmail.com',
            hint: 'Isso será usado para fazer login.',
        );
        $password = password(
            label: 'Informe sua senha',
            hint: 'Isso será usado para fazer login.',
        );

        if (User::where(column: 'email', operator: $email)->exists()) {
            return $this->error(string: 'Um usuário com este e-mail já existe.');
        }

        $user = User::create(attributes: [
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt(value: $password),
        ]);

        $user->email_verified_at = Carbon::now();
        $user->save();

        return $this->info(string: 'Usuário criado com sucesso!');
    }
}

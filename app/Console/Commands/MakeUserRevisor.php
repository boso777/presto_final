<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    /**
     * Il nome e la firma del comando del terminale.
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor {email}';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Rende un utente revisore tramite la sua email';

    /**
     * Esegue il comando della console.
     */
    public function handle()
    {
        // Recuperiamo l'email passata come argomento
        $email = $this->argument('email');

        // Cerchiamo l'utente
        $user = User::where('email', $email)->first();

        // FIX: Aggiunto il simbolo del dollaro $ prima di user
        if (!$user) {
            $this->error("Utente con email {$email} non trovato!");
            return Command::FAILURE; // Best practice per i comandi CLI (ritorna codice di uscita 1)
        }

        // Aggiorniamo lo stato dell'utente
        $user->is_revisor = true;
        $user->save();

        $this->info("L'utente {$user->name} è ora un revisore!");
        return Command::SUCCESS; // Ritorna codice di uscita 0 (successo)
    }
}
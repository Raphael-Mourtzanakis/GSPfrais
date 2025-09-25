<?php

namespace App\Services;

use App\Models\Visiteur;
use Illuminate\Support\Facades\Session;

class VisiteurService
{
    public function signIn($login, $password)
    {
        $visiteur = Visiteur::query()->where("login_visiteur", "=", $login)->first();

        if ($visiteur && $visiteur->pwd_visiteur == $password) {
            Session::put("id_visiteur", $visiteur->id_visiteur);
            return true;
        }
        return false;
    }
}

<?php

namespace App\Services;

use App\Models\Frais;

class FraisService
{
    public function getListFrais($id_visiteur) {
        $desFrais = Frais::query()
            ->select()
            ->where('id_visiteur', $id_visiteur)
            ->orderBy('id_frais')
        ->get();

        return $desFrais;
    }

    public function getUnFrais($id) {
        $unFrais = Frais::query()
            ->find($id);

        return $unFrais;
    }

    public function saveUnFrais(Frais $unFrais) {
        $unFrais->save();
    }
}

<?php

namespace App\Services;

use App\Models\Frais;

class FraisService
{
    public function getListFrais() {
        $liste = Frais::query()
            ->select()
            ->orderBy('id_frais')
        ->get();

        return $liste;
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

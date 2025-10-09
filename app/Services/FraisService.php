<?php

namespace App\Services;

use App\Models\Frais;
use App\Models\Etat;

class FraisService
{
    public function getListFrais($id_visiteur) {
        try {
        $desFrais = Frais::query()
            ->select()
            ->where('id_visiteur', $id_visiteur)
            /*->join("etat", "etat.id_etat","=","frais.id_etat")*/
            ->orderBy('id_frais')
        ->get();

        return $desFrais;
        } catch (QueryException $exception) {
            $userMessage = "Erreur d'accès à la base de données";
            throw new UserException(
                $userMessage,
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function getUnFrais($id) {
        try {
        $unFrais = Frais::query()
            ->find($id);

        return $unFrais;
        } catch (QueryException $exception) {
            $userMessage = "Erreur d'accès à la base de données";
            throw new UserException(
                $userMessage,
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function saveUnFrais(Frais $unFrais) {
        try {
        $unFrais->save();
        } catch (QueryException $exception) {
            $userMessage = "Erreur d'accès à la base de données";
            throw new UserException(
                $userMessage,
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function getListEtat() {
        try {
            $etats = Frais::query()
                ->orderBy('lib_etat')
                ->get();

            return $etats;
        } catch (QueryException $exception) {
            $userMessage = "Erreur d'accès à la base de données";
            throw new UserException(
                $userMessage,
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}

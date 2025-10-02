<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use Illuminate\Http\Request;
use App\Services\FraisService;

class FraisController extends Controller {
    public function listFrais() {
        $service = new FraisService();
        $desFrais = $service->getListFrais();
        return view('listFrais', compact('desFrais'));
    }
    public function addFrais() {
        $unFrais =  new Frais();
        return view('formFrais', compact('unFrais'));
    }

    public function validFrais(Request $request) {
        $id = $request->input('id');
        $service = new FraisService();
        if ($id) {
            $unFrais = $service->getUnFrais($id);
        } else {
            $unFrais = new Frais();
        }
        $unFrais->id_etat = $request->input("id-etat");
        $unFrais->anneemois = $request->input("annee-mois");
        $unFrais->id_visiteur = $request->input("id-visiteur");
        $unFrais->nbjustificatifs = $request->input("nb-justificatifs");
        $unFrais->datemodification = $request->input("date-modification");
        $unFrais->montantvalide = $request->input("montant-validé");

        $service->saveUnFrais($unFrais);

        return view('home');
    }

    public function editFrais($id) {
        $service = new FraisService();
        $unFrais = $service->getUnFrais($id);

        return view('formFrais', compact('unFrais'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use Illuminate\Http\Request;
use App\Services\FraisService;

class FraisController extends Controller {
    public function listFrais() {
        $service = new FraisService();
        $id_visiteur = session("id_visiteur");
        $desFrais = $service->getListFrais($id_visiteur);
        if (isset($id_visiteur)) {
            return view('listFrais', compact('desFrais'));
        } else {
            return redirect("/");
        }
    }
    public function addFrais() {
        $unFrais =  new Frais();
        $id_visiteur = session("id_visiteur");
        if (isset($id_visiteur)) {
            return view('formFrais', compact('unFrais'));
        } else {
            return redirect("/");
        }
    }

    public function validFrais(Request $request) {
        $id = $request->input('id');
        $service = new FraisService();
        if ($id) {
            $unFrais = $service->getUnFrais($id);
            $unFrais->datemodification = today(); // Définir la date au moment de la modification
        } else {
            $unFrais = new Frais();
        }
        $unFrais->id_etat = $request->input("etat");
        $unFrais->anneemois = $request->input("annee-mois");
        $unFrais->id_visiteur = session("id_visiteur");
        $unFrais->nbjustificatifs = $request->input("nb-justificatifs");
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

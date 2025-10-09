<?php

namespace App\Http\Controllers;

use App\Models\Frais;
use Illuminate\Http\Request;
use App\Services\FraisService;

class FraisController extends Controller {
    public function listFrais() {
        try {
            $service = new FraisService();
            $id_visiteur = session("id_visiteur");
            $desFrais = $service->getListFrais($id_visiteur);
            if (isset($id_visiteur)) {
                return view('listFrais', compact('desFrais'));
            } else {
                return redirect("/");
            }
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }
    public function addFrais() {
        try {
            $unFrais = new Frais();
            $service = new FraisService();
            $etats = $service->getListEtat();
            $id_visiteur = session("id_visiteur");
            if (isset($id_visiteur)) {
                return view('formFrais', compact('unFrais', 'etats'));
            } else {
                return redirect("/");
            }
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function validFrais(Request $request) {
        try {
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

            return redirect("/listerFrais");
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function editFrais($id) {
        try {
            $service = new FraisService();
            $etats = $service->getListEtat();
            $unFrais = $service->getUnFrais($id);

            return view('formFrais', compact('unFrais', 'etats'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }
}

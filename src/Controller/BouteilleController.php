<?php

namespace App\Controller;

use App\Entity\Bouteille;
use App\Form\Type\BouteilleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BouteilleController extends Controller
{
    /**
     * @Route("/bouteille", name="bouteille")
     */
    public function formulaireRechercherBouteillesAction(Request $request)
    {     
        $bouteille = new Bouteille();
        $form = $this->createForm(BouteilleType::class, $bouteille, array(
            'action' => $this->generateUrl('rechercher_bouteilles'),
            'method' =>'GET'))->handleRequest($request);
        
        return $this->render('bouteille/form.html.twig', array(
            'form' => $form->createView()));
        
    }
    
    public function rechercherBouteillesAction(Request $request)
    {
        $data = $request->query->get('bouteille');
        $bouteillesRepo = $this->getDoctrine()
                                ->getManager()
                                ->getRepository(Bouteille::class);

        $bouteilles = $bouteillesRepo->getBouteillesForAdmin($data['appellationBouteille'], $data['teinte'], $data['millesime']);
      
        return $this->render('bouteille/list.html.twig', array(
        'bouteilles' => $bouteilles));
        
    }
}

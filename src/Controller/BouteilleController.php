<?php

namespace App\Controller;

use App\Entity\Bouteille;
use App\Form\Type\BouteilleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class BouteilleController extends Controller
{
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
    
    public function supprimerBouteilleAction($idBouteille)
    {
        $entityManager =  $this->getDoctrine()
                            ->getManager();
        $bouteilleRepo = $entityManager->getRepository(Bouteille::class);
        
        $bouteille = $bouteilleRepo->find($idBouteille);
        $entityManager->remove($bouteille);
        $entityManager->flush();
        
        $session = new Session();
        
        $session->getFlashBag()->add('info', 'La bouteille '.$bouteille->getAppellationBouteille().' '.$bouteille->getTeinte().' '.$bouteille->getMillesime().' a bien été supprimée');
        
        return $this->redirect($this->generateUrl("index"));
    }
}

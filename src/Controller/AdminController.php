<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use \Symfony\Component\Validator\Constraints\Date;
use Doctrine\ORM\Query\ResultSetMapping;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {


     /*Prospect */
       $sql='SELECT T1.id , t1.firstname,t1.lastname ,t1.dateofbirth,t1.hasdriverlicence,t2.name voiture,t3.name as couleur FROM user t1 left outer join car t2 on t1.carid_id=t2.id LEFT OUTER join color t3 ON t1.colorid_id=t3.id';
       
       $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);

        try
        {
            $stmt->execute();
        }
        catch (Exception $e)
        {
            die( print_r( $e->getMessage() ) );
        }


/**
 * voiture
 */

$sql='SELECT t2.name voiture,t3.name couleur FROM car_color t1 INNER join car t2 on t1.car_id = t2.id LEFT OUTER JOIN (SELECT id,name FROM color )t3 ON t1.color_id=t3.id ORDER by t2.name asc';
        $car = $em->getConnection()->prepare($sql);

                try
                {
                    $car->execute();
                }
                catch (Exception $e)
                {
                    die( print_r( $e->getMessage() ) );
                }



                $listevehicule='SELECT DISTINCT t2.name voiture FROM car_color t1 INNER join car t2 on t1.car_id = t2.id ORDER by t2.name asc';
                $liste = $em->getConnection()->prepare($listevehicule);
        
                        try
                        {
                            $liste->execute();
                        }
                        catch (Exception $e)
                        {
                            die( print_r( $e->getMessage() ) );
                        }        
                


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'fiches' => $stmt,
            'cars' => $car,
            'listes' => $liste
        ]);
        
    }
}

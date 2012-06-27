<?php

namespace MindsEyeSociety\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * Show available options for this bundle
     *
     * @Route("/hello", name="index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * Allow someone to upload new prestige awards
     *
     * @Route("/upload", name="upload")
     */
    public function uploadAction(Request $request)
    {
        $collectionConstraint = new Collection(array(
            'date' => new Date(),
            'awards' => array(new File(), new Regex(array('pattern' => '/csv/'))),
        ));

        $form = $this->createFormBuilder(null, array('validation_constraint' => $collectionConstraint))
            ->add('date', 'date')
            ->add('awards', 'file')
            ->getForm();
var_export($request->files);
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                echo "Here";
                die;
            }
        }

        return $this->render("MindsEyeSocietyLibraryBundle:Default:uploadForm.html.twig", array('form' => $form->createView()));
    }
}

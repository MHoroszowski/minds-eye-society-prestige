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
use MindsEyeSociety\LibraryBundle\Entity\Award;
use Doctrine\Common\Collections\ArrayCollection;

class DefaultController extends Controller
{
    /**
     * Show available options for this bundle
     *
     * @Route("/", name="index")
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
            'awards' => array(new File())
        ));

        $form = $this->createFormBuilder(null, array('validation_constraint' => $collectionConstraint))
            ->add('awards', 'file')
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $awards = new ArrayCollection();
            $form->bindRequest($request);
            if ($form->isValid()) {
                $formData = $form->getData();

                if (($handle = fopen($formData['awards']->getPathname(), 'r')) !== FALSE) {
                    while (($data = fgetcsv($handle)) !== FALSE) {
                        try {
                            $award = new Award();
                            $award->setAwardedDate(new \DateTime($data[0]));
                            $award->setEarnedDate(new \DateTime($data[1]));
                            $award->setMemberNumber($data[2]);
                            $award->setCategory($data[3]);
                            $award->setDescription($data[4]);
                            $award->setAmount($data[5]);
                            $award->setType($data[6]);
                            $award->setNote($data[7]);
                            $validator = $this->get('validator');
                            $errors = $validator->validate($award);

                            if ($errors->count() == 0) {
                                $awards[] = $award;
                            }

                        } catch (\Exception $e) {

                        }
                    }
                    fclose($handle);
                }
            }
            $view = $this->render("MindsEyeSocietyLibraryBundle:Default:uploadReview.html.twig", array('awards' => $awards));
        } else {
            $view = $this->render("MindsEyeSocietyLibraryBundle:Default:uploadForm.html.twig", array('form' => $form->createView()));
        }

        return $view;
    }
}

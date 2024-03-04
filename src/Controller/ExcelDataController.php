<?php

namespace App\Controller;

use App\Entity\ExcelData;
use DateTime;
use App\Form\ExcelDataFormType;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class ExcelDataController extends AbstractController
{
    /**
     * @Route("/", name="app_excel_data")
     */
    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('excel_file', FileType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('excel_file')->getData();

            if ($uploadedFile) {
                $reader = new Xlsx();
                $spreadsheet = $reader->load($uploadedFile->getPathname());
                $sheet = $spreadsheet->getActiveSheet();
                $data = $sheet->toArray();
                $entityManager = $this->getDoctrine()->getManager();

                foreach ($data as $key => $col) {
                    if ($key > 0) {
                    $excelData = new ExcelData();
                    $excelData->setCmptAffaire($col[0]);
                    if ($col[1] !== null) {
                        $excelData->setCmptEvent($col[1]);
                    } 
                   
                    if ($col[2] !== null) {
                        $excelData->setCmptDernierEvent($col[2]);
                    } 
                    $excelData->setNumFiche(intval($col[3]));
                    $excelData->setLibelleCivilite($col[4]);
                    $excelData->setPropActuelVehicule($col[5]);
                    if ($col[6] !== null) {
                        $excelData->setNom($col[6]);
                    } 
                   
                    $excelData->setPrenom($col[7]);
                    if ($col[8] !== null) {
                        $excelData->setNumNomVoie($col[8]);
                    } 
                    $excelData->setComplementAdresse1($col[9]);
                    $excelData->setCodePostal(intval($col[10]));
                    if ($col[11] !== null) {
                        $excelData->setVille($col[11]);
                    } 
                    $telDomicile = null;
                    $telPortable = null;
                    $telJob = null;
                    
                    if (!empty($col[12])) {
                        $telDomicile = (int)$col[12];
                    }
                    
                    if (!empty($col[13])) {
                        $telPortable = (int)$col[13];
                    }
                    
                    if (!empty($col[14])) {
                        $telJob = (int)$col[14];
                    }
                    
                    $excelData->setTelDomicile($telDomicile);
                    $excelData->setTelPortable($telPortable);
                    $excelData->setTelJob($telJob);
                    
                    $excelData->setEmail($col[15]);
                 $dateMiseCirculation = null;
                 $dateAchat = null;
                 $dateDernierEvent = null;
                 
                 if (!empty($col[16])) {
                     $date1 = str_replace(" ", "", $col[16]);
                     $dateMiseCirculation = new DateTime($date1);
                 }
                 
                 if (!empty($col[17])) {
                     $date2 = str_replace(" ", "", $col[17]);
                     $dateAchat = new DateTime($date2);
                 }
                 
                 if (!empty($col[18])) {
                     $date3 = str_replace(" ", "", $col[18]);
                     $dateDernierEvent = new DateTime($date3);
                 }
                 
                 $excelData->setDateMiseCirculation($dateMiseCirculation);
                 $excelData->setDateAchat($dateAchat);
                 $excelData->setDateDernierEvent($dateDernierEvent);
               if ($col[19] !== null) {
                    $excelData->setLibelleMarque($col[19]);
                     } 
                    $excelData->setLibelleModele($col[20]);
                    $excelData->setVersion($col[21]);
                    if ($col[22] !== null) {
                        $excelData->setVin($col[22]);
                    }              
                    $excelData->setImmatriculation($col[23]);
                    if ($col[24] !== null) {
                    $excelData->setTypeProspect($col[24]);
                    }  
                    $excelData->setKilometrage(intval($col[25]));
                    $excelData->setEnergie($col[26]);
                    $excelData->setVendeurVn($col[27]);
                    $excelData->setVendeurVo($col[28]);
                    $excelData->setCommentaireFacturation($col[29]);
                    $excelData->setTypeVnVo($col[30]);
                    $excelData->setNumVnVo($col[31]);
                    $excelData->setIntermediaireVenteVn($col[32]);
                    $dateEvenement = null;
                    if (!empty($col[33])) {
                        $date4 = str_replace(" ", "", $col[33]);
                        $dateEvenement = new DateTime($date4);
                    }
                    $excelData->setDateEvenement($dateEvenement);
                    if ($col[34] !== null) {
                     $excelData->setOrigineEvenement($col[34]);
                    }
                    $entityManager->persist($excelData);
                }
                $entityManager->flush();
            }
           }
        }

        $excelDataRepository = $this->getDoctrine()->getRepository(ExcelData::class);
        $allExcelData = $excelDataRepository->findAll();
        return $this->render('excel_data/index.html.twig', [
            'form' => $form->createView(),
            'data' => $allExcelData,
        ]);
    }  

    /**
    * @Route("/add", name="app_excel_add")
    */
    public function add(Request $request , ManagerRegistry $doctrine): Response
    {
        $excelData = new ExcelData();
        $form = $this->createForm(ExcelDataFormType::class, $excelData);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $doctrine->getManager();
            $entityManager->persist($excelData);
            $entityManager->flush();

            return $this->redirectToRoute('app_excel_data');
        }

        return $this->render('excel_data/add.html.twig' , 
        [
            'ExcelDataForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="app_excel_data_update")
     */
    public function update(int $id, Request $request , ManagerRegistry $doctrine):Response
    {
        $entityManager= $doctrine->getManager();
        $excelData =  $entityManager->getRepository(ExcelData::class)->find($id);
        $form = $this->createForm(ExcelDataFormType::class ,$excelData);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $formData = $form->getData();
            $excelData->setCmptAffaire($formData->getCmptAffaire());
            $excelData->setCmptEvent($formData->getCmptEvent());
            $excelData->setCmptDernierEvent($formData->getCmptDernierEvent());
            $excelData->setNumFiche($formData->getNumFiche());
            $excelData->setLibelleCivilite($formData->getLibelleCivilite());
            $excelData->setPropActuelVehicule($formData->getPropActuelVehicule());
            $excelData->setNom($formData->getNom());
            $excelData->setPrenom($formData->getPrenom());
            $excelData->setNumNomVoie($formData->getNumNomVoie());
            $excelData->setComplementAdresse1($formData->getComplementAdresse1());
            $excelData->setCodePostal($formData->getCodePostal());
            $excelData->setVille($formData->getVille());
            $excelData->setTelDomicile($formData->getTelDomicile());
            $excelData->setTelPortable($formData->getTelPortable());
            $excelData->setTelJob($formData->getTelJob());
            $excelData->setEmail($formData->getEmail());
            $excelData->setDateMiseCirculation($formData->getDateMiseCirculation());
            $excelData->setDateAchat($formData->getDateAchat());
            $excelData->setDateDernierEvent($formData->getDateDernierEvent());
            $excelData->setLibelleMarque($formData->getLibelleMarque());
            $excelData->setLibelleModele($formData->getLibelleModele());
            $excelData->setVersion($formData->getVersion());
            $excelData->setVin($formData->getVin());
            $excelData->setImmatriculation($formData->getImmatriculation());
            $excelData->setTypeProspect($formData->getTypeProspect());
            $excelData->setKilometrage($formData->getKilometrage());
            $excelData->setEnergie($formData->getEnergie());
            $excelData->setVendeurVn($formData->getVendeurVn());
            $excelData->setVendeurVo($formData->getVendeurVo());
            $excelData->setCommentaireFacturation($formData->getCommentaireFacturation());
            $excelData->setTypeVnVo($formData->getTypeVnVo());
            $excelData->setNumVnVo($formData->getNumVnVo());
            $excelData->setIntermediaireVenteVn($formData->getIntermediaireVenteVn());
            $excelData->setDateEvenement($formData->getDateEvenement());
            $excelData->setOrigineEvenement($formData->getOrigineEvenement());
             
            $entityManager->flush();

            return $this->redirectToRoute('app_excel_data');
        }

        return $this->render('excel_data/update.html.twig',[
            'updateExcelData'=>$form->createView()
        ]);
    }

   /**
    * @Route("/delete/{id}", name="app_excel_data_delete")
    */
     public function delete(int $id , ManagerRegistry $doctrine):Response
     {
          $entityManager =$doctrine->getManager();
          $excelData =  $entityManager->getRepository(ExcelData::class)->find($id);
          $entityManager->remove($excelData);
          $entityManager->flush();
          
    return $this->redirectToRoute('app_excel_data');
  }
}

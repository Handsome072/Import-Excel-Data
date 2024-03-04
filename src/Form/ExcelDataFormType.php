<?php

namespace App\Form;

use App\Entity\ExcelData;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExcelDataFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cmpt_affaire')
            ->add('cmpt_event')
            ->add('cmpt_dernier_event')
            ->add('num_fiche')
            ->add('libelle_civilite')
            ->add('prop_actuel_vehicule')
            ->add('nom')
            ->add('prenom')
            ->add('num_nom_voie')
            ->add('complement_adresse_1')
            ->add('code_postal')
            ->add('ville')
            ->add('tel_domicile')
            ->add('tel_portable')
            ->add('tel_job')
            ->add('email')
            ->add('date_mise_circulation', DateType::class, [
                'label' => 'Date de mise en circulation',
                'widget' => 'single_text', 
                'format' => 'yyyy-MM-dd', 
                'required' => false,
            ])
            ->add('date_achat', DateType::class, [
                'label' => 'Date achat (date de livraison)',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'required' => false,
            ])
            ->add('date_dernier_event', DateType::class, [
                'label' => 'Date dernier évènement (Veh)',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'required' => false,
            ])
            ->add('libelle_marque')
            ->add('libelle_modele')
            ->add('version')
            ->add('vin')
            ->add('immatriculation')
            ->add('type_prospect')
            ->add('kilometrage')
            ->add('energie')
            ->add('vendeur_vn')
            ->add('vendeur_vo')
            ->add('commentaire_facturation')
            ->add('type_vn_vo')
            ->add('num_vn_vo')
            ->add('intermediaire_vente_vn')
            ->add('date_evenement', DateType::class, [
                'label' => 'Date évènement (Veh)',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'required' => false,
            ])
            ->add('origine_evenement')
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExcelData::class,
        ]);
    }
}

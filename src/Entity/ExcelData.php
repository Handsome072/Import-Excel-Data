<?php

namespace App\Entity;

use App\Repository\ExcelDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExcelDataRepository::class)
 */
class ExcelData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cmpt_affaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cmpt_event;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cmpt_dernier_event;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $num_fiche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle_civilite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prop_actuel_vehicule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_nom_voie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complement_adresse_1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel_domicile;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel_portable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel_job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_mise_circulation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_achat;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_dernier_event;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle_marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle_modele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_prospect;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $energie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vendeur_vn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vendeur_vo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire_facturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_vn_vo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_vn_vo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $intermediaire_vente_vn;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_evenement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $origine_evenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmptAffaire(): ?string
    {
        return $this->cmpt_affaire;
    }

    public function setCmptAffaire(?string $cmpt_affaire): self
    {
        $this->cmpt_affaire = $cmpt_affaire;

        return $this;
    }

    public function getCmptEvent(): ?string
    {
        return $this->cmpt_event;
    }

    public function setCmptEvent(?string $cmpt_event): self
    {
        $this->cmpt_event = $cmpt_event;

        return $this;
    }

    public function getCmptDernierEvent(): ?string
    {
        return $this->cmpt_dernier_event;
    }

    public function setCmptDernierEvent(?string $cmpt_dernier_event): self
    {
        $this->cmpt_dernier_event = $cmpt_dernier_event;

        return $this;
    }

    public function getNumFiche(): ?int
    {
        return $this->num_fiche;
    }

    public function setNumFiche(?int $num_fiche): self
    {
        $this->num_fiche = $num_fiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->libelle_civilite;
    }

    public function setLibelleCivilite(?string $libelle_civilite): self
    {
        $this->libelle_civilite = $libelle_civilite;

        return $this;
    }

    public function getPropActuelVehicule(): ?string
    {
        return $this->prop_actuel_vehicule;
    }

    public function setPropActuelVehicule(?string $prop_actuel_vehicule): self
    {
        $this->prop_actuel_vehicule = $prop_actuel_vehicule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumNomVoie(): ?string
    {
        return $this->num_nom_voie;
    }

    public function setNumNomVoie(?string $num_nom_voie): self
    {
        $this->num_nom_voie = $num_nom_voie;

        return $this;
    }

    public function getComplementAdresse1(): ?string
    {
        return $this->complement_adresse_1;
    }

    public function setComplementAdresse1(?string $complement_adresse_1): self
    {
        $this->complement_adresse_1 = $complement_adresse_1;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(?int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelDomicile(): ?int
    {
        return $this->tel_domicile;
    }

    public function setTelDomicile(?int $tel_domicile): self
    {
        $this->tel_domicile = $tel_domicile;

        return $this;
    }

    public function getTelPortable(): ?int
    {
        return $this->tel_portable;
    }

    public function setTelPortable(?int $tel_portable): self
    {
        $this->tel_portable = $tel_portable;

        return $this;
    }

    public function getTelJob(): ?int
    {
        return $this->tel_job;
    }

    public function setTelJob(?int $tel_job): self
    {
        $this->tel_job = $tel_job;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateMiseCirculation(): ?\DateTimeInterface
    {
        return $this->date_mise_circulation;
    }

    public function setDateMiseCirculation(?\DateTimeInterface $date_mise_circulation): self
    {
        $this->date_mise_circulation = $date_mise_circulation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getDateDernierEvent(): ?\DateTimeInterface
    {
        return $this->date_dernier_event;
    }

    public function setDateDernierEvent(?\DateTimeInterface $date_dernier_event): self
    {
        $this->date_dernier_event = $date_dernier_event;

        return $this;
    }

    public function getLibelleMarque(): ?string
    {
        return $this->libelle_marque;
    }

    public function setLibelleMarque(?string $libelle_marque): self
    {
        $this->libelle_marque = $libelle_marque;

        return $this;
    }

    public function getLibelleModele(): ?string
    {
        return $this->libelle_modele;
    }

    public function setLibelleModele(?string $libelle_modele): self
    {
        $this->libelle_modele = $libelle_modele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getTypeProspect(): ?string
    {
        return $this->type_prospect;
    }

    public function setTypeProspect(?string $type_prospect): self
    {
        $this->type_prospect = $type_prospect;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(?string $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getVendeurVn(): ?string
    {
        return $this->vendeur_vn;
    }

    public function setVendeurVn(?string $vendeur_vn): self
    {
        $this->vendeur_vn = $vendeur_vn;

        return $this;
    }

    public function getVendeurVo(): ?string
    {
        return $this->vendeur_vo;
    }

    public function setVendeurVo(?string $vendeur_vo): self
    {
        $this->vendeur_vo = $vendeur_vo;

        return $this;
    }

    public function getCommentaireFacturation(): ?string
    {
        return $this->commentaire_facturation;
    }

    public function setCommentaireFacturation(?string $commentaire_facturation): self
    {
        $this->commentaire_facturation = $commentaire_facturation;

        return $this;
    }

    public function getTypeVnVo(): ?string
    {
        return $this->type_vn_vo;
    }

    public function setTypeVnVo(?string $type_vn_vo): self
    {
        $this->type_vn_vo = $type_vn_vo;

        return $this;
    }

    public function getNumVnVo(): ?string
    {
        return $this->num_vn_vo;
    }

    public function setNumVnVo(?string $num_vn_vo): self
    {
        $this->num_vn_vo = $num_vn_vo;

        return $this;
    }

    public function getIntermediaireVenteVn(): ?string
    {
        return $this->intermediaire_vente_vn;
    }

    public function setIntermediaireVenteVn(?string $intermediaire_vente_vn): self
    {
        $this->intermediaire_vente_vn = $intermediaire_vente_vn;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->date_evenement;
    }

    public function setDateEvenement(?\DateTimeInterface $date_evenement): self
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->origine_evenement;
    }

    public function setOrigineEvenement(?string $origine_evenement): self
    {
        $this->origine_evenement = $origine_evenement;

        return $this;
    }
}

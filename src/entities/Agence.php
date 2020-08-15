<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="agence")
 */

class Agence
{
        /** 
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;
        /** 
         * @ORM\Column(type="string") 
         */
        private $nom;

        /**
         * Many agence have one region. This is the owning side.
         * @ORM\ManyToOne(targetEntity="Region", inversedBy="agences")
         * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
         */
        private $region_id;

        /**
         * One agence has many comptes. This is the inverse side.
         * @ORM\OneToMany(targetEntity="Compte", mappedBy="agence_id")
         */
        private $comptes;

        //Definition des constructeur
        public function __construct()
        {
                $this->comptes = new ArrayCollection();
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nom
         */
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of region_id
         */
        public function getRegion_id()
        {
                return $this->region_id;
        }

        /**
         * Set the value of region_id
         *
         * @return  self
         */
        public function setRegion_id($region_id)
        {
                $this->region_id = $region_id;

                return $this;
        }

        /**
         * Get one agence has many comptes. This is the inverse side.
         */
        public function getComptes()
        {
                return $this->comptes;
        }

        /**
         * Set one agence has many comptes. This is the inverse side.
         *
         * @return  self
         */
        public function setComptes($comptes)
        {
                $this->comptes = $comptes;

                return $this;
        }
}

<?php
    namespace Interfaces;
        
        interface PersonLegalInterface {

            public function getCnpj():int;
            /**
             * @param int $cnpj
             * O cnpj do usuário
             */
            public function setCnpj(int $cnpj):void;

            public function getTypePackage():int;
            /**
             * @param int $typePackage
             * O tipo de  pacote do usuário
             */
            public function setTypePackage(int $typePackage):void;
        }

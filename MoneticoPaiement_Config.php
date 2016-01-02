<?php
/***************************************************************************************
* Warning !! MoneticoPaiement_Config contains the key, you have to protect this file with all       
* the mechanism available in your development environment.                             
* You may for instance put this file in another directory and/or change its name       
***************************************************************************************/

define ("MONETICOPAIEMENT_KEY", "608209751704B63235EA477300CD6EF43FB6BC94");
define ("MONETICOPAIEMENT_EPTNUMBER", "6756487");
define ("MONETICOPAIEMENT_VERSION", "3.0");
define ("MONETICOPAIEMENT_URLSERVER", "https://p.monetico-services.com/test/");
define ("MONETICOPAIEMENT_COMPANYCODE", "illicoimma");
define ("MONETICOPAIEMENT_URLOK", "http://www.illico-immat.fr/validation-de-paiement");
define ("MONETICOPAIEMENT_URLKO", "http://www.illico-immat.fr/erreur-de-paiement");

define ("MONETICOPAIEMENT_CTLHMAC","V4.0.sha1.php--[CtlHmac%s%s]-%s");
define ("MONETICOPAIEMENT_CTLHMACSTR", "CtlHmac%s%s");
define ("MONETICOPAIEMENT_PHASE2BACK_RECEIPT","version=2\ncdr=%s");
define ("MONETICOPAIEMENT_PHASE2BACK_MACOK","0");
define ("MONETICOPAIEMENT_PHASE2BACK_MACNOTOK","1\n");
define ("MONETICOPAIEMENT_PHASE2BACK_FIELDS", "%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*");
define ("MONETICOPAIEMENT_phase1go_fields", "%s*%s*%s%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s");
define ("MONETICOPAIEMENT_URLPAYMENT", "paiement.cgi");
?>

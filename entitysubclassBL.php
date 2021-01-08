<?php

/**
 * Class "entitysubclassBL.PHP"
 * @author "dba, ygonzalez@durthis.com"
 * @version "1.00 2020-12-29 Elaboracion; 2020-12-29 Modificacion, [Parametro]"
 * Description: ""  
 * 
 * Others additions: entitysubclassBL.php:
 * functions: 
 *           
 *
 */
chdir(dirname(__FILE__));

include_once("../base/baseBL.php");

class entitysubclassBL extends baseBL
{

      protected $identityclass;
      protected $observation;
      protected $identitysubclass;


      function __construct(
            $code,
            $name,
            $identityclass,
            $observation,
            $identitysubclass,
            $active,
            $deleted
      ) {

            $scheme = "base";
            $table = "entitysubclass";
            $this->identityclass  = $identityclass;
            $this->observation  = $observation;
            $this->identitysubclass  = $identitysubclass;

            parent::__construct($scheme, $table, $code, $name, $active, $deleted);
      }

      function validate()
      {
            $valid = true;
            $msg = "";

            if (!utilities::valOk($this->code)) {
                  $valid = false;
                  $msg = "A value must be given to field code";
            } // validate code

            if (!utilities::valOk($this->name)) {
                  $valid = false;
                  $msg = "A value must be given to field name";
            } // validate name

            if (!utilities::valOk($this->identityclass)) {
                  $valid = false;
                  $msg = "A value must be given to field identityclass";
            } // validate identityclass

            if (!utilities::valOk($this->observation)) {
                  $valid = false;
                  $msg = "A value must be given to field observation";
            } // validate observation

            if (!utilities::valOk($this->identitysubclass)) {
                  $valid = false;
                  $msg = "A value must be given to field identitysubclass";
            } // validate identitysubclass

            if ($msg != "") {
                  utilities::alert($msg);
            }
            return ($valid);
      }

      function buildArray(&$A)
      {
            $A[] = utilities::buildS($this->code);
            $A[] = utilities::buildS($this->name);
            $A[] = utilities::buildS($this->identityclass);
            $A[] = utilities::buildS($this->observation);
            $A[] = utilities::buildS($this->identitysubclass);
            $A[] = utilities::buildS($this->active);
            $A[] = utilities::buildS($this->deleted);
      }



      function execute($urloper, &$parAr, $name = "")
      {
            if ($urloper == "update") {
                  $nerr = $this->update($parAr);
                  if ($nerr === true)
                        $msg = "Update Operation OK. ";
                  else
                        $msg = "Update Operation Failed. ";
                  utilities::alert($msg);
            } // update

            if ($urloper == "insert") {
                  $nerr = $this->insert($parAr);
                  if ($nerr === true)
                        $msg = "Insert Operation OK. ";
                  else
                        $msg = "Insert Operation Failed. ";
                  header("Location: departamentos.php");
                  utilities::alert($msg);
            } // update

            if ($urloper == "find") {
                  $nerr = $this->select($parAr);
            }
            if ($urloper == "findByName") {
                  $nerr = $this->selectByName($parAr, $name);
            }
      }

      function fillGrid($pn = 0, $parname = "", $parvalue = "")
      {
            $par = "";
            $par = "";
            $arrCol = array("id", "code", "name", "identityclass", "observation", "identitysubclass", "active", "deleted");
            return parent::fillGrid($arrCol, $par, $pn, $pageSize = 10);
      }
}

<?php
	session_start();
	require_once("Translator.php");
	
	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_ADMIN = 2;

		private $pageVisibility;
		public $translator;
		
		public function __construct($pageVisibility) {
			
			if (isset($_SESSION["lang"]))
			{	
				$currentLang = $_SESSION["lang"];
			}
			else
			{
				$currentLang = "fr"; 
			}
			
			if (isset($_GET["lang"]) && strlen($_GET["lang"]) > 0) {
				$currentLang = $_GET["lang"];
				$_SESSION["lang"] = $currentLang;
			}
			

			$this->pageVisibility = $pageVisibility;
			$this->translator = new Translator($currentLang);
		}

		// fonction du parent disponible pour les enfants
		public function execute()
		{
			// donner une visibilité par défaut s'il n'existe pas
			if (!isset($_SESSION["visibility"]))
			{
				$_SESSION["visibility"] = 0;
			}


			// vérifier si l'usager a les droits de voir la page
			if ($this->pageVisibility > $_SESSION["visibility"])
			{
				// changer la page pour empêcher de le voir
				header('location:index.php');
				exit;
			}

			// appeler la fonction d'un enfant
			$this->executeAction();
		}

		abstract protected function executeAction();
	}
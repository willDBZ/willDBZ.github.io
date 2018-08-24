<?php
	require_once("action/CommonAction.php");

	class IndexAction extends CommonAction {
		public function __construct() 
		{
			// la page est publique, pas besoin de connexion pour y avoir accès!
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() 
		{
		}
	}
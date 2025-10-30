<?php

	class Tea extends HotBeverage
	{
		private $_description = "Just a basic tea.";
		private $_comment = "A bad one";

		public function __construct()
		{
			$this->_name = "Tea";
			$this->_price = 4.99;
			$this->_resistance = 5;
		}

		public function getDescription() {
			return ($this->_description);
		}

		public function getComment() {
			return ($this->_comment);
		}
	}

?>
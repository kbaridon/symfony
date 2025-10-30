<?php

	class HotBeverage
	{
		protected $_name;
		protected $_price;
		protected $_resistance;

		public function getName() {
			return ($this->_name);
		}

		public function getPrice() {
			return ($this->_price);
		}

		public function getResistance() {
			return ($this->_resistance);
		}
	}

?>
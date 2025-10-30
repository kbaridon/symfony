<?php

	class Elem
	{
		private $_element;
		private $_content;
		private ?Elem $_child = NULL;
		private ?Elem $_next = NULL;

		public function __construct(string $element, string $content = "")
		{
			$this->_element = $element;
			$this->_content = $content;
		}

		public function pushElement(Elem $new)
		{
			if ($this->_child == NULL)
				$this->_child = $new;
			else
			{
				$current = $this->_child;
				while ($current->_next !== NULL)
					$current = $current->_next;
				$current->_next = $new;
			}
		}

		public function getHTML($i = 0)
		{
			$tab = str_repeat("\t", $i);
			$html = $tab . "<" . $this->_element . ">";
			if ($this->_content != "")
				$html = $html . $this->_content;
			$child = $this->_child;
			$hasChildren = $child != null;
			if ($hasChildren)
				$html = $html . "\n";
			while ($child != null)
			{
				$html = $html . $child->getHTML($i + 1) . "\n";
				$child = $child->_next;
			}
			if ($hasChildren)
				$html = $html . $tab;
			$html = $html . "</" . $this->_element . ">";
			return $html;
		}
	}

?>
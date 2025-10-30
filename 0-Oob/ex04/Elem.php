<?php

	class Elem
	{
		private const SUPPORTED = array('meta', 'img', 'hr', 'br', 'html', 'head', 
		'body', 'title', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'div',
		'table', 'tr', 'th', 'td', 'ul', 'ol', 'li');

		private $_element;
		private $_content;
		private $_attributes;
		private ?Elem $_child = NULL;
		private ?Elem $_next = NULL;

		public function __construct(string $element, string $content = "", array $attributes = [])
		{
			if (!in_array($element, self::SUPPORTED))
				throw new MyException();
			$this->_element = $element;
			$this->_content = $content;
			$this->_attributes = $attributes;
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

		private function getAttributesString()
		{
			if (empty($this->_attributes))
				return "";
			$attrs = [];
			foreach ($this->_attributes as $key => $value)
			{
				$attrs[] = $key . '="' . htmlspecialchars($value) . '"';
			}
			return " " . implode(" ", $attrs);
		}

		public function getHTML($i = 0)
		{
			$tab = str_repeat("\t", $i);
			$hasContent = $this->_content != "" || $this->_child != null;
			if (!$hasContent)
			{
				return $tab . "<" . $this->_element . $this->getAttributesString() . " />";
			}
			$html = $tab . "<" . $this->_element . $this->getAttributesString() . ">";
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
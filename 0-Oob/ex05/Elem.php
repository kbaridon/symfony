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

		public function validPage()
		{
			if ($this->_element !== 'html') {
				return false;
			}
			$children = $this->getChildren();
			if (count($children) !== 2 || $children[0]->_element !== 'head' || $children[1]->_element !== 'body') {
				return false;
			}
			$head = $children[0];
			$body = $children[1];
			if (!$this->validateHead($head)) {
				return false;
			}
			if (!$this->validateElement($body)) {
				return false;
			}
			return true;
		}

		private function getChildren()
		{
			$children = [];
			$child = $this->_child;
			while ($child !== null) {
				$children[] = $child;
				$child = $child->_next;
			}
			return $children;
		}

		private function validateHead(Elem $head)
		{
			$children = $head->getChildren();
			if (count($children) !== 2) {
				return false;
			}
			$hasTitle = false;
			$hasMeta = false;
			foreach ($children as $child) {
				if ($child->_element === 'title') {
					if ($hasTitle) return false;
					$hasTitle = true;
					if ($child->_child !== null) return false;
				} elseif ($child->_element === 'meta') {
					if ($hasMeta) return false;
					$hasMeta = true;
					if (!isset($child->_attributes['charset'])) return false;
				} else {
					return false;
				}
			}
			return $hasTitle && $hasMeta;
		}

		private function validateElement(Elem $elem)
		{
			$tag = $elem->_element;
			if ($tag === 'p') {
				return $elem->_child === null;
			} elseif ($tag === 'table') {
				$children = $elem->getChildren();
				foreach ($children as $child) {
					if ($child->_element !== 'tr') return false;
					if (!$this->validateTr($child)) return false;
				}
				return true;
			} elseif ($tag === 'ul' || $tag === 'ol') {
				$children = $elem->getChildren();
				foreach ($children as $child) {
					if ($child->_element !== 'li') return false;
					if (!$this->validateElement($child)) return false;
				}
				return true;
			} elseif ($tag === 'tr') {
				return $this->validateTr($elem);
			} else {
				$children = $elem->getChildren();
				foreach ($children as $child) {
					if (!$this->validateElement($child)) return false;
				}
				return true;
			}
		}

		private function validateTr(Elem $tr)
		{
			$children = $tr->getChildren();
			foreach ($children as $child) {
				if ($child->_element !== 'th' && $child->_element !== 'td') return false;
				if (!$this->validateElement($child)) return false;
			}
			return true;
		}
	}

?>
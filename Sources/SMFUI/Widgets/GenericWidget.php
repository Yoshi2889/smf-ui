<?php

/*
	SMFUI - Object-oriented UI framework for SMF

	Copyright (c) 2015 Rick Kerkhof

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in all
	copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
	SOFTWARE.
*/

namespace SMFUI\Widgets;

abstract class GenericWidget implements \SMFUI\Interfaces\IGenericWidget
{
	/**
	 * The contents of the widget.
	 * @var string
	 */
	protected $contents = '';

	/**
	 * Instance of the template-side widget.
	 * @var object
	 */
	protected $templateWidget;

	/**
	 * ID of the widget, if available.
	 * @var string
	 */
	protected $id = '';

	public function setID($id)
	{
		$this->id = $id;
	}

	public function getID()
	{
		return $this->id;
	}

	/**
	 * Set additional classes to be applied for this widget.
	 * @param string $classes
	 * @return void
	 */
	public function setAdditionalClasses($classes)
	{
		$this->classes = $classes;
	}

	/**
	 * Gets the additional classes to be applied.
	 * @return string
	 */
	public function getAdditionalClasses()
	{
		return $this->classes;
	}

	public function construct()
	{
		$replacements = array(
			'%id%' => !empty($this->id) ? 'id="' . $this->getID() . '"' : '',
		);
		return $this->templateWidget->construct($replacements);
	}

	public function getHTML()
	{
		return $this->construct();
	}

	public function paint()
	{
		echo $this->construct();
	}
}

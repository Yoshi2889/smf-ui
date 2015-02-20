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

abstract class ContentsWidget extends GenericWidget implements \SMFUI\Interfaces\IContentsWidget
{
	/**
	 * The contents of the widget.
	 * @var string
	 */
	protected $contents = '';

	/**
	 * Additional classes for the widget.
	 * @var string
	 */
	protected $classes = '';

	public function setContents($html)
	{
		$this->contents = $html;
	}

	public function getContents()
	{
		return $this->contents;
	}

	public function setAdditionalClasses($classes)
	{
		$this->classes = $classes;
	}

	public function getAdditionalClasses()
	{
		return $this->classes;
	}

	public function construct()
	{
		$replacements = array(
			'%contents%' => $this->getContents(),
			'%id%' => !empty($this->id) ? 'id="' . $this->getID() . '"' : '',
			'%add_classes%' => $this->getAdditionalClasses(),
		);
		return $this->templateWidget->construct($replacements);
	}
}
<?php

/**
 * Unit Testing for the page_model class
 * 
 * @package Elucidat::top-down-view
 * @author Ricardo Valfreixo <ricardo.freixo@elucidat.com>
 */
class PageModelTest extends PHPUnit_Framework_TestCase {
	private $CI;

	public function setUp() {
		$this->CI = &get_instance();
	}

	public function testGetPages() {
		$this->CI->load->model('page_model');
		
		$items = $this->CI->page_model->get_pages();
		$this->assertInternalType('array',$items);

	}

	public function testGetTree()
	{
		// @todo - write tests to this function
	}
}
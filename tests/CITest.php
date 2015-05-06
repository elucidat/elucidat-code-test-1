<?php
/**
 * 
 * class CITest
 * 
 * Master test class for this development
 * 
 * Run from the project root (not codeigniter root) with 
 *       ./vendor/bin/phpunit
 * 
 * 
 * @author Ricardo Valfreixo <ricardo.freixo@elucidat.com>
 */
class CITest extends PHPUnit_Framework_TestCase
{
  /**
   * A CI instance
   * @access private
   */
  private $CI;

  /**
   * Description
   * @return self
   */
  public function setUp()
  {
    $this->CI = &get_instance();
    return $this;
  } // end setUp


  /**
     * Mock function to test if phpunit is correctly working
     * 
     * @author Ricardo Valfreixo <ricardo.freixo@elucidat.com>
     */  
  public function testGetPost()
  {
    $_SERVER['REQUEST_METHOD'] = 'GET';
    $_GET['foo'] = 'bar';
    $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    return $this;
  } // end testGetPost()

} // end CITest
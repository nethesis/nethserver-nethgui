<?php
require_once dirname(__FILE__) . '/../../../../NethGui/Core/View.php';

/**
 * Test class for NethGui_Core_View.
 * Generated by PHPUnit on 2011-06-24 at 16:04:27.
 */
class NethGui_Core_ViewGenericTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var NethGui_Core_View
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $parentModule = $this->getMockBuilder('NethGui_Core_Module_List')
            ->setConstructorArgs(array('Parent'))
            ->getMock();
               
        $module = $this->getMockBuilder('NethGui_Core_Module_Standard')
            ->setConstructorArgs(array('TestingModule'))
            ->getMock();

        $parentModule->expects($this->any())
            ->method('getChildren')
            ->will($this->returnValue($module));        
        
        $module->expects($this->any())
            ->method('getParent')
            ->will($this->returnValue($parentModule));
        
        $this->object = new NethGui_Core_View($module);
    }

    /**
     * @todo Implement testCopyFrom().
     */
    public function testCopyFrom()
    {
        $data = array('a'=>1, 'b'=>2);
        $this->object->copyFrom($data);
        
        $this->assertEquals($data['a'], $this->object['a']);
        $this->assertEquals($data['b'], $this->object['b']);
    }

    /**
     * @todo Implement testSetTemplate().
     */
    public function testSetGetTemplate()
    {
        $this->object->setTemplate('T');        
        $this->assertEquals($this->object->getTemplate(), 'T');
    }


    public function testSpawnView()
    {
        $module = $this->getMockBuilder('NethGui_Core_Module_Standard')
            ->setConstructorArgs(array('InnerModule'))
            ->setMethods(array())
            ->getMock();
        
        $module->expects($this->once())
            ->method('getIdentifier')
            ->will($this->returnValue('InnerModule'));
        
        $innerView1 = $this->object->spawnView($module, TRUE);
        $innerView2 = $this->object->spawnView($module, 'View2');
        
        $this->assertInstanceOf('NethGui_Core_ViewInterface', $innerView1);
        $this->assertInstanceOf('NethGui_Core_ViewInterface', $innerView2);
        $this->assertEquals($innerView1, $this->object['InnerModule']);
        $this->assertEquals($innerView2, $this->object['View2']);
    }

    /**
     * @todo Implement testGetIterator().
     */
    public function testGetIterator()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testOffsetExists().
     */
    public function testOffsetExists()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testOffsetGet().
     */
    public function testOffsetGet()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testOffsetSet().
     */
    public function testOffsetSet()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testOffsetUnset().
     */
    public function testOffsetUnset()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testRender().
     */
    public function testRender()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testToJson().
     */
    public function testToJson()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement test__toString().
     */
    public function test__toString()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testTranslate().
     */
    public function testTranslate()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetModule().
     */
    public function testGetModule()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetModulePath().
     */
    public function testGetModulePath()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

}

?>
<?php
namespace tad\TestTools;

use test\TestTools\A;
use tad\FunctionMocker\FunctionMocker;

class functionsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        include_once codecept_data_dir('dummyClasses/classOne.php');
    }

    /**
     * @test
     * it should return Prophecy object if Prophecy
     */
    public function it_should_return_prophecy_object_if_prophecy()
    {
        $object = $this->prophesize('test\TestTools\A');
        $object = revealOrReturn($object);
        $this->assertInstanceOf('test\TestTools\A', $object);
    }

    /**
     * @test
     * it should return object if not mock
     */
    public function it_should_return_object_if_not_mock()
    {
        $object = revealOrReturn(new A());
        $this->assertInstanceOf('test\TestTools\A', $object);
    }

    /**
     * @test
     * it should return PHPUnit mock if PHPunit mock builder
     */
    public function it_should_return_php_unit_mock_if_phpunit_mock_builder()
    {
        $object = revealOrReturn($this->getMockBuilder('tes\TestTools\A'));
        $this->assertInstanceOf('PHPUnit_Framework_MockObject_MockObject', $object);
    }

    /**
     * @test
     * it should return forged FunctionMocker instance if FunctionMocker mock builder
     */
    public function it_should_return_forged_function_mocker_instance_if_function_mocker_mock_builder()
    {
        $object = revealOrReturn(FunctionMocker::replace('test\TestTools\A'));
        $this->assertInstanceOf('test\TestTools\A', $object);
    }
}

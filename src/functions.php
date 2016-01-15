<?php

namespace tad\TestTools;

if (!function_exists('revealOrReturn')) {

    /**
     * Either completes the mocking procedure for an object if a mock builder or return the object.
     *
     * @param mixed $object
     * @return mixed An object ready for injection.
     */
    function revealOrReturn($object)
    {
        $map = [
            'Prophecy\Prophecy\ObjectProphecy' => 'reveal',
            'PHPUnit_Framework_MockObject_MockBuilder' => 'getMock',
            'tad\FunctionMocker\Forge\Step' => 'get'
        ];
        $class = get_class($object);
        $mock = array_key_exists($class, $map);

        return $mock ? $object->{$map[$class]}() : $object;
    }
}
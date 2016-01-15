<?php

namespace tad\TestTools;

if (!function_exists('revealOrReturn')) {

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
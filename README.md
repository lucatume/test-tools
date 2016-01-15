# Test Tools
An hopefully growing assortment of PHP test tools for a smoother testing experience.

## Code example
Ours is a fast-paced world, no time to read docs.
```php
use function tad\TestTools\revealOrReturn;
use tad\FunctionMocker\FunctionMocker;
class ClassOneTest extends \Codeception\TestCase\Test {

    protected $a;
    protected $b;
    protected $c;
    protected $d;

    public function setUp() {
        $this->a = $this->prophesize( 'A' );
        $this->b = $this->getMockBuilder( 'B' );
        $this->c = FunctionMocker::replace( 'C' );
        $this->d = new D;
    }

    protected function makeInstance() {
        return new ClassOne(
            revealOrReturn( $this->a ),
            revealOrReturn( $this->b ),
            revealOrReturn( $this->c ),
            revealOrReturn( $this->d )
        );
    }

    public function testOne() {
        $this->a->someMethod()->willReturn( 12 );
        $sut = $this->makeInstance();

        $sut->doSomething();

        $this->assertTrue( true );
    }

    public function testTwo() {
        $this->b->expects($this->any())->method('anotherMethod')->willReturn(23);
        $sut = $this->makeInstance();

        $sut->doSomethingElse();

        $this->assertTrue( true );
    }

    public function testThree() {
        $this->c->method('yetAnotherMethod', 13);
        $sut = $this->makeInstance();

        $sut->doSomethingElse();

        $this->assertTrue( true );
    }
}
```

More to come.

## Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

## [0.1.0] - 2016-01-15
### Added
- `revealOrReturn` function

[Unreleased]: https://github.com/olivierlacan/keep-a-changelog/compare/v0.1.0...HEAD

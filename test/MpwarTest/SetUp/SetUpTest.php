<?php

namespace MpwarTest\SetUp;


use PHPUnit_Framework_TestCase;

final class ExampleTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function testingTheTrueAssert()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function testingTheStringEndsWith()
    {
        $this->assertStringEndsWith('Testing', 'mpwarTesting');
    }

    /** @test */
    public function testingTheAssertSame()
    {
        $foo = 23;
        $this->assertSame(23, $foo);
    }

    /** @test */
    public function testingTheRegExp()
    {
        $exp = '/foo/';
        $this->assertRegExp($exp, 'foo');
    }

    /** @test */
    public function testingTheAssertNull()
    {
        $this->assertNull(null);
    }

    /** @test */
    public function testingTheAssertEmpty()
    {
        $this->assertEmpty(array());
    }

    /** @test */
    public function testingTheAssertContains()
    {
        $this->assertContains(4, array(1, 2, 3, 4));
    }

}

<?php
use PHPUnit\Framework\TestCase;

class Costumer extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            Costumer::class,
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanGetCountry()
    {
        $costumer = new Costumer();
        $this->assertEquals("Cameroon", $costumer->getCountry("(237) 677046616") );
        $this->assertEquals("Ethiopia", $costumer->getCountry("(251) 914701723") );
        $this->assertEquals("Morocco", $costumer->getCountry("(212) 698054317") );
        $this->assertEquals("Mozambique", $costumer->getCountry("(258) 847651504") );
        $this->assertEquals("Uganda", $costumer->getCountry("(256) 775069443") );
        $this->assertEquals("Uganda", $costumer->getCountry("(256) 714660221") );
    }

    public function testCanGetCountryCode()
    {
        $costumer = new Costumer();
        $this->assertEquals("Cameroon", $costumer->getCountry() );
    }
}
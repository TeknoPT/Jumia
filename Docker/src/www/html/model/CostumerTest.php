<?php

use PHPUnit\Framework\TestCase;

class CostumerTest extends TestCase
{

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
        $this->assertEquals("+237", $costumer->getCountryCode("(237) 677046616") );
        $this->assertEquals("+351", $costumer->getCountryCode("(351) 98621354") );
        $this->assertEquals("+251", $costumer->getCountryCode("(251) 914701723") );
        $this->assertEquals("+212", $costumer->getCountryCode("(212) 698054317") );
        $this->assertEquals("+258", $costumer->getCountryCode("(258) 847651504") );
        $this->assertEquals("+256", $costumer->getCountryCode("(256) 775069443") );
        $this->assertEquals("+256", $costumer->getCountryCode("(256) 714660221") );
    }

    public function testCanCheckState(){
        $this->assertEquals("OK", $costumer->checkState("(237) 677046616") );
        $this->assertEquals("OK", $costumer->checkState("(251) 914701723") );
        $this->assertEquals("OK", $costumer->checkState("(212) 698054317") );
        $this->assertEquals("OK", $costumer->checkState("(258) 847651504") );
        $this->assertEquals("OK", $costumer->checkState("(256) 775069443") );
        $this->assertEquals("OK", $costumer->checkState("(256) 714660221") );
        $this->assertEquals("NOK", $costumer->checkState("(237) 6A0311634") );
        $this->assertEquals("NOK", $costumer->checkState("(251) 9119454961") );
    }

    public function testCanGetPhoneNumber(){
        $costumer = new Costumer();
        $this->assertEquals("677046616", $costumer->getPhoneNumber("(237) 677046616") );
        $this->assertEquals("914701723", $costumer->getPhoneNumber("(251) 914701723") );
        $this->assertEquals("698054317", $costumer->getPhoneNumber("(212) 698054317") );
        $this->assertEquals("847651504", $costumer->getPhoneNumber("(258) 847651504") );
        $this->assertEquals("775069443", $costumer->getPhoneNumber("(256) 775069443") );
        $this->assertEquals("714660221", $costumer->getPhoneNumber("(256) 714660221") );
        $this->assertEquals("6A0311634", $costumer->getPhoneNumber("(237) 6A0311634") );
        $this->assertEquals("9119454961", $costumer->getPhoneNumber("(251) 9119454961") );
    }
}
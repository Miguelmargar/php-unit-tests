<?php
    use PHPUnit\Framework\TestCase;

    class StolenLunchTest extends TestCase {
      protected $stolenLunch;

      protected function setUp(): void {
          $this->stolenLunch = new StolenLunch;
      }

      public function testStringIsReturned() {
        $this->assertEquals("", $this->stolenLunch->decifer(""));
      }

      public function testOneGivenEncodedLetter() {
        $this->assertEquals("a", $this->stolenLunch->decifer("0"));
        $this->assertEquals("j", $this->stolenLunch->decifer("9"));
      }

      public function testVariousGivenEncodedLetters() {
        $this->assertEquals("ab", $this->stolenLunch->decifer("01"));
      }

    }

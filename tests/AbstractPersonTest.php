<?php

    use PHPUnit\Framework\TestCase;

    class AbstractPersonTest extends TestCase {

        // Makes use of a child class to test the abstract class itself
        public function testNameAndTitleIsReturned() {
            $doctor = new Doctor("Green");

            $this->assertEquals("Dr. Green", $doctor->getNameAndTitle());
        }

        // No need for child class creation when using getMockBuilder with
        // getMockForAbstractClass()
        public function testNameAndTitleIncludesValueFromGetTitle() {
            $mock = $this->getMockBuilder(AbstractPerson::class)
                         ->setConstructorArgs(['Green'])
                         ->getMockForAbstractClass();

            $mock->method('getTitle')
                 ->willReturn('Dr.');

            $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
        }
    }
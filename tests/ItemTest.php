<?php
    use PHPUnit\Framework\TestCase;

    class ItemTest extends TestCase {
        public function testDescriptionIsNotEmpty() {
            $item = new Item;

            $this->assertNotEmpty($item->getDescription());
        }

        // Testing a protected method in the class uses the child
        // class which in turn extends the parent class and used
        // the parent's method with public visibility
        public function testIdIsAnInteger() {
            $item = new ItemChild;

            $this->assertIsInt($item->getID());
        }

        // To test private methods from a class need to use reflectors
        // as private methods are not inherited by child classes
        public function testTokenIsAString() {
            $item = new Item;

            // Create reflector with class that we need
            $reflector = new ReflectionClass(Item::class);
            // Get the method that we need to test
            $method = $reflector->getMethod('getToken');
            // Set this method to be accessible
            $method->setAccessible(true);
            // This is the result
            $result = $method->invoke($item);
            // Pass this result to the assert statement
            $this->assertIsString($result);
        }
    }
<?php
    use PHPUnit\Framework\TestCase;

    class QueueTest extends TestCase {
        protected static $queue;

        // this method creates the fixture to be used in the rest
        // of the test methods
        protected function setUp(): void {
            // no need to load class file for Queue due to autoload
            static::$queue->clear();
        }

        // Used to clear after a test method - mainly used to clear
        // memory if loads of objects where used and were consuming
        // a lot of memory - most of the time won't need to use it
        protected function tearDown(): void {
            static::$queue->clear();
        }

        // This method is used for tasks that may take longer to set setUp
        // Eg. for a db connection
        // This method is run before the first test method
        // tearDownAfterClass method is the closing of this method to close
        public static function setUpBeforeClass(): void {
            static::$queue = new Queue;
        }

        // Used in conjunction with setUpBeforeClass to close up any aspect
        // Opened up by it
        public static function tearDownAfterClass(): void {
            static::$queue = null;
        }

        public function testNewQueueIsEmpty() {
            $this->assertEquals(0, static::$queue->getCount());
        }

        public function testAnItemIsAddedToTheQueue() {
            static::$queue->push('green');

            $this->assertEquals(1, static::$queue->getCount());

        }

        public function testAnItemIsRemovedFromTheQueue() {
            static::$queue->push('green');
            $item = static::$queue->pop();

            $this->assertEquals(0, static::$queue->getCount());
            $this->assertEquals('green', $item);
        }

        public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
            static::$queue->push('first');
            static::$queue->push('second');

            $this->assertEquals('first', static::$queue->pop());
        }

    }
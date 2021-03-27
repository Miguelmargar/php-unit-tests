<?php
    use PHPUnit\Framework\TestCase;

    class QueueTest extends TestCase {
        protected $queue;

        // this method creates the fixture to be used in the rest
        // of the test methods
        protected function setUp(): void {
            // no need to load class file for Queue due to autoload
            $this->queue = new Queue;
        }

        // Used to clear after a test method - mainly used to clear
        // memory if loads of objects where used and were consuming
        // a lot of memory - most of the time won't need to use it
        protected function tearDown(): void {
            unset($this->queue);
        }

        public function testNewQueueIsEmpty() {
            $this->assertEquals(0, $this->queue->getCount());
        }

        public function testAnItemIsAddedToTheQueue() {
            $this->queue->push('green');

            $this->assertEquals(1, $this->queue->getCount());

        }

        public function testAnItemIsRemovedFromTheQueue() {
            $this->queue->push('green');
            $item = $this->queue->pop();

            $this->assertEquals(0, $this->queue->getCount());
            $this->assertEquals('green', $item);
        }

        public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
            $this->queue->push('first');
            $this->queue->push('second');

            $this->assertEquals('first', $this->queue->pop());
        }

    }
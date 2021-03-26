<?php
    use PHPUnit\Framework\TestCase;

    class QueueTest extends TestCase {

        public function testNewQueueIsEmpty() {
            // no need to load class file due to autoload
            $queue = new Queue;

            $this->assertEquals(0, $queue->getCount());

            return $queue;
        }

        /**
        * @depends testNewQueueIsEmpty
        */
        public function testAnItemIsAddedToTheQueue(Queue $queue) {
            // due to the doc block obove we can pass the $queue variable to this method coming
            // from the first method to avoid repetition.
            // This method test is now known as a consumer and the one above providing the var is
            // now known as a producer.
            $queue->push('green');

            $this->assertEquals(1, $queue->getCount());

            return $queue;
        }

        /**
        * @depends testAnItemIsAddedToTheQueue
        */
        public function testAnItemIsRemovedFromTheQueue(Queue $queue) {

            $item = $queue->pop();

            $this->assertEquals(0, $queue->getCount());
            $this->assertEquals('green', $item);
        }

    }
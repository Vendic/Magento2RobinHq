<?php

namespace Emico\RobinHq\Queue;

use Emico\RobinHqLib\Queue\QueueInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

class EventPublisher implements QueueInterface
{
    /**
     * Topic name
     */
    private const TOPIC_NAME = 'emico.robinhq';

    /**
     * @var PublisherInterface
     */
    private $publisher;

    /**
     * ItemPublisher constructor.
     * @param PublisherInterface $publisher
     */
    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @param string $event
     * @return bool
     */
    public function pushEvent(string $event): bool
    {
        $this->publisher->publish(self::TOPIC_NAME, $event);
        return true;
    }
}

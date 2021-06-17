<?php


namespace TRAW\EventDispatch\Events;


use TRAW\EventDispatch\Domain\Model\Dto\EmConfiguration;
use TRAW\EventDispatch\Service\SettingsService;

/**
 * Class AbstractEventListener
 * @package TRAW\EventDispatch\Events
 */
abstract class AbstractEventListener implements EventListenerInterface
{
    /**
     * @var EmConfiguration
     */
    protected EmConfiguration $settings;

    /**
     * @var string
     */
    protected string $expectedEventClass = AbstractEvent::class;

    /**
     * AbstractEventListener constructor.
     */
    public function __construct()
    {
        $this->settings = SettingsService::getEmSettings();
    }

    /**
     * @param AbstractEvent $event
     * @return mixed|void
     */
    public function __invoke(AbstractEvent $event)
    {
        //check if the event has the expected class
        //event class must extend AbstractEvent:class
        //note: using get_class instead of instanceof, because we want to compare with the sub class
        if ($this->eventListenerIsActive()
            && is_subclass_of($event, AbstractEvent::class)
            && get_class($event) === $this->expectedEventClass
        ) {
            $this->invokeEventAction($event);
        }
    }

    /**
     * @param AbstractEvent $event
     * @return mixed|void
     */
    public function invokeEventAction(AbstractEvent $event)
    {
    }
}
<?php

namespace AppBundle\EventListener;

use AncaRebeca\FullCalendarBundle\Event\CalendarEvent;
use AncaRebeca\FullCalendarBundle\Model\Event;
use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AppBundle\Entity\Schedule;
use Doctrine\ORM\EntityManager;

class LoadDataListener
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return FullCalendarEvent[]
     */
    public function loadData(CalendarEvent $calendarEvent)
    {
        // You can retrieve information from the event dispatcher (eg, You may want which day was selected in the calendar):
        // $startDate = $calendarEvent->getStart();
        // $endDate = $calendarEvent->getEnd();
        // $filters = $calendarEvent->getFilters();

        // You may want do a custom query to populate the events
        // $currentEvents = $repository->findByStartDate($startDate);
        $repository = $this->em->getRepository('AppBundle:Schedule');
        $schedules = $repository->findAll();

        // You may want to add an Event into the Calendar view.
        /** @var Schedule $schedule */
        foreach ($schedules as $schedule) {
            $calendarEvent->addEvent(new Event($schedule->getTitle(), $schedule->getStart()));
        }
    }
}
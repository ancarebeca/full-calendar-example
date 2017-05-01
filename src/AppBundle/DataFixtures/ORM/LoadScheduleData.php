<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Schedule;

class LoadScheduleData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $schedule = new Schedule();
        $schedule->setTitle('Yoga class');
        $today = new \DateTime();
        $schedule->setStart($today);
        $schedule->setEnd($today);
        $manager->persist($schedule);

        $schedule = new Schedule();
        $schedule->setTitle('German class');
        $tomorrow = new \DateTime('tomorrow');
        $schedule->setStart($tomorrow);
        $schedule->setEnd($tomorrow);
        $manager->persist($schedule);

        $manager->flush();
    }
}

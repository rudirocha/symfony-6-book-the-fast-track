<?php

namespace App\EventSubscriber;

use App\Repository\ConferenceRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $conferenceRepository;

    public function __construct(Environment $twig, ConferenceRepository $conferenceRepository)
    {
        $this->twig = $twig;
        $this->conferenceRepository = $conferenceRepository;
    }

    public function onControllerEvent($event): void
    {
        $this->twig->addGlobal('conferences', $this->conferenceRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'Symfony\Component\HttpKernel\Event\ControllerEvent' => 'onControllerEvent',
        ];
    }
}

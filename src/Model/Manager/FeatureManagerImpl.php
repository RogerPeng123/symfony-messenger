<?php


namespace App\Model\Manager;


use App\Entity\Reference\Feature;
use App\Model\FeatureManager;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class FeatureManagerImpl implements FeatureManager
{
    /**
     * @var RegistryInterface
     */
    private $registry;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(RegistryInterface $registry, LoggerInterface $logger)
    {
        $this->registry = $registry;

        $this->logger = $logger;
    }

    public function createFeature(Feature $feature): ?Feature
    {
        $this->registry->getManager()->getRepository(Feature::class);

        $this->registry->getManager()->persist($feature);

        $this->registry->getManager()->flush();

        return $feature;
    }

}
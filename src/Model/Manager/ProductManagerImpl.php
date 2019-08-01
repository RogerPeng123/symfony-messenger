<?php


namespace App\Model\Manager;


use App\Entity\Reference\Feature;
use App\Entity\Reference\Product;
use App\Model\FeatureManager;
use App\Model\ProductManager;
use App\Tools\GetRandTools;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductManagerImpl implements ProductManager
{
    /**
     * @var RegistryInterface
     */
    private $registry;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var FeatureManager
     */
    private $featureManager;

    public function __construct(RegistryInterface $registry, LoggerInterface $logger, FeatureManager $featureManager)
    {
        $this->registry = $registry;

        $this->logger = $logger;

        $this->featureManager = $featureManager;
    }

    public function createProduct(Product $product): ?Product
    {

        $this->registry->getConnection()->beginTransaction();
        try {
            $em = $this->registry->getManager();

            $em->getRepository(Product::class);
            $em->persist($product);
            $em->flush();

            for ($i = 0; $i < 8; $i++) {

                $Feature = new Feature();

                $Feature->setInfo(GetRandTools::getRandStringZh(25));
                $Feature->setProduct($product);
                $Feature->setCreatedAt(new \DateTime('now'));
                $Feature->setUpdatedAt(new \DateTime('now'));

                $this->featureManager->createFeature($Feature);

            }

            $this->registry->getConnection()->commit();
            return $product;
        } catch (\Exception $exception) {

            $this->logger->error('错误信息',
                ['message' => $exception->getMessage()]);


            $this->registry->getConnection()->rollBack();

            return null;
        }

    }

    public function getProductById(int $p_id): ?Product
    {
        return $this->registry->getManager()->find(Product::class, $p_id);
    }


}
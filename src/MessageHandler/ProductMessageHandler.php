<?php


namespace App\MessageHandler;


use App\Entity\Reference\Product;
use App\Message\ProductMessage;
use App\Model\ProductManager;
use App\Tools\GetRandTools;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ProductMessageHandler implements MessageHandlerInterface
{
    /**
     * @var ProductManager
     */
    private $productManager;

    public function __construct(ProductManager $productManager)
    {
        $this->productManager = $productManager;
    }

    public function __invoke(ProductMessage $message)
    {
        $action = $message->getAction();

        switch ($action) {
            case "create":
                $this->createProduct();
                break;
            default:
                $this->createProduct();
        }

        return 'success';
    }

    private function createProduct()
    {
        $Product = new Product();

        $Product->setProductName(GetRandTools::getRandStringZh(5));
        $Product->setCreatedAt(new \DateTime('now'));
        $Product->setUpdatedAt(new \DateTime('now'));

        $productResult = $this->productManager->createProduct($Product);

        if ($productResult === null) {

        }


    }

}
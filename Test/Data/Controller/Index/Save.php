<?php
namespace Test\Data\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Webapi\Rest\Request;
use Test\Data\Api\ImranEntityRepositoryInterface;

class Save extends Action
{
    protected Context $context;

    /**
     * @var $pageFactory
     */

    protected PageFactory $pageFactory;

    /**
     * @var ImranEntityRepositoryInterface
     */
    private ImranEntityRepositoryInterface $ImranEntityRepositoryInterface;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var RedirectFactory
     */
    protected RedirectFactory $redirectFactory;

    public function __construct(
        Context $context,
        pageFactory $pageFactory,
        ImranEntityRepositoryInterface $ImranEntityRepositoryInterface,
        Request $request,
        RedirectFactory $redirectFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->ImranEntityRepositoryInterface = $ImranEntityRepositoryInterface;
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        return parent::__construct($context);
    }

    /**
     * @throws \Exception
     */
    public function execute()
    {

        $id = $this->request->getParam('id');
        $entity= $this->request->getParam('entityid');
        $schooltime = $this->request->getParam('schooltime');
        $feedback = $this->request->getParam('feedback');
        $save = $this->ImranEntityRepositoryInterface->save($id);
        $save->setEntityId($entity);
        $save->setSchoolTime($schooltime);
        $save->setFeedback($feedback);
        $save->save();
        $resultRedirect = $this->redirectFactory->create();
        $resultRedirect->setPath('test/index/display');
        return $resultRedirect;
    }
}

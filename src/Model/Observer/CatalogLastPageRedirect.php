<?php
/**
 * Tweakwise & Emico (https://www.tweakwise.com/ & https://www.emico.nl/) - All Rights Reserved
 *
 * @copyright Copyright (c) 2017-2017 Tweakwise.com B.V. (https://www.tweakwise.com)
 * @license   Proprietary and confidential, Unauthorized copying of this file, via any medium is strictly prohibited
 */

namespace Emico\Tweakwise\Model\Observer;

use Magento\Framework\Event\Observer;

class CatalogLastPageRedirect extends AbstractProductNavigationRequestObserver
{
    /**
     * {@inheritdoc}
     */
    protected function _execute(Observer $observer)
    {
        $properties = $this->context->getResponse()->getProperties();
        if (!$properties->getNumberOfItems()) {
            return;
        }

        $lastPage = $properties->getNumberOfPages();
        $page = $properties->getCurrentPage();
        if ($page <= $lastPage) {
            return;
        }

        $url = $this->urlBuilder->getUrl('*/*/*', [
            '_current' => true,
            '_use_rewrite' => true,
            '_query' => ['p' => $lastPage]
        ]);

        $this->getHttpResponse()->setRedirect($url);
    }
}

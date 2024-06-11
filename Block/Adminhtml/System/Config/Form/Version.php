<?php

declare(strict_types=1);

namespace Lotsofpixels\ReadXml\Block\Adminhtml\System\Config\Form;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface;
use Magento\Backend\Block\Template;
use Magento\Framework\View\Asset\Repository;
use Magento\Store\Model\ScopeInterface;

/**
 *
 */
class Version extends Template implements RendererInterface
{
    /**
     *
     */
    const string MODULE_NAME = 'Lotsofpixels_ReadXml';

    /**
     * @param Context $context
     * @param Repository $moduleAssetDir
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Template\Context     $context,
        Repository           $moduleAssetDir,
        ScopeConfigInterface $scopeConfig,
    )
    {
        $this->_template = 'Lotsofpixels_ReadXml::system/config/version.phtml';
        $this->moduleAssetDir = $moduleAssetDir;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element): string
    {
        $_element = $element;
        return $this->toHtml();
    }

    /**
     * @return string
     */
    public function getVendorLogo(): string
    {
        return $this->moduleAssetDir->getUrl("Lotsofpixels_ReadXml::images/lotsofpixels.png");
    }

    /**
     * @return mixed
     */
    public function getversionNumber(): mixed
    {
        $path = 'lostofpixels_version/details/version';
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getreleaseDate(): mixed
    {
        $path = 'lostofpixels_version/details/last_update';
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
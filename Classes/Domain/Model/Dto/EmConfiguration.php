<?php

namespace TRAW\EventDispatch\Domain\Model\Dto;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This file is part of the "event_dispatch" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * Extension Manager configuration
 */
class EmConfiguration
{
    /**
     * @var int
     */
    protected int $backendUserLogin = 1;
    protected int $afterPackageActivation = 1;
    protected int $afterPackageDeactivation = 1;

    /**
     * Fill the properties properly
     *
     * @param array $configuration em configuration
     */
    public function __construct(array $configuration = [])
    {
        if (empty($configuration)) {
            try {
                $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
                $configuration = $extensionConfiguration->get('event_dispatch');
            } catch (\Exception $exception) {
                // do nothing
            }
        }
        foreach ($configuration as $key => $setting) {
            if (is_array($setting)) {
                foreach ($setting as $subCategory => $value) {
                    $this->addPropertyIfExists($subCategory, $value);
                }
            } else {
                $this->addPropertyIfExists($key, $setting);
            }


        }
    }

    /**
     * @return int
     */
    public function getBackendUserLogin(): int
    {
        return $this->backendUserLogin;
    }

    /**
     * @return int
     */
    public function getAfterPackageActivation(): int
    {
        return $this->afterPackageActivation;
    }

    /**
     * @return int
     */
    public function getAfterPackageDeactivation(): int
    {
        return $this->afterPackageDeactivation;
    }

    /**
     * @param $propertyName
     * @param $propertyValue
     */
    protected function addPropertyIfExists(string $propertyName, $propertyValue)
    {
        if (property_exists(__CLASS__, $propertyName)) {
            $this->$propertyName = $propertyValue;
        }
    }


}

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
    protected int $backendUserLogin = 0;
    /**
     * @var int
     */
    protected int $deleteRecord = 0;

    /**
     * @var int
     */
    protected int $moveRecord = 0;
    /**
     * @var int
     */
    protected int $afterAllDatabaseOperations = 0;
    /**
     * @var int
     */
    protected int $postProcess = 0;
    /**
     * @var int
     */
    protected int $postProcessFieldArray = 0;
    /**
     * @var int
     */
    protected int $preProcessFieldArray = 0;
    /**
     * @var int
     */
    protected int $clearCache = 0;
    /**
     * @var int
     */
    protected int $afterPackageActivation = 0;
    /**
     * @var int
     */
    protected int $afterPackageDeactivation = 0;
    /**
     * @var int
     */
    protected int $beforePackageActivation = 0;
    /**
     * @var int
     */
    protected int $emitAfterExtensionT3DImportSignal = 0;
    /**
     * @var int
     */
    protected int $emitAfterExtensionStaticSqlImportSignal = 0;
    /**
     * @var int
     */
    protected int $emitAfterExtensionFileImportSignal = 0;
    /**
     * @var int
     */
    protected int $emitProcessActionsSignal = 0;
    /**
     * @var int
     */
    protected int $packagesMayHaveChanged = 0;

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
    public function getPreProcessFieldArray(): int
    {
        return $this->preProcessFieldArray;
    }

    /**
     * @return int
     */
    public function getPostProcessFieldArray(): int
    {
        return $this->postProcessFieldArray;
    }

    /**
     * @return int
     */
    public function getPostProcess(): int
    {
        return $this->postProcess;
    }

    /**
     * @return int
     */
    public function getClearCache(): int
    {
        return $this->clearCache;
    }

    /**
     * @return int
     */
    public function getMoveRecord(): int
    {
        return $this->moveRecord;
    }

    /**
     * @return int
     */
    public function getAfterAllDatabaseOperations(): int
    {
        return $this->afterAllDatabaseOperations;
    }

    /**
     * @return int
     */
    public function getDeleteRecord(): int
    {
        return $this->deleteRecord;
    }

    /**
     * @return int
     */
    public function getBeforePackageActivation(): int
    {
        return $this->beforePackageActivation;
    }

    /**
     * @return int
     */
    public function getEmitAfterExtensionT3DImportSignal(): int
    {
        return $this->emitAfterExtensionT3DImportSignal;
    }

    /**
     * @return int
     */
    public function getEmitAfterExtensionStaticSqlImportSignal(): int
    {
        return $this->emitAfterExtensionStaticSqlImportSignal;
    }

    /**
     * @return int
     */
    public function getEmitAfterExtensionFileImportSignal(): int
    {
        return $this->emitAfterExtensionFileImportSignal;
    }

    /**
     * @return int
     */
    public function getEmitProcessActionsSignal(): int
    {
        return $this->emitProcessActionsSignal;
    }

    /**
     * @return int
     */
    public function getPackagesMayHaveChanged(): int
    {
        return $this->packagesMayHaveChanged;
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

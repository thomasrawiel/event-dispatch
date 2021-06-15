<?php

namespace TRAW\EventDispatch\Events\Packages;

use TRAW\EventDispatch\Events\AbstractEventListener;
use TYPO3\CMS\Core\Package\Event\AfterPackageActivationEvent;
use TYPO3\CMS\Core\Package\Event\AfterPackageDeactivationEvent;
use TYPO3\CMS\Core\Package\Event\BeforePackageActivationEvent;
use TYPO3\CMS\Core\Package\Event\PackagesMayHaveChangedEvent;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionDatabaseContentHasBeenImportedEvent;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionFilesHaveBeenImportedEvent;
use TYPO3\CMS\Extensionmanager\Event\AvailableActionsForExtensionEvent;

/**
 * Class PackageEventListener
 * @package TRAW\EventDispatch\Events\Packages
 */
class PackageEventListener extends AbstractEventListener
{
    /**
     * @param BeforePackageActivationEvent $event
     */
    public function beforePackageActivation(BeforePackageActivationEvent $event)
    {
        if ($this->settings->getBeforePackageActivation()) {
            //
        }
    }

    /**
     * @param AfterPackageActivationEvent $event
     */
    public function afterPackageActivation(AfterPackageActivationEvent $event)
    {
        if ($this->settings->getAfterPackageActivation()) {
            //
        }
    }

    /**
     * @param AfterPackageDeactivationEvent $event
     */
    public function afterPackageDeactivation(AfterPackageDeactivationEvent $event)
    {

    }

    /**
     * @param AfterExtensionDatabaseContentHasBeenImportedEvent $event
     */
    public function emitAfterExtensionT3DImportSignal(AfterExtensionDatabaseContentHasBeenImportedEvent $event)
    {

    }

    /**
     * @param AfterExtensionDatabaseContentHasBeenImportedEvent $event
     */
    public function emitAfterExtensionStaticSqlImportSignal(AfterExtensionDatabaseContentHasBeenImportedEvent $event)
    {

    }

    /**
     * @param AfterExtensionFilesHaveBeenImportedEvent $event
     */
    public function emitAfterExtensionFileImportSignal(AfterExtensionFilesHaveBeenImportedEvent $event)
    {

    }

    /**
     * @param AvailableActionsForExtensionEvent $event
     */
    public function emitProcessActionsSignal(AvailableActionsForExtensionEvent $event)
    {

    }

    /**
     * @param PackagesMayHaveChangedEvent $event
     */
    public function packagesMayHaveChanged(PackagesMayHaveChangedEvent $event)
    {

    }
}

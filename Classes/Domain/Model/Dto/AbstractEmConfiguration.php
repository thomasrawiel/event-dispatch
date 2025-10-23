<?php
declare(strict_types=1);

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
abstract class AbstractEmConfiguration
{
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
            } catch (\Exception) {
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
     * @param $propertyName
     * @param $propertyValue
     */
    protected function addPropertyIfExists(string $propertyName, mixed $propertyValue)
    {
        if (!property_exists($this, $propertyName)) {
            return;
        }

        $reflection = new \ReflectionProperty($this, $propertyName);
        $type = $reflection->getType();

        // No declared type → just assign
        if ($type === null) {
            $this->$propertyName = $propertyValue;
            return;
        }

        $expectedType = $type->getName();
        $isNullable = $type->allowsNull();

        if ($propertyValue === null && $isNullable) {
            $this->$propertyName = null;
            return;
        }

        // normalize string input if necessary
        if (is_string($propertyValue)) {
            $trimmed = trim($propertyValue);
            switch ($expectedType) {
                case 'int':
                    if (is_numeric($trimmed)) {
                        $propertyValue = (int)$trimmed;
                    }
                    break;
                case 'float':
                    if (is_numeric($trimmed)) {
                        $propertyValue = (float)$trimmed;
                    }
                    break;
                case 'bool':
                    // typical config values like "1", "true", "yes", "on"
                    $propertyValue = in_array(strtolower($trimmed), ['1', 'true', 'yes', 'on'], true);
                    break;
                case 'string':
                    // already string, do nothing
                    break;
                case 'array':
                    $propertyValue = GeneralUtility::trimExplode(',', $trimmed, true);
                    break;
                default:
                    // try JSON decode for complex or object types
                    if (is_string($trimmed)) {
                        $decoded = json_decode($trimmed, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $propertyValue = $decoded;
                        }
                    }
            }
        }

        // final validation before assignment
        $actualType = get_debug_type($propertyValue);
        $isCompatible = match ($expectedType) {
            'int' => is_int($propertyValue),
            'float' => is_float($propertyValue),
            'string' => is_string($propertyValue),
            'bool' => is_bool($propertyValue),
            'array' => is_array($propertyValue),
            default => $propertyValue instanceof $expectedType,
        };

        if (!$isCompatible) {
            throw new \TypeError(sprintf(
                'Cannot assign value of type %s to property %s::$%s of type %s',
                $actualType,
                static::class,
                $propertyName,
                $expectedType . ($isNullable ? '|null' : '')
            ));
        }

        $this->$propertyName = $propertyValue;
    }
}

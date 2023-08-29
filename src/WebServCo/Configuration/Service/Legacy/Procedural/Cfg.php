<?php

declare(strict_types=1);

namespace WebServCo\Configuration\Service\Legacy\Procedural;

use WebServCo\Configuration\Contract\ConfigurationGetterInterface;
use WebServCo\Configuration\Factory\ServerConfigurationGetterFactory;
use WebServCo\Configuration\Service\ConfigurationFileProcessor;
use WebServCo\Configuration\Service\IniServerConfigurationContainer;

/**
 * Configuration helper class.
 *
 * Legacy code patching/migration; uses static methods in order to avoid manually modifying all procedural functions.
 */
final class Cfg
{
    public static function createConfigurationGetter(): ConfigurationGetterInterface
    {
        // Use default service
        $factory = new ServerConfigurationGetterFactory();

        return $factory->createConfigurationGetter();
    }

    /**
     * If possible use an object-oriented approach and avoid using this helper method
     * (it creates a ConfigurationGetterInterface object on each call)
     *
     * @return array<int,bool|float|int|string|null>
     */
    public static function getArray(string $key): array
    {
        $configurationGetter = self::createConfigurationGetter();

        return $configurationGetter->getArray($key);
    }

    /**
     * If possible use an object-oriented approach and avoid using this helper method
     * (it creates a ConfigurationGetterInterface object on each call)
     */
    public static function getBool(string $key): bool
    {
        $configurationGetter = self::createConfigurationGetter();

        return $configurationGetter->getBool($key);
    }

    /**
     * If possible use an object-oriented approach and avoid using this helper method
     * (it creates a ConfigurationGetterInterface object on each call)
     */
    public static function getInt(string $key): int
    {
        $configurationGetter = self::createConfigurationGetter();

        return $configurationGetter->getInt($key);
    }

    /**
     * If possible use an object-oriented approach and avoid using this helper method
     * (it creates a ConfigurationGetterInterface object on each call)
     */
    public static function getString(string $key): string
    {
        $configurationGetter = self::createConfigurationGetter();

        return $configurationGetter->getString($key);
    }

    public static function processConfigurationFile(string $projectPath, string $configurationDirectory = 'config', string $configurationFile = '.env.ini'): bool
    {
        $configurationContainer = new IniServerConfigurationContainer();
        $configurationFileProcessor = new ConfigurationFileProcessor(
            $configurationContainer->getConfigurationDataProcessor(),
            $configurationContainer->getConfigurationLoader(),
            $configurationContainer->getConfigurationSetter(),
        );
        return $configurationFileProcessor->processConfigurationFile(
            $projectPath,
            $configurationDirectory,
            $configurationFile,
        );
    }
}

# webservco/configuration-legacy

A PHP component/library. Please see [webservco/sandbox](https://webservco.github.io/sandbox/) for an example project using these types of components.

Static configuration helper for legacy procedural code that can't easily receive objects.

- Related: `webservco/configuration` (does the actual work), `webservco/database-legacy` (reads its database settings through this helper)

---

## Installation

```shell
composer require webservco/configuration-legacy
```

---

## Usage

### Load the configuration file

`config/.env.ini`:

```ini
[Database]

DB_HOST = 127.0.0.1
DB_USER = db
DB_PASSWORD = db
DB_NAME = db
```

```php
use WebServCo\Configuration\Service\Legacy\Procedural\Cfg;

// Defaults to config/.env.ini inside the project path.
Cfg::processConfigurationFile($projectPath);
```

### Read values

```php
use WebServCo\Configuration\Service\Legacy\Procedural\Cfg;

$host = Cfg::getString('DB_HOST');
```

---

## Contracts

| Interface | Implementation | Purpose |
| --- | --- | --- |
| none | `Service\Legacy\Procedural\Cfg` | Static `processConfigurationFile()`, `getString()`, `getInt()`, `getBool()` and `getArray()`. |

Namespaces are relative to `WebServCo\Configuration\`.

---

## Notes

Each getter call creates a new configuration getter object. Old code can live with that. New code should use `ConfigurationGetterInterface` from `webservco/configuration` directly. Both packages store values the same way, and each can read what the other loaded.

---

## Development

```shell
# Start project.
ddev start
# Install dependencies.
ddev c u
# Run all validations.
ddev c c
# Run unit tests.
ddev c test:dox
```

---

## License

[MIT](LICENSE.md)

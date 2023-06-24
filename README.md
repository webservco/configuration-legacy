# webservco/configuration-legacy

Helper for legacy projects that have to use a procedural approach.

## Setup

Composer require:

```json
"webservco/configuration-legacy": "^0"
```

## Usage

### Process configuration file

`config/.env.ini`

```ini
[Database]

DB_HOST = 127.0.0.1
DB_USER = db
DB_PASSWORD = db
DB_NAME = db
```

```php
use WebServCo\Configuration\Service\Legacy\Procedural\Cfg;

Cfg::processConfigurationFile($projectPath);
```

### Read configuration data

```php
use WebServCo\Configuration\Service\Legacy\Procedural\Cfg;

$host = Cfg::getString('DB_HOST');
```

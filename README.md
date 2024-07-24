# OOP wrapper for APCu functions

The simplest OOP wrapper for APCu functions

## Installing

```bash
composer require brenno-duarte/apcu-oop
```

## How to use

Firstly, you must instantiate the `APCu` class.

```php
use APCU\APCu;

$apcu = new APCu();
```

The methods available in this class are similar to those of the APCu functions.

| Functions            | OOP |
| ---                  | --- |
| `apcu_add()`         | `$apcu->add()` |
| `apcu_cache_info()`  | `$apcu->cacheInfo()` |
| `apcu_cas()`         | `$apcu->cas()` |
| `apcu_clear_cache()` | `$apcu->clearCache()` |
| `apcu_dec()`         | `$apcu->decrease()` |
| `apcu_delete()`      | `$apcu->delete()` |
| `apcu_enabled()`     | `$apcu->enabled()` |
| `apcu_entry()`       | `$apcu->entry()` |
| `apcu_exists()`      | `$apcu->exists()` |
| `apcu_fetch()`       | `$apcu->fetch()` |
| `apcu_inc()`         | `$apcu->increase()` |
| `apcu_key_info()`    | `$apcu->keyInfo()` |
| `apcu_sma_info()`    | `$apcu->smaInfo()` |
| `apcu_store()`       | `$apcu->store()` |
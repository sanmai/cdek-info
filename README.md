![](logo.png)

# Набор справочников для СДЭК PHP SDK

[![Latest Stable Version](https://poser.pugx.org/sanmai/cdek-info/v/stable)](https://packagist.org/packages/sanmai/cdek-info)
[![Build Status](https://travis-ci.org/sanmai/cdek-info.svg?branch=master)](https://travis-ci.org/sanmai/cdek-info)
[![Coverage Status](https://coveralls.io/repos/github/sanmai/cdek-info/badge.svg?branch=master)](https://coveralls.io/github/sanmai/cdek-info?branch=master)
[![Telegram Chat](https://img.shields.io/badge/telegram-chat-blue.svg?logo=telegram)](https://t.me/phpcdeksdk)

<a href="https://www.cdek.ru/"><img align="right" src="https://gist.githubusercontent.com/sanmai/b105b3e2b5af030d5f1a8fb7db965f07/raw/308840dc54c3b1f02153f7318f02f87f30d4c5bd/cdek_logo.png"></a>

Перед вами набор справочников для [программного комплекса СДЭК](https://www.cdek.ru/clients/integrator.html).

Возможности:

- [ ] справочник статусов заказов
- [ ] справочник методов доставки
- [ ] ...
- Чего-то нет в списке? [Напишите, сообщите.](https://github.com/sanmai/cdek-info/issues/new/choose)

## Установка

```bash
composer require sanmai/cdek-info
```
Требования — минимальны. Нужен PHP 7.0 или выше. Работа протестирована под PHP 7.0, 7.1, 7.2.


## Пример использования

```php
require_once 'vendor/autoload.php';

$orderStatusList = new \CdekSDK\Reference\OrderStatus();

foreach ($orderStatusList as $id => $description) {
    echo "$id\t$description\n";
}
```

## Замечания

- [Инструкции по доработке и тестированию.](CONTRIBUTING.md)
- [Общие инструкции по работе с GitHub.](https://www.alexeykopytko.com/2018/github-contributor-guide/) Если это ваш первый PR, очень рекомендуем ознакомиться.

## Лицензия

Данный набор справочников распространяется [под лицензией MIT](LICENSE).

This project is licensed under the terms of the MIT license.

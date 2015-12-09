ELasticlog Insert

=====

[![Latest Stable Version](http://img.shields.io/packagist/v/jenssegers/agent.svg)](https://packagist.org/packages/jenssegers/agent) [![Total Downloads](http://img.shields.io/packagist/dm/jenssegers/agent.svg)](https://packagist.org/packages/jenssegers/agent) [![Build Status](http://img.shields.io/travis/jenssegers/agent.svg)](https://travis-ci.org/jenssegers/agent) [![Coverage Status](http://img.shields.io/coveralls/jenssegers/agent.svg)](https://coveralls.io/r/jenssegers/agent)

A PHP desktop/mobile user agent parser with support for Laravel, based on [Mobile Detect](https://github.com/serbanghita/Mobile-Detect) with desktop support and additional functionality.

<p align="center">
<img src="http://jenssegers.be/uploads/images/agent.png?v4" height="275">
</p>

目前還欠缺test case
1. 測試進來的資料是否是array
2. 測試不預期的資料寫進來
3. 檢查是否 push 到 aws queue

Installation
------------

Install using composer:

```bash
composer require liquirice/elasticlog
```

Laravel (optional)
------------------

Add the service provider in `app/config/app.php`:

```php
'Jenssegers\Agent\AgentServiceProvider',
```

We have already added the Agent alias for you:

```php
'Agent' => 'Jenssegers\Agent\Facades\Agent',
```

Basic Usage
-----------

Start by creating an `Agent` instance (or use the `Agent` Facade if you are using Laravel):

```php
use Jenssegers\Agent\Agent;

$agent = new Agent();
```

```
Elasticlog::pushToQueue(array(
    'user_id' => '1',
    'action' => 'click',
    'object' => 'event',
    'object_id' => '50786',
    'param' => '',
))
```

## License

Laravel User Agent is licensed under [The MIT License (MIT)](LICENSE).

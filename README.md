Logging for errors in Mezzio
=====================================

[![GitHub Actions: Run tests](https://github.com/zfegg/stratigility-logging-error/workflows/qa/badge.svg)](https://github.com/zfegg/stratigility-logging-error/actions?query=workflow%3A%22qa%22)
[![Coverage Status](https://coveralls.io/repos/github/zfegg/stratigility-logging-error/badge.svg?branch=master)](https://coveralls.io/github/zfegg/stratigility-logging-error?branch=master)
[![Latest Stable Version](https://poser.pugx.org/zfegg/stratigility-logging-error/v/stable.png)](https://packagist.org/packages/zfegg/stratigility-logging-error)


实现 mezzio 记录错误日志功能, 使用PSR3记录日志.

Implement mezzio logging errors.

See https://docs.zendframework.com/zend-mezzio/features/error-handling/#listening-for-errors

使用说明/Usage
--------------

1. Install via composer.

   通过 composer 安装依赖.

   ```bash
   composer require zfegg/stratigility-logging-error
   ```

2. Add `ConfigProvider::class` in `config/config.php`. 

   在 `config/config.php` 中添加 `ConfigProvider::class` 配置.

3. Configure your `Psr\Log\LoggerInterface::class` service.

   在你的服务中配置 `Psr\Log\LoggerInterface::class` (PSR3日志实现)服务.

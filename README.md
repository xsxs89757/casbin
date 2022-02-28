# webman casbin 权限控制插件

webman casbin 权限控制插件。它基于 [PHP-Casbin](https://github.com/php-casbin/php-casbin), 一个强大的、高效的开源访问控制框架，支持基于`ACL`, `RBAC`, `ABAC`等访问控制模型。


## 安装

```sh
composer require qifen/casbin
```

## 配置

### 数据库配置

（1）修改数据库 `database` 配置

（2）执行 `php phinx migrate -e dev -t create_casbin_rule` 导入数据库

（3）配置 `config/redis` 配置

## 重启webman

```
php start.php restart
```
或者
```
php start.php restart -d
```

## 用法

### 快速开始

安装成功后，可以这样使用:

```php
use Qifen\Casbin\Permission;

// adds permissions to a user
Permission::addPermissionForUser('eve', 'articles', 'read');
// adds a role for a user.
Permission::addRoleForUser('eve', 'writer');
// adds permissions to a rule
Permission::addPolicy('writer', 'articles','edit');
```

你可以检查一个用户是否拥有某个权限:

```php
if (Permission::enforce("eve", "articles", "edit")) {
    echo '恭喜你！通过权限认证';
} else {
    echo '对不起，您没有该资源访问权限';
}
```

更多 `API` 参考 [Casbin API](https://casbin.org/docs/en/management-api) 。

## 为什么要使用Redis

1. 由于webman是基于workerman的常驻内存框架。运行模式为多进程，而多进程中数据是互相隔离的。
2. 在webman中使用casbin，当`Enforcer`中的策略发生变化时，调用 `Watcher`，向消息队列（MQ）中推动消息，监听该消息队列的`Enforcer`收到后，自动刷新该实例中的策略
3. 这里通过 `workerman/redis` 的发布订阅模式实现

> 注意：在 `PHP-FPM` 环境下，并不需要Watcher，因为每个请求都是一个独立的fpm进程，都会实例化一个全新的`Enforcer`

## 感谢

[Casbin](https://github.com/php-casbin/php-casbin)，你可以查看全部文档在其 [官网](https://casbin.org/) 上。

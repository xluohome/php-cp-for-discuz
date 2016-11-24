#前言
本方案是基于 Discuz x3 驱动类库实现。实现了原生PDO 类(db_driver_pdomysql.php)和PdoProxy类(db_driver_pdoproxymysql.php)，其中 PdoProxy 基于php-cp的实现；

#基本要求：

- PHP 5.3 + (no zts)
- linux 2.6+
- pdo and redis extension install
- Discuz x3  （x3.0 以上都支持）


# Discuz x3 使用php-cp连接池中间件


安装步骤如下：

1. 安装 php-cp，并配置/etc/pool.ini 。 请参考[https://github.com/swoole/php-cp];
2. 安装php pdo-mysql 扩展 ，记得重启php 。 请参考[http://php.net/manual/zh/ref.pdo-mysql.php ]，如果您的php配置已经支持pdo_mysql，请跳过这步;
3. 启动 pool_server (如： nohup  /usr/local/php/bin/php ./pool_server start );
4. 上传php-cp-for-discuz中的php文件（目录）到 Discuz的安装目录(记得备份待覆盖的文件);
5. 修改dz配置文件 config/config_global.php , 加入 $_config['db']['driver'] = 'db_driver_pdoproxymysql';
6. 在浏览打开 http://www.****.com/testx3.php （*** 改为你的论坛域名） 如果能正常的输出所有内容，即安装成功；

# Discuz x3 使用原生PDO_MYSQL

安装步骤如下：

1. 安装php pdo-mysql 扩展 ，记得重启php 。 请参考[http://php.net/manual/zh/ref.pdo-mysql.php ]，如果您的php配置已经支持pdo_mysql，请跳过这步;
2. 上传php-cp-for-discuz中的php文件（目录）到 Discuz的安装目录(记得备份待覆盖的文件);
3. 修改dz配置文件 config/config_global.php , 加入 $_config['db']['driver'] = 'db_driver_pdomysql';
4. 在浏览打开 http://www.****.com/testx3.php （*** 改为你的论坛域名） 如果能正常的输出所有内容，即安装成功；


# 建议意见

如果在使用这个方案中碰到问题或有好的建议可以加 QQ群:309020981  (暗号：discuz)

---
* 注1：Discuz x3 默认不支持PDO_MYSQL ， 只支持 mysql 和 mysqli。
* 注2：修改dz配置文件  config/config_global.php  可参考 config/#config_global_php_cp.php 


# License

Apache License Version 2.0 see http://www.apache.org/licenses/LICENSE-2.0.html
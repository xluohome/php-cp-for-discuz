<?php

/**
 *      test 
 */
define('APPTYPEID', 127);
define('CURSCRIPT', 'plugin');


require './source/class/class_core.php';

$discuz = C::app();

$discuz->init();


echo <<<'EOF'

######################################################

Discuz x3 ， pdomysql 及 pdoproxy 驱动类库单元测试！

请确保已经在config/config_global.php启用了 db_driver_pdomysql 或 db_driver_pdoproxymysql；

EOF;

echo <<<'EOF'

######################################################


$str="'dfdsf''--dsfasdfdsf;'''s";

echo mysql_escape_string($str);
echo "\r\n";
echo DB::object()->escape_string($str);
echo "\r\n";
echo DB::quote($str);
result:

EOF;

$str="'dfdsf''--dsfasdfdsf;'''s";

echo mysql_escape_string($str);
echo "\r\n";

echo DB::object()->escape_string($str);
echo "\r\n";
echo DB::quote($str);


echo <<<'EOF'

######################################################
$query = DB::query("SELECT * FROM %t WHERE  uid < %d ", ['common_member', 10]);

while ($row = DB::fetch($query)) {

     echo $row['username'],"\r\n";
}

result:
EOF;

echo "\r\n";


$query = DB::query("SELECT * FROM %t WHERE  uid < %d ", ['common_member', 10]);

while ($row = DB::fetch($query)) {

    echo $row['username'],"\r\n";
}


echo <<<'EOF'

######################################################
print_r(DB::fetch_all("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10]));

 result:
EOF;
echo "\r\n";

print_r(DB::fetch_all("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10]));

echo <<<'EOF'

######################################################
print_r(DB::fetch_all("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10], 'username'));

 result:
EOF;

echo "\r\n";

print_r(DB::fetch_all("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10], 'username'));


echo <<<'EOF'

######################################################
print_r(DB::fetch_first("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10]));

 result:
EOF;

echo "\r\n";

print_r(DB::fetch_first("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10]));


echo <<<'EOF'

######################################################
print_r(DB::result_first("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10]));

 result:
EOF;
echo "\r\n";

print_r(DB::result_first("SELECT * FROM %t WHERE  uid < %d", ['common_member', 10]));




echo <<<'EOF'

######################################################
DB::object()->beginTransaction(); //开启事务
 
$uid = DB::result_first("SELECT uid FROM %t WHERE  uid < %d", ['common_member', 10]);

if ($uid > 0) {


    C::t('common_member_status')->update($uid,['lastactivity' => TIMESTAMP]);
}
  
echo $uid;

echo "=> \r\n";

$user = DB::fetch_first("SELECT * FROM %t WHERE  uid = %d", ['common_member_status', $uid]);
 
print_r($user);

DB::object()->rollBack();

$user = DB::fetch_first("SELECT * FROM %t WHERE  uid = %d", ['common_member_status', $uid]);

print_r($user);
 

lastactivity 这个值应该不会变化

 result:
EOF;


 
 
DB::object()->beginTransaction(); //开启事务
 
$uid = DB::result_first("SELECT uid FROM %t WHERE  uid < %d", ['common_member', 10]);

if ($uid > 0) {


    C::t('common_member_status')->update($uid,['lastactivity' => TIMESTAMP]);
}
  
echo $uid;

echo "=> \r\n";

$user = DB::fetch_first("SELECT * FROM %t WHERE  uid = %d", ['common_member_status', $uid]);
 
print_r($user);

DB::object()->rollBack();

$user = DB::fetch_first("SELECT * FROM %t WHERE  uid = %d", ['common_member_status', $uid]);

print_r($user);
 

echo "######################################################\r\n Done";

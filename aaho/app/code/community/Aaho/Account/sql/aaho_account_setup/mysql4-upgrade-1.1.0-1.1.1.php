<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer->startSetup();
$installer->run("
CREATE TABLE `aaho_account_orders` (
  `id` bigint(250) NOT NULL,
  `cust_id` bigint(10) NOT NULL,
  `table_no` int(2) NOT NULL,
  `order_no` bigint(10) NOT NULL,
  `items` varchar(10240) NOT NULL,
  `price` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
");
$installer->endSetup();


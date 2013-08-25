drop database store;  create database store; use store;
CREATE TABLE `product` (
  `entity_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Entity ID',
  `sku` varchar(64) DEFAULT NULL COMMENT 'SKU',
  PRIMARY KEY (`entity_id`),
  KEY `IDX_PRODUCT_SKU` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Table';


CREATE TABLE `eav_attribute` (
  `attribute_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Attribute Id',
  `attribute_code` varchar(255) DEFAULT NULL COMMENT 'Attribute Code',
  `frontend_label` varchar(255) DEFAULT NULL COMMENT 'Attribute Code',
  PRIMARY KEY (`attribute_id`),
  UNIQUE KEY `UNQ_EAV_ATTRIBUTE_ATTRIBUTE_CODE` (`attribute_code`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Eav Attribute';

CREATE TABLE `product_varchar` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Value ID',
  `attribute_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Attribute ID',
  `entity_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Entity ID',
  `value` varchar(255) DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`value_id`),
  UNIQUE KEY `UNQ_CAT_PRD_ENTT_VCHR_ENTT_ID_ATTR_ID` (`entity_id`,`attribute_id`),
  KEY `IDX_PRODUCT_VARCHAR_ENTITY_ID` (`entity_id`),
  CONSTRAINT `PRODUCT_ENTITY` FOREIGN KEY (`entity_id`) REFERENCES `product` (`entity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_CAT_PRD_VCHR_ATTR_ID_EAV_ATTR_ATTR_ID` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Catalog Product Varchar Attribute Backend Table';

insert into eav_attribute VALUES ( 1, 'name', 'Name'),  ( 2, 'desc', 'Description');
insert into product VALUES ( 1, 'ASD'),  ( 2, 'ZXC');
insert into product_varchar VALUES ( 1, 1, 1, 'name1'), ( 2, 2, 1, 'desc1');
insert into product_varchar VALUES ( 3, 1, 2, 'name2'), ( 4, 2, 2, 'desc2');


insert into product (entity_id,sku )SELECT t.entity_id, t.sku from mage.catalog_product_entity t limit 4,50;

insert into product_varchar (
attribute_id,entity_id,value
) SELECT 2, p.entity_id, t.value
from product p join mage.catalog_product_entity_varchar t 
on p.entity_id = t.entity_id and t.attribute_id= 165;

insert into product_varchar (
attribute_id,entity_id,value
) SELECT 1, p.entity_id, t.value
from product p join mage.catalog_product_entity_varchar t 
on p.entity_id = t.entity_id and t.attribute_id= 169;

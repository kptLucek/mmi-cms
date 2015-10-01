<?php

namespace Cms\Orm;

//<editor-fold defaultstate="collapsed" desc="CmsStatDateQuery">
/**
 * @method CmsStatDateQuery limit($limit = null)
 * @method CmsStatDateQuery offset($offset = null)
 * @method CmsStatDateQuery orderAsc($fieldName, $tableName = null)
 * @method CmsStatDateQuery orderDesc($fieldName, $tableName = null)
 * @method CmsStatDateQuery andQuery(\Mmi\Orm\Query $query)
 * @method CmsStatDateQuery whereQuery(\Mmi\Orm\Query $query)
 * @method CmsStatDateQuery orQuery(\Mmi\Orm\Query $query)
 * @method CmsStatDateQuery resetOrder()
 * @method CmsStatDateQuery resetWhere()
 * @method QueryHelper\CmsStatDateQueryField whereId()
 * @method QueryHelper\CmsStatDateQueryField andFieldId()
 * @method QueryHelper\CmsStatDateQueryField orFieldId()
 * @method CmsStatDateQuery orderAscId()
 * @method CmsStatDateQuery orderDescId()
 * @method CmsStatDateQuery groupById()
 * @method QueryHelper\CmsStatDateQueryField whereHour()
 * @method QueryHelper\CmsStatDateQueryField andFieldHour()
 * @method QueryHelper\CmsStatDateQueryField orFieldHour()
 * @method CmsStatDateQuery orderAscHour()
 * @method CmsStatDateQuery orderDescHour()
 * @method CmsStatDateQuery groupByHour()
 * @method QueryHelper\CmsStatDateQueryField whereDay()
 * @method QueryHelper\CmsStatDateQueryField andFieldDay()
 * @method QueryHelper\CmsStatDateQueryField orFieldDay()
 * @method CmsStatDateQuery orderAscDay()
 * @method CmsStatDateQuery orderDescDay()
 * @method CmsStatDateQuery groupByDay()
 * @method QueryHelper\CmsStatDateQueryField whereMonth()
 * @method QueryHelper\CmsStatDateQueryField andFieldMonth()
 * @method QueryHelper\CmsStatDateQueryField orFieldMonth()
 * @method CmsStatDateQuery orderAscMonth()
 * @method CmsStatDateQuery orderDescMonth()
 * @method CmsStatDateQuery groupByMonth()
 * @method QueryHelper\CmsStatDateQueryField whereYear()
 * @method QueryHelper\CmsStatDateQueryField andFieldYear()
 * @method QueryHelper\CmsStatDateQueryField orFieldYear()
 * @method CmsStatDateQuery orderAscYear()
 * @method CmsStatDateQuery orderDescYear()
 * @method CmsStatDateQuery groupByYear()
 * @method QueryHelper\CmsStatDateQueryField whereObject()
 * @method QueryHelper\CmsStatDateQueryField andFieldObject()
 * @method QueryHelper\CmsStatDateQueryField orFieldObject()
 * @method CmsStatDateQuery orderAscObject()
 * @method CmsStatDateQuery orderDescObject()
 * @method CmsStatDateQuery groupByObject()
 * @method QueryHelper\CmsStatDateQueryField whereObjectId()
 * @method QueryHelper\CmsStatDateQueryField andFieldObjectId()
 * @method QueryHelper\CmsStatDateQueryField orFieldObjectId()
 * @method CmsStatDateQuery orderAscObjectId()
 * @method CmsStatDateQuery orderDescObjectId()
 * @method CmsStatDateQuery groupByObjectId()
 * @method QueryHelper\CmsStatDateQueryField whereCount()
 * @method QueryHelper\CmsStatDateQueryField andFieldCount()
 * @method QueryHelper\CmsStatDateQueryField orFieldCount()
 * @method CmsStatDateQuery orderAscCount()
 * @method CmsStatDateQuery orderDescCount()
 * @method CmsStatDateQuery groupByCount()
 * @method QueryHelper\CmsStatDateQueryField andField($fieldName, $tableName = null)
 * @method QueryHelper\CmsStatDateQueryField where($fieldName, $tableName = null)
 * @method QueryHelper\CmsStatDateQueryField orField($fieldName, $tableName = null)
 * @method QueryHelper\CmsStatDateQueryJoin join($tableName, $targetTableName = null)
 * @method QueryHelper\CmsStatDateQueryJoin joinLeft($tableName, $targetTableName = null)
 * @method CmsStatDateRecord[] find()
 * @method CmsStatDateRecord findFirst()
 * @method CmsStatDateRecord findPk($value)
 */
//</editor-fold>
class CmsStatDateQuery extends \Mmi\Orm\Query {

	protected $_tableName = 'cms_stat_date';

	/**
	 * @return CmsStatDateQuery
	 */
	public static function factory($tableName = null) {
		return new self($tableName);
	}

}
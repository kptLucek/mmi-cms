<?php

namespace Cms\Orm;

//<editor-fold defaultstate="collapsed" desc="CmsAuthQuery">
/**
 * @method CmsAuthQuery limit($limit = null)
 * @method CmsAuthQuery offset($offset = null)
 * @method CmsAuthQuery orderAsc($fieldName, $tableName = null)
 * @method CmsAuthQuery orderDesc($fieldName, $tableName = null)
 * @method CmsAuthQuery andQuery(\Mmi\Orm\Query $query)
 * @method CmsAuthQuery whereQuery(\Mmi\Orm\Query $query)
 * @method CmsAuthQuery orQuery(\Mmi\Orm\Query $query)
 * @method CmsAuthQuery resetOrder()
 * @method CmsAuthQuery resetWhere()
 * @method QueryHelper\CmsAuthQueryField whereId()
 * @method QueryHelper\CmsAuthQueryField andFieldId()
 * @method QueryHelper\CmsAuthQueryField orFieldId()
 * @method CmsAuthQuery orderAscId()
 * @method CmsAuthQuery orderDescId()
 * @method CmsAuthQuery groupById()
 * @method QueryHelper\CmsAuthQueryField whereLang()
 * @method QueryHelper\CmsAuthQueryField andFieldLang()
 * @method QueryHelper\CmsAuthQueryField orFieldLang()
 * @method CmsAuthQuery orderAscLang()
 * @method CmsAuthQuery orderDescLang()
 * @method CmsAuthQuery groupByLang()
 * @method QueryHelper\CmsAuthQueryField whereName()
 * @method QueryHelper\CmsAuthQueryField andFieldName()
 * @method QueryHelper\CmsAuthQueryField orFieldName()
 * @method CmsAuthQuery orderAscName()
 * @method CmsAuthQuery orderDescName()
 * @method CmsAuthQuery groupByName()
 * @method QueryHelper\CmsAuthQueryField whereUsername()
 * @method QueryHelper\CmsAuthQueryField andFieldUsername()
 * @method QueryHelper\CmsAuthQueryField orFieldUsername()
 * @method CmsAuthQuery orderAscUsername()
 * @method CmsAuthQuery orderDescUsername()
 * @method CmsAuthQuery groupByUsername()
 * @method QueryHelper\CmsAuthQueryField whereEmail()
 * @method QueryHelper\CmsAuthQueryField andFieldEmail()
 * @method QueryHelper\CmsAuthQueryField orFieldEmail()
 * @method CmsAuthQuery orderAscEmail()
 * @method CmsAuthQuery orderDescEmail()
 * @method CmsAuthQuery groupByEmail()
 * @method QueryHelper\CmsAuthQueryField wherePassword()
 * @method QueryHelper\CmsAuthQueryField andFieldPassword()
 * @method QueryHelper\CmsAuthQueryField orFieldPassword()
 * @method CmsAuthQuery orderAscPassword()
 * @method CmsAuthQuery orderDescPassword()
 * @method CmsAuthQuery groupByPassword()
 * @method QueryHelper\CmsAuthQueryField whereLastIp()
 * @method QueryHelper\CmsAuthQueryField andFieldLastIp()
 * @method QueryHelper\CmsAuthQueryField orFieldLastIp()
 * @method CmsAuthQuery orderAscLastIp()
 * @method CmsAuthQuery orderDescLastIp()
 * @method CmsAuthQuery groupByLastIp()
 * @method QueryHelper\CmsAuthQueryField whereLastLog()
 * @method QueryHelper\CmsAuthQueryField andFieldLastLog()
 * @method QueryHelper\CmsAuthQueryField orFieldLastLog()
 * @method CmsAuthQuery orderAscLastLog()
 * @method CmsAuthQuery orderDescLastLog()
 * @method CmsAuthQuery groupByLastLog()
 * @method QueryHelper\CmsAuthQueryField whereLastFailIp()
 * @method QueryHelper\CmsAuthQueryField andFieldLastFailIp()
 * @method QueryHelper\CmsAuthQueryField orFieldLastFailIp()
 * @method CmsAuthQuery orderAscLastFailIp()
 * @method CmsAuthQuery orderDescLastFailIp()
 * @method CmsAuthQuery groupByLastFailIp()
 * @method QueryHelper\CmsAuthQueryField whereLastFailLog()
 * @method QueryHelper\CmsAuthQueryField andFieldLastFailLog()
 * @method QueryHelper\CmsAuthQueryField orFieldLastFailLog()
 * @method CmsAuthQuery orderAscLastFailLog()
 * @method CmsAuthQuery orderDescLastFailLog()
 * @method CmsAuthQuery groupByLastFailLog()
 * @method QueryHelper\CmsAuthQueryField whereFailLogCount()
 * @method QueryHelper\CmsAuthQueryField andFieldFailLogCount()
 * @method QueryHelper\CmsAuthQueryField orFieldFailLogCount()
 * @method CmsAuthQuery orderAscFailLogCount()
 * @method CmsAuthQuery orderDescFailLogCount()
 * @method CmsAuthQuery groupByFailLogCount()
 * @method QueryHelper\CmsAuthQueryField whereLogged()
 * @method QueryHelper\CmsAuthQueryField andFieldLogged()
 * @method QueryHelper\CmsAuthQueryField orFieldLogged()
 * @method CmsAuthQuery orderAscLogged()
 * @method CmsAuthQuery orderDescLogged()
 * @method CmsAuthQuery groupByLogged()
 * @method QueryHelper\CmsAuthQueryField whereActive()
 * @method QueryHelper\CmsAuthQueryField andFieldActive()
 * @method QueryHelper\CmsAuthQueryField orFieldActive()
 * @method CmsAuthQuery orderAscActive()
 * @method CmsAuthQuery orderDescActive()
 * @method CmsAuthQuery groupByActive()
 * @method QueryHelper\CmsAuthQueryField andField($fieldName, $tableName = null)
 * @method QueryHelper\CmsAuthQueryField where($fieldName, $tableName = null)
 * @method QueryHelper\CmsAuthQueryField orField($fieldName, $tableName = null)
 * @method QueryHelper\CmsAuthQueryJoin join($tableName, $targetTableName = null)
 * @method QueryHelper\CmsAuthQueryJoin joinLeft($tableName, $targetTableName = null)
 * @method CmsAuthRecord[] find()
 * @method CmsAuthRecord findFirst()
 * @method CmsAuthRecord findPk($value)
 */
//</editor-fold>
class CmsAuthQuery extends \Mmi\Orm\Query {

	protected $_tableName = 'cms_auth';

	/**
	 * @return CmsAuthQuery
	 */
	public static function factory($tableName = null) {
		return new self($tableName);
	}

	/**
	 * Zapytanie filtrujące użytkowników z daną rolą
	 * @param string $role
	 * @return CmsAuthQuery
	 */
	public static function byRole($role) {
		//wyszukuje konta z podaną rolą
		return self::factory()
				->join('cms_auth_role')->on('id', 'cms_auth_id')
				->join('cms_role', 'cms_auth_role')->on('cms_role_id', 'id')
				->where('name', 'cms_role')->equals($role);
	}

}
<?php


abstract class Model {
    protected $tableName, $identity;

    public function __construct() {
	    $this->tableName = $this->tableName ? $this->tableName : $this->setTableName();
	    $this->identity = $this->identity ? is_array($this->identity) ? $this->identity : array($this->identity) : array("id");
        $argsCount = func_num_args();
        if($argsCount == 0) return;
        if($argsCount == 1 && is_array($arrArg = func_get_arg(0))){
            $this->arraySetter($arrArg, false);
	        return;
        }
	    foreach ($this->identity as $id){
	    	if(!isset($this->$id)) return;
	    }
	    $this->getRecordFromId();
    }

    public function GetTableNameString(){
    	return $this->tableName;
    }

	protected function getRecordFromId() {
		$queryString = "SELECT * FROM $this->tableName WHERE " . $this->getIdentityCondition();
		$result = SDB::Read($queryString);
		if(count($result) == 0){
			$this->noRecordsUnset();
			return;
		}
		$this->arraySetter($result[0], true);
	}

	protected function noRecordsUnset(){
		foreach ($this->identity as $id){
			$this->$id = null;
		}
	}

    public function Update() {
        $query = "UPDATE $this->tableName SET " . $this->getUpdateAttributes() .
                 " WHERE " . $this->getIdentityCondition();
        return SDB::Write($query);
    }

    protected function getIdentityCondition(){
	    return $conditionFields = implode(" AND ", array_map(function($v, $k) {
	    	$k = $this->camelToSnakeCase($k);
		    return "$k = '$v'";
	    }, array_filter(get_object_vars($this), function($v, $k){
		    return in_array($k,$this->identity);
	    },ARRAY_FILTER_USE_BOTH), $this->identity));
    }

    protected function getUpdateAttributes(){
        $attr = get_object_vars($this);
	    $temp = array_filter($attr, function($v, $k){
		    return !is_object($v) &&
		           !in_array($k, $this->identity) &&
		           !in_array($k, array_keys(get_class_vars(get_parent_class($this))));
	    },ARRAY_FILTER_USE_BOTH);
	    return implode(", ", array_map(function($v, $k){
		    $k = $this->camelToSnakeCase($k);
		    return "$k = '$v'";
	    }, $temp, array_keys($temp)));
    }

    protected function arraySetter($arr, $fromDb){
        foreach($arr as $k => $v){
        	if($fromDb) $k = $this->snakeToCamelCase($k);
            $this->$k = $v;
        }
    }

	protected function setTableName(){
		return $this->camelToSnakeCase(get_class($this));
	}

	protected function camelToSnakeCase($input){
		$input = preg_replace("/([a-z 1-9])([A-Z])/", '$1_$2',$input);
		return strtolower($input);
	}

	protected function snakeToCamelCase($input){
		return preg_replace("/(_)([a-z])/e", 'strtoupper("$2")', $input);
	}
}
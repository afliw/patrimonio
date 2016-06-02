<?php
include_once "class/db.php";

class Client{
    public $id,$name,$lastname,$status,$phone,$cellphone,$amount,$sharecpe,$wifimodel,$cpemac,$cpemodel;
    
    public function Client($id_,$name_ = null,$lastname_ = null,$status_ = null,$phone_ = null,$cellphone_ = null,$amount_ = null,$sharecpe_ = null,$wifimodel_ = null,$cpemac_ = null,$cpemodel_ = null){
        if(is_array($id_)){
            $this->arraySetter($id_);
        } elseif (is_numeric($id_) && is_null($name_)){
            $this->FillFromDB($id_);
        }else{
            $this->id=$id_;
            $this->name=$name_;
            $this->lastname=$lastname_;
            $this->status=$status_;
            $this->phone=$phone_;
            $this->cellphone=$cellphone_;
            $this->amount=$amount_;
            $this->sharecpe=$sharecpe_;
            $this->wifimodel=$wifimodel_;
            $this->cpemac=$cpemac_;
            $this->cpemodel=$cpemodel_;
        }

    }
    
    private function FillFromDB($id_){
        $DB = new DBO();
        $clientArray = $DB->Select("client")->SetData(array_keys(get_object_vars($this)))->Where(["id","=",$id_])->Exec();
        if($clientArray)
            $this->arraySetter($clientArray);
    }
    
    public static function GetAll($order = "",$limit = "",$offset = ""){
        $order = $order && strlen($order) > 1 ? " ORDER BY {$order} " : "";
        $limit = $limit && strlen($limit) > 1 ? " LIMIT {$limit} " : "";
        $offet = $offset && strlen($offset) > 1 ? " OFFSET {$offset} " : "";
        $result=DB::Read("select id,name,lastname,status,phone,cellphone,amount,sharecpe,wifimodel,cpemodel,cpemac from client {$order}{$limit}{$offset}");
        return($result);
    }
    
    private function arraySetter($arr){
        $arr = is_array($arr[0]) ? $arr[0] : $arr;
        foreach($arr as $k => $v){
            $this->$k = $v;
        }
    }
        
    public static function write_data($name_,$lastname_,$status_,$phone_,$cellphone_,$amount_,$sharecpe_,$wifimodel_,$cpemac_){
        DB::Write("INSERT INTO client (name,lastname,status,phone,cellphone,sharecpe,cpemodel,cpemac,wifimodel VALUES('{$name_}','{$lastname_}','{$status_}','{$phone_}','{$cellphone_}','{$amount_}','{$sharecpe_}','{$cpemodel_}','{$wifimodel_}','{$cpemac_}')");
        
    }
    
    public function Update(){
        $DB = new DBO();
        
        $fields = get_object_vars($this);
        foreach($fields as $k => $v){
            if(is_null($v))
                unset($fields[$k]);
        }
        
        if(is_numeric($this->id))
            return $DB->Update("client")->SetData($fields)->Where(["id","=",$this->id])->Exec();
        else
            return $DB->Insert("client")->SetData($fields)->Exec();
    }
   
    private function parseAttributesForUpdate(){
        if(!is_numeric($this->id)) return false;
        $attr = get_object_vars($this);
        $updateString = "";
        foreach($attr as $k => $v){
            if($k == "id" || $v == null || $v == "") continue;
            $updateString .= "{$k} = {$v}, ";
        }
        $updateString = substr($updateString,0,strrpos($updateString,", "));
        $updateString .= " WHERE id = {$this->id_client}";
        return $updateString;
    }
    
    
    
}
?>

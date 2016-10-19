<?php
/**
 * Created by PhpStorm.
 * User: TestingVM
 * Date: 2016-10-19
 * Time: 15:59
 */

class JSONResponse{
	public $status, $msg, $data;

	/**
	 * JSONResponse constructor.
	 * @param boolean $status
	 * @param string $msg
	 * @param array $data
	 */
	public function __construct($status, $msg = "", $data = null){
		$this->status = $status;
		$this->msg = $msg;
		$this->data = $data;
		return $this;
	}

	/**
	 * @param bool $finishExecution
	 */
	public function Send($finishExecution = false){
		header('Content-Type: application/json');
		echo json_encode(array(
			"status" => $this->status,
			"message" => $this->msg,
			"data" => $this->data
		));
		if($finishExecution) exit;
	}

	/**
	 * @param boolean $status
	 * @param string $msg
	 * @param array $data
	 * @return JSONResponse
	 */
	public static function Set($status, $msg = "", $data = null){
		return new JSONResponse($status, $msg, $data);
	}
}
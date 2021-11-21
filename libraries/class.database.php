<?php if(!defined('_lib')) die("Error");
class database{
	var $db;
	var $result;
	var $insert_id;
	var $sql = "";
	var $refix = "";
	var $servername;
	var $username;
	var $password;
	var $database;
	var $table = "";
	var $where = "";
	var $order = "";
	var $limit = "";
	var $error = array();
	function database($config = array()){
		if(!empty($config)){
			$this->init($config);
			$this->connect();
		}
	}
	function init($config = array()){
		foreach($config as $k=>$v)
			$this->$k = $v;
	}
	
	function connect(){
		$this->db = @mysqli_connect($this->servername, $this->username, $this->password,$this->database);
		if( mysqli_connect_errno()){
			die('Could not connect: ' . mysqli_error());
		}
		
		/*if( !mysqli_select_db($this->db , $this->database)){
			die(mysqli_errno($this->db) . ": " . mysqli_error($this->db));
			return false;
		}*/
		mysqli_set_charset($this->db,"utf8");
	}
	
	function query($sql=""){
		if($sql){
			$this->sql = str_replace('#_', $this->refix, $sql);
		}
		$this->result = mysqli_query($this->db,$this->sql);
		if(!$this->result){
			die("syntax error: ".$this->sql);
		}
		return $this->result;	
	}
	
	function insert($data = array()){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . $v  ."'";
		}
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$this->sql = "insert into ".$this->refix.$this->table.$key." values ".$value;
		$this->query();
		$this->insert_id = mysqli_insert_id();
		return $this->result;
	}
	
	function update($data = array()){
		$values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . $v  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$this->sql = "update " . $this->refix . $this->table . " set " . $values;
		$this->sql .= $this->where;
		return $this->query();
	}
	
	function delete(){
		$this->sql = "delete from " . $this->refix . $this->table . $this->where;
		return $this->query();
	}
	
	function select($str = "*"){
		$this->sql = "select " . $str;
		$this->sql .= " from " . $this->refix .$this->table;
		$this->sql .=  $this->where;
		$this->sql .=  $this->order;
		$this->sql .=  $this->limit;
		return $this->query();
	}
	
	function num_rows(){
		return mysqli_num_rows($this->result);
	}
	 function num_fields ($query_id)
  	{   
	    return mysqli_num_fields($query_id);
  	}
  
	function fetch_array(){
		return mysqli_fetch_assoc($this->result);
	}

	function fetch_arrays($sql){
		$this->query($sql);
		return $this->fetch_array();
	}
	
	function result_array(){
		$arr = array();
		while ($row = mysqli_fetch_assoc($this->result)) 
			$arr[] = $row;
		return $arr;
	}

	function result_arrays($sql){
		$this->query($sql);
		return $this->result_array();
	}

	
	function setTable($str){
		$this->table = $str;
	}
	
	function setWhere($key, $value=""){
		if($value!=""){
			if($this->where == "")
				$this->where = " where " . $key . " = '" . $value . "'";
			else
				$this->where .= " and " . $key . " = '" . $value ."'";
		}
		else{
			if($this->where == "")
				$this->where = " where " . $key ;
			else
				$this->where .= " and " . $key ;
		}
	}
	
	function setWhereOr($key, $value){
		if($value!=""){
			if($this->where == "")
				$this->where = " where " . $key . " = " . $value;
			else
				$this->where .= " or " . $key . " = " . $value;
		}
		else{
			if($this->where == "")
				$this->where = " where " . $key ;
			else
				$this->where .= " or " . $key ;
		}
	}
	
	function setOrder($str){
		$this->order = " order by " . $str;
	}
	
	function setLimit($str){
		$this->limit = " limit " . $str;
	}
	
	function setError($msg){
		$this->error[] = $msg;
	}
	
	function showError(){
		foreach($this->error as $value)
			echo '<br>'.$value;
	}
	
	function reset(){
		$this->sql = "";
		$this->result = "";
		$this->where = "";
		$this->order = "";
		$this->limit = "";
		$this->table = "";
	}
	
	function debug(){
		echo "<br> servername: ".$this->servername;
		echo "<br> username: ".$this->username;
		echo "<br> password: ".$this->password;
		echo "<br> database: ".$this->database;
		echo "<br> ".$this->sql;
	}
	
	/**
	 * Escape String
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function escape_str($str)	
	{	
		if (is_array($str))
    	{
    		foreach($str as $key => $val)
    		{
    			$str[$key] = $this->escape_str($val);
    		}
    		
    		return $str;
    	}
	
		if (function_exists('mysqli_real_escape_string') AND is_resource($this->db))
		{
			return mysqli_real_escape_string($str, $this->db);
		}
		elseif (function_exists('mysqli_escape_string'))
		{
			return mysqli_escape_string($str);
		}
		else
		{
			return addslashes($str);
		}
	}
	
	function xssClean($str){
		#$str = htmlentities($str, ENT_QUOTES, "UTF-8");
		$str = str_replace("'", '&#039;', $str);
		$str = str_replace('"', '&quot;', $str);
		$str = str_replace('<', '&lt;', $str);
		$str = str_replace('>', '&gt;', $str);
		#$str = addslashes($str);
		return $str;
	}
}
#=================================================get type user
function get_usertype($id){
	$id = intval($id);
	global $d;
	if($id){
		return $d->fetch_arrays("select id,ten from #_usertype where hienthi=1 and id='$id' "._order_by);
	}else{
		return $d->result_arrays("select id,ten from #_usertype where hienthi=1 "._order_by);
	}
}

#================================================get phan quyen theo loai thanh vien
function get_phanquyen_row($id){
	$id = intval($id);
	if($id==0) return null;
	global $d;
	return $d->fetch_arrays("select * from #_phanquyen where usertype='$id'");
}
#===============================================kiểm tra quyền truy cập
function decentralization_admin($id_user,$com,$type,$act=''){
	if(_phanquyen_admin){
		$id_user = intval($id_user);
		global $d;
		if($com=='' || $com=='index' || $com=='login') return true;
		/*kiểm tra id có tồn tại hoặc chọn loại tài khoản hay chưa*/
		$row_user = $d->fetch_arrays("select usertype from #_user where id='$id_user'");
		$usertype = intval($row_user["usertype"]);
		if($usertype==0) transfer("Dữ liệu không có thực hoặc không tồn tại phân quyền cho tài khoản này!","index.php",false);
		/*kiểm tra có phân quyền tài khoản chưa*/
		$row_pq = $d->fetch_arrays("select * from #_phanquyen where usertype='".$row_user["usertype"]."' ");
		if($row_pq==null) transfer("Chưa phân quyền cho tài khoản này!","index.php",false);
		/*kiểm các biến request ở đường dẫn hiện tại*/
		$row_com = $d->fetch_arrays("select id from #_com where com='$com' and type='$type'");
		if($row_pq==null) transfer("Chưa phân quyền cho đường link này!","index.php",false);
		/*kiểm tra quyền truy cập đối với user*/
		
		$act = ($act=='')?$_GET['act']:$act;
		if($act=='man'){
			$xem_arr = explode(",", $row_pq["xem"]);
			if(in_array($row_com["id"], $xem_arr))
				return true;
		}else if($act=='add'){
			$them_arr = explode(",", $row_pq["them"]);
			if(in_array($row_com["id"], $them_arr))
				return true;
		}else if($act=='edit'){
			$edit_arr = explode(",", $row_pq["sua"]);
			if(in_array($row_com["id"], $edit_arr))
				return true;
		}else if($act=='delete'){
			$delete_arr = explode(",", $row_pq["xoa"]);
			if(in_array($row_com["id"], $delete_arr))
				return true;
		}else return true;
		return false;
	}else return true;
	
}


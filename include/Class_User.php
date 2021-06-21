<?php 
	require_once 'DB_Connect.php';
	class User{
        protected $db;
        function __construct() {
            require_once 'DB_Connect.php';
            // connecting to database
            $db = new DB_Connect();
            $this->conn = $db->connect();
        }
        
		/*** for registration process ***/
		public function reg_user($name,$username,$password,$email){
			//echo "k";
			//$password = md5($password);
			//checking if the username or email is available in db
			$query = "SELECT * FROM adminusers WHERE u_name='$username' OR user_email='$email'";
			$result = $this->conn->query($query) or die($this->conn->error);
			$count_row = $result->num_rows;
			//if the username is not in db then insert to the table
			if($count_row == 0){
				$query = "INSERT INTO adminusers SET u_name='$username', user_pass='$password', fullname='$name', user_email='$email'";
				$result = $this->conn->query($query) or die($this->conn->error);
				return true;
			}
			else{return false;}
		}
			
			
	    /*** for login process ***/
		public function check_login($emailusername, $password){
            //$password = md5($password);
            $query = "SELECT * from adminusers WHERE user_email='$emailusername' and user_pass='$password'";
            $result = $this->conn->query($query) or die($this->conn->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            $count_row = $result->num_rows;
		    if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will used for the session thing
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }
		    else{return false;}
	    }
	
	
        public function get_fullname($uid){
            $query = "SELECT fullname FROM adminusers WHERE uid = $uid";
            $result = $this->conn->query($query) or die($this->conn->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            return $user_data['fullname'];
        }
	
        /*** starting the session ***/
        public function get_session(){
            return $_SESSION['login'];
        }

	    public function user_logout() {
            $_SESSION['login'] = FALSE;
            unset($_SESSION);
            session_destroy();
	    }
        
        public function get_totalUsers(){
            $query = "SELECT count(id) as count FROM tbuser";
            $result = $this->conn->query($query) or die($this->conn->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            return $user_data['count'];
        }

        public function get_totalAdmins(){
            $query = "SELECT count(uid) as count FROM adminusers";
            $result = $this->conn->query($query) or die($this->conn->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            return $user_data['count'];
        }
        
        public function get_totalUserSuggestions(){
            $query = "SELECT count(id) as count FROM tbsuggestion where status = 0";
            $result = $this->conn->query($query) or die($this->conn->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            return $user_data['count'];
        }

        public function get_rejectedUserSuggestions(){
            $query = "SELECT count(id) as count FROM tbsuggestion where status = 2";
            $result = $this->conn->query($query) or die($this->conn->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            return $user_data['count'];
        }

        //displaying Users table
        public function select($table_name)  
        {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           $result = $this->conn->query($query) or die($this->conn->error); 
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
        }    
        
        public function getPendingSuggestions(){
            $array = array();  
            $query = "SELECT * FROM tbsuggestion where status = 0 order by dop desc";
            $result = $this->conn->query($query) or die($this->conn->error);
            while($row = mysqli_fetch_assoc($result))  
            {  
                 $array[] = $row;  
            }  
            return $array;  
        }

        public function addItem($food_name, $food_cat, $food_calorie ) {
            $stmt = $this->conn->prepare("INSERT INTO tbfooddrink(item_name, category, calories) VALUES(?, ?, ?)");
            $stmt->bind_param("ssi", $food_name, $food_cat, $food_calorie);
            $result = $stmt->execute();
            $stmt->close();
            // check for successful store
            if ($result) {
                return true;
            } else {
                return false;
            }   
        } 
        
        public function isItemexists($food_name, $food_cat){
            $stmt = $this->conn->prepare("SELECT id from tbfooddrink where item_name = ? AND category = ?");
            $stmt->bind_param("ss", $food_name,$food_cat);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
               return true;
            }else{
                return false;
            }
        }	
    }
?>
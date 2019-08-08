<?php 
ob_start();

function popOut($pop) {
    
    $pop = strip_tags($pop);
    echo "<script>alert('$pop')</script>";
}

class Po {

    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $name = "c_phiwiki";

    public $conn;

    function __construct(){

        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }
    
    function getPoStatus() {
        $query = "SELECT * FROM systems WHERE sys_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_query);
        $id_query = 1;
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $row;
    }

    function hasOrdered($user_id) {
        $query = "SELECT user_id FROM preorders WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_query);
        $id_query = $user_id;
        $stmt->execute();
        $row = $stmt->get_result()->num_rows;
        $stmt->close();

        if ($row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function hasPaid($user_id) {
        $query = "SELECT cs_payment FROM preorders WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_query);
        $id_query = $user_id;
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($row['cs_payment'] != 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function hasConfirmed($user_id) {
        $query = "SELECT cs_confirmation FROM preorders WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_query);
        $id_query = $user_id;
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($row['cs_confirmation'] != 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getPoData() {
        $query = "SELECT * FROM preorders";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    function deletePoData($cs_id) {
        $query = "DELETE FROM preorders WHERE cs_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_query);
        $id_query = $cs_id;
        $stmt->execute();
        $stmt->close();
    }

    function closePo() {
        $query = "UPDATE systems SET po_status = 2";
        mysqli_query($this->conn, $query);
    }
}

class Users {

    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $name = "c_phiwiki";

    public $conn;

    function __construct(){

        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }

    function getUserData($user_id) {
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_query);
        $id_query = $user_id;
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $row;
    }
}

class Session {
	
	public function __construct(){
		session_start();
	}
	
	public function __unset($arg){
		setcookie( session_name(), "", time()-3600, "/" );
		session_destroy();
	}
}
?>
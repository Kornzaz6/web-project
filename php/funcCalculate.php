<!-- <?php
include "./config/connect_DB.php";
class DB_cal {
    private $dbcal;
    function __construct(){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcal = $conn;

        
        if(mysqli_connect_errno()){
            echo "Fail to connect to MySQL:" . mysqli_connect_error();
        }else{
            echo "<p style='display: none;'>success!!!</p>";
        }
    }

    public function showparking_lot() {
        $showparking = mysqli_query($this->dbcal, "SELECT * FROM parking_slot");
        return $showparking;
    }
    public function description($userid, $parkinglotid, $timestart, $timeend, $price){
        $show_desc = mysqli_query($this->dbcal, "INSERT INTO `transaction`(`user_id`, `slot_id`, `parkingtime_start`, `parkingtime_end`, `price`) VALUES ('$userid','$parkinglotid','$timestart','$timeend', ".$price.")");
        return $show_desc;
    }
    public function updatestatus($parkinglotid)
    {
        $update_status = mysqli_query($this->dbcal, "UPDATE parking_slot SET status = 'full' WHERE slot_id = '$parkinglotid'");
        return $update_status;
    }
    public function check_time($userid){
        $check_time = mysqli_query($this->dbcal, "SELECT * FROM transaction WHERE user_id = '$userid'");
        return $check_time;
    }
    public function add_parkinglot($parkingnumber, $type_vehicle)
    {
        $add_parkinglot     =   mysqli_query($this->dbcal, "INSERT INTO `parking_slot`(`slot_number`, `type_vehicle`, `status`) VALUES ('$parkingnumber','$type_vehicle','empty')");
        return $add_parkinglot;
    }
    public function check_typeCar($parkinglotid)
    {
        $parkinglot_id     =    mysqli_query($this->dbcal, "SELECT * FROM parking_slot WHERE slot_id = '$parkinglotid'");
        return $parkinglot_id;
    }
    
}
?>  -->
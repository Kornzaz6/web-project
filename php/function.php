<?php
include "config/connect_DB.php";


class DB_con
{
    private $dbcon;

    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Fail to connect to MySQL:" . mysqli_connect_error();
        } else {
            echo "<p style='display: none;'>success!!!</p>";
        }
    }

    public function usernamevaliable($uname)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT username FROM parkinglot WHERE username = '$uname'");
        return $checkuser;
    }
    public function passwordvaliable($con_pass){
        $checpass = mysqli_query($this->dbcon, "SELECT password from parkinglot where password = '$con_pass'");
        return $checpass;  
    }

    public function registration($fname, $uname, $uemail, $password)
    {
        $register = mysqli_query($this->dbcon, "INSERT INTO parkinglot(fullname, username, useremail, password) VALUES('$fname', '$uname', '$uemail', '$password')");
        return $register;
    }
    public function signin($uEmail, $password)
    {
        $loginquery = mysqli_query($this->dbcon, "SELECT user_id, useremail,User_role from parkinglot where useremail =
        '$uEmail' AND password = '$password'");
        return $loginquery;
    }
    public function Userdata(){
        $Userdata = mysqli_query($this->dbcon, "SELECT count(*) as user_id from parkinglot ");
        return $Userdata;
    }
    public function earnings(){
        $earnData = mysqli_query($this->dbcon, "SELECT SUM(price) as price from transaction");
        return $earnData;
    }
    public function status(){
        $slotStatus = mysqli_query($this->dbcon, "SELECT count(status) as count_status from parking_slot where status = 'empty'");
        return $slotStatus;
    }
    public function vehicle(){
        $vehicle = mysqli_query($this->dbcon, "SELECT type_vehicle from parking_slot where type_vehicle = 'car'");
        return $vehicle;
    }
    public function vehicle1(){
        $vehicle = mysqli_query($this->dbcon, "SELECT type_vehicle from parking_slot where type_vehicle = 'motocycle'");
        return $vehicle;
    }
    // public function login_validate()
    // {
    //     if (isset($_POST['signin'])) {
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];


    //         if (empty($email)) {
    //             $_SESSION['error'] = 'กรุณากรอกอีเมล';
    //             header("location: signin.php");
    //         } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //             $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
    //             header("location: signin.php");
    //         } else if (empty($password)) {
    //             $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
    //             header("location: signin.php");
    //         } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    //             $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
    //             header("location: signin.php");
    //         } else {
    //             try {

    //                 $check_data = $->prepare("SELECT * FROM users WHERE email = :email");
    //                 $check_data->bindParam(":email", $email);
    //                 $check_data->execute();
    //                 $row = $check_data->fetch(PDO::FETCH_ASSOC);

    //                 if ($check_data->rowCount() > 0) {

    //                     if ($email == $row['email']) {
    //                         if (password_verify($password, $row['password'])) {
    //                             if ($row['urole'] == 'admin') {
    //                                 $_SESSION['admin_login'] = $row['id'];
    //                                 header("location: admin.php");
    //                             } else {
    //                                 $_SESSION['user_login'] = $row['id'];
    //                                 header("location: user.php");
    //                             }
    //                         } else {
    //                             $_SESSION['error'] = 'รหัสผ่านผิด';
    //                             header("location: signin.php");
    //                         }
    //                     } else {
    //                         $_SESSION['error'] = 'อีเมลผิด';
    //                         header("location: signin.php");
    //                     }
    //                 } else {
    //                     $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
    //                     header("location: signin.php");
    //                 }

    //             } catch (PDOException $e) {
    //                 echo $e->getMessage();
    //             }
    //         }
    //     }
    // }
    public function Reset_pass($newPass,$user_email){
        $ResetPass = mysqli_query($this->dbcon, "UPDATE parkinglot set password = '$newPass' where useremail = '$user_email'");
        return $ResetPass;
    }
    public function history_user($id){
        $history = mysqli_query($this->dbcon, "SELECT * from parkinglot inner join transaction on parkinglot.user_id = transaction.user_id   
        inner join parking_slot on parking_slot.slot_id = transaction.slot_id where transaction.user_id = '$id'");
        return $history;
    }

    public function history_admin(){
        $history = mysqli_query($this->dbcon, "SELECT * from parkinglot inner join transaction on parkinglot.user_id = transaction.user_id   
        inner join parking_slot on parking_slot.slot_id = transaction.slot_id");
        return $history;
    }
    public function SelectTable($table,$field,$where){
        $RateService = mysqli_query($this->dbcon, "SELECT * from $table where $field = '$where' ");
        // echo "SELECT * from $table where $field = $where";
        return $RateService;
    }
    public function showparking_lot() {
        $showparking = mysqli_query($this->dbcon, "SELECT * FROM parking_slot");
        return $showparking;
    }
    public function description($userid, $parkinglotid, $timestart, $timeend, $price){
        $show_desc = mysqli_query($this->dbcon, "INSERT INTO `transaction`(`user_id`, `slot_id`, `parkingtime_start`, `parkingtime_end`, `price`) VALUES ('$userid','$parkinglotid','$timestart','$timeend', ".$price.")");
        return $show_desc;
    }
    public function updatestatus($parkinglotid)
    {
        $update_status = mysqli_query($this->dbcon, "UPDATE parking_slot SET status = 'full' WHERE slot_id = '$parkinglotid'");
        return $update_status;
    }
    public function check_time($userid){
        $check_time = mysqli_query($this->dbcon, "SELECT * FROM transaction WHERE user_id = '$userid'");
        return $check_time;
    }
    public function add_parkinglot($parkingnumber, $type_vehicle)
    {
        $add_parkinglot     =   mysqli_query($this->dbcon, "INSERT INTO `parking_slot`(`slot_number`, `type_vehicle`, `status`) VALUES ('$parkingnumber','$type_vehicle','empty')");
        return $add_parkinglot;
    }
    public function check_typeCar($parkinglotid)
    {
        $parkinglot_id     =    mysqli_query($this->dbcon, "SELECT * FROM parking_slot WHERE slot_id = '$parkinglotid'");
        return $parkinglot_id;
    }
    // public function search_admin(){
    //     $search = mysqli_query($this->dbcon,"SELECT * from parkinglot");
    //     return $search;
    // }
    public function deleteSlot($slot_id){
        $delete_slot = mysqli_query($this->dbcon,"DELETE from parking_slot where slot_id = $slot_id");
        return $delete_slot;
    }

    // private string $url;
    // private string $token;
    // private string $public_key;
    // private string $secret_key;
    // private bool $isToken = true;
    // /**
    //  * Documents
    //  * https://doc.gbprimepay.com/
    //  * @param env 
    //  */
    // public function construct(string $env = 'production')
    // {
    //     if ($env == 'production') {
    //         $this->url = 'https://api.gbprimepay.com';
    //     } else {
    //         $this->url = 'https://api.globalprimepay.com';
    //     }
    // }
    // public function parse_data(array $data)
    // {
    //     $fields = '';
    //     $index = 0;
    //     foreach ($data as $key => $value) {
    //         $index += 1;
    //         $fields .= $key . '=' . urlencode($value);
    //         if ($index != count($data)) {
    //             $fields .= '&';
    //         }
    //     }
    //     if ($this->isToken) {
    //         $fields .= '&token=' . urlencode($this->token);
    //     } else {
    //         $fields .= '&publicKey=' . $this->public_key;
    //         $concatstring = $data['amount'] . $data['referenceNo'] . $data['responseUrl'] . $data['backgroundUrl'];
    //         $checksum = hash_hmac('sha256', $concatstring, $this->secret_key, false);
    //         $fields .= '&checksum=' . $checksum;
    //     }
    //     return $fields;
    // }
    // public function request(string $path, array $data)
    // {
    //     $fields = $this->parse_data($data);
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => $this->url . '' . $path,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => $fields,
    //         CURLOPT_HTTPHEADER => array(
    //             'Content-Type: application/x-www-form-urlencoded'
    //         ),
    //     ));
    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     return $response;
    // }
    // /**
    //  * Documents
    //  * https://doc.gbprimepay.com/qrcash
    //  * @param mode qrcode or text
    //  */
    // public function promptpay(array $data, string $token, string $mode = 'qrcode')
    // {
    //     $this->isToken = true;
    //     $this->token = $token;
    //     if ($mode == 'qrcode') {
    //         $path = '/v3/qrcode';
    //     } else {
    //         $path = '/v3/qrcode/text';
    //     }
    //     $response = $this->request($path, $data);
    //     if ($mode == 'qrcode') {
    //         return 'data:image/png;base64,' . base64_encode($response);
    //     } else {
    //         return $response;
    //     }
    // }
    public function updatepayment($transaction_id, $price){
        $update_payment = mysqli_query($this->dbcon,"UPDATE `transaction` SET trans_status = 'จ่ายเงินแล้ว' WHERE teansec_id = $transaction_id AND price = $price");
        return $update_payment;
    }
    public function showstatus(){
        $showstatus = mysqli_query($this->dbcon,"SELECT * From transaction t join parkinglot p on t.user_id=p.user_id join parking_slot ps on t.slot_id=ps.slot_id");
        return $showstatus;
    }
    public function updateSlotstatus($slot_id, $upstatus){
        $update_slotstatus = mysqli_query($this->dbcon,"UPDATE parking_slot set status = 'empty' where slot_id = $slot_id and status = $upstatus");
        return $update_slotstatus;
    }
    public function user_info(){
        $user_info = mysqli_query($this->dbcon, "SELECT * FROM parkinglot");
        return $user_info;
    }
}

?>
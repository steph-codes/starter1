<?php
class user{
    /* contains all the things a user can do on the app*/
    public $connect;
    public function __construct(){
       // $this->connect = new Mysqli('localhost','root','','directory');
        $this->connect = new Mysqli('localhost','root','','business');
        session_start();
        
    }
    public function register($businessname, $email, $password, $state,$sector){
        $encrypted=md5($password);
    $str= "INSERT INTO directory SET bus_name='$businessname', bus_email='$email',
     bus_password='$encrypted ',bus_stateid='$state'";
      
    $this->connect->query($str);
    $id=$this->connect->insert_id;
    //insert into specialization table if specialization was selected
    if(!empty($sector)){
        foreach($sector as $key=>$val){
            $qq= "INSERT INTO business_specializations SET buspec_busid='$id',
            buspec_specid='$val'";
            // echo $qq; die();
            $this->connect->query($qq);
        }
        
    }
    return $id;
}
    
 public function get_companies(){
        //write the query
        $q="SELECT * FROM directory JOIN tbl_state on bus_stateid=state_id";
        $result= $this->connect->query($q);
        $row = array();
        while($data=$result->fetch_assoc()){
            $row[]=$data;
        }
        return $row;
    }
    
    
    public function logout(){
        session_destroy();
        header('location:index.php');
    }

    public function login($email, $password){
         $encrypted=md5($password);
         $new= "SELECT * FROM directory WHERE bus_email='$email' AND bus_password='$encrypted'";
         $result= $this->connect->query($new);
         $total = $result->num_rows;
         $id=0;
         if($total > 0){
         $data= $result->fetch_assoc();
         $id = $data['bus_id'];
         //echo '<pre>';
        // print_r($data);
         //echo '</pre>';
         }
         return $id;
    }
    //profile is input field name
    public function upload($filearray,$id){
        $tmp= $filearray['profilepic']['tmp_name'];
    $type=$filearray['profilepic']['type'];
   
    $filename = $filearray['profilepic']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $newfilename= time().rand().".ext";
    $destination= "images/$newfilename";
    $size=$filearray['profilepic']['size']; $feedback="";
   //you can also use allowed, if u have a specific extension you want the user to upload.
    //$allowed=array('jpeg','png','gif');
    //if(in_array($ext,$allowed)){}
    if(strtolower($ext) =='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){
        if($size <= 200000){
            move_uploaded_file($tmp,$destination);
            $m="UPDATE directory SET bus_logo ='$newfilename' WHERE bus_id='$id'";
            $this->connect->query($m);
            $feedback="successfully uploaded";
        }else{
            $feedback="file too large";
        }
    }else{
            $feedback ='please select a picture';
        }
        return $feedback;
    }
    public function get_details($userid){
        $q = "SELECT * FROM directory WHERE bus_id='$userid'";
        $result = $this->connect->query($q);
        $data= $result->fetch_assoc();
        return $data;
    }
     public function update_profile($postarray,$id){
         // $postarray is the variable for $_POST used to call $_POST from here.
         $name =trim(strip_tags($postarray['name']));
         $description =trim(strip_tags($postarray['description']));
        $state =trim(strip_tags($postarray['id']));
       $number =trim(strip_tags($postarray['phone']));

       $q= "UPDATE directory SET bus_name='$name', bus_description='$description',bus_phone='$number',
       bus_stateid='$state' WHERE bus_id='$id'";
       $this->connect->query($q);
       header('location:editprofile.php');

    }
    public function get_state(){
        $q="SELECT * FROM tbl_state";
        $result=$this->connect->query($q);
        $row= array();
        while($data=$result->fetch_assoc()){
            $row[]=$data;
        }
        return $row;
    }
}
?>
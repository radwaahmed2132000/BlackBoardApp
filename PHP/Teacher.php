<?php
require_once 'connection.php';
class Teacher
{  public function __construct(){
    $this->dbConnection = DBConnection::getInst()->getConnection();
     }
    public function getFName($email)
    {
        $result = $this->dbConnection->query("SELECT FirstName FROM  teacher WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["FirstName"];
            }
        }
        return null;
    }
    public function getLName($email)
    {
        $result = $this->dbConnection->query("SELECT LastName FROM  teacher WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["LastName"];
            }
        }
        return null;
    }
    public function getPhone($email)
    {
        $result = $this->dbConnection->query("SELECT Phone FROM  teacher WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Phone"];
            }
        }
        return null;
    }
    public function getemail($email)
    {
        $result = $this->dbConnection->query("SELECT email FROM  teacher WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["email"];
            }
        }
        return null;
    }
    public function getPass($email,$Pass)
    {
        $result = $this->dbConnection->query("SELECT Pass FROM  teacher WHERE email='$email' AND Pass='$Pass'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
               
                return $row["Pass"];
            }
        }
        return null;
    }
    public function geteuqalsPhone($Phone)
    {
        $result = $this->dbConnection->query("SELECT Phone FROM  teacher WHERE Phone='$Phone'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Phone"];
            }
        }
        return null;
    }
    public function getGender($email)
    {
        $result = $this->dbConnection->query("SELECT Gender FROM  teacher WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Gender"];
            }
        }
        return null;
    }
    public function getProfilePicture($email)
    {
        $result = $this->dbConnection->query("SELECT ProfilePic FROM   teacher WHERE email='$email' ");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) { ?>
                <?php if ($row['ProfilePic']) ?>
                <img class="img-fluid rounded-circle" src="<?php echo $row['ProfilePic']; ?>" alt="">
               
              
<?php }
        }
    }
    public function InsertTeacher($email,$FirstName,$LastName,$Phone,$Gender,$Pass)
    {
       
        $ProfilePic='../Images/DEFAULT_USER.jpg';
        $this->dbConnection->query("INSERT INTO teacher (email,FirstName,LastName,Phone,Gender,Pass,ProfilePic) VALUES('$email','$FirstName','$LastName','$Phone','$Gender','$Pass','$ProfilePic')");
    }
    
}
?>
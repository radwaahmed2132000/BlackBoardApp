<?php
require_once 'connection.php';
class Student
{  public function __construct(){
    $this->dbConnection = DBConnection::getInst()->getConnection();
     }
    public function getFName($email)
    {
        $result = $this->dbConnection->query("SELECT FirstName FROM  student WHERE email='$email'");
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
        $result = $this->dbConnection->query("SELECT LastName FROM  student WHERE email='$email'");
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
        $result = $this->dbConnection->query("SELECT Phone FROM  student WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Phone"];
            }
        }
        return null;
    }
    public function geteuqalsPhone($Phone)
    {
        $result = $this->dbConnection->query("SELECT Phone FROM  student WHERE Phone='$Phone'");
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
        $result = $this->dbConnection->query("SELECT email FROM  student WHERE email='$email'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["email"];
            }
        }
    }
    public function getPass($email,$Pass)
    {
        $result = $this->dbConnection->query("SELECT Pass FROM  student WHERE email='$email' AND Pass='$Pass'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
              
                return $row["Pass"];
            }
        }
        return null;
    }
    public function getGender($email)
    {
        $result = $this->dbConnection->query("SELECT Gender FROM  student WHERE email='$email'");
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
        $result = $this->dbConnection->query("SELECT ProfilePic FROM   student WHERE email='$email' ");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) { ?>
                <?php if ($row['ProfilePic']) ?>
                <img class="img-fluid rounded-circle" src="<?php echo $row['ProfilePic']; ?>" alt="">
               
              
<?php }
        }
    }

    public function InsertStudent($email,$FirstName,$LastName,$Phone,$Gender,$Pass)
    {
        $ProfilePic='../Images/DEFAULT_USER.jpg';
        $this->dbConnection->query("INSERT INTO student (email,FirstName,LastName,Phone,Gender,Pass,ProfilePic) VALUES('$email','$FirstName','$LastName','$Phone','$Gender','$Pass','$ProfilePic')");
    }
    
}
?>
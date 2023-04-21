<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'Arshad_test';

    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }

        return $this->connection;
    }

    public function executeQuery($query)
    {
        $result = $this->connection->query($query);
        return $result;
    }
}



class CRUD extends Database
{
    public function create($username, $phone, $gender, $address, $photo, $password)
    {
        $query = "INSERT INTO users (username, phone, gender, address, photo, password) VALUES ('$username', '$phone', '$gender', '$address', '$photo', '$password')";
        $result = $this->executeQuery($query);

        if ($result) {
            header('Location: index.php');
        }
    }
    public function update($id, $username, $phone, $gender, $address, $photo, $password)
    {
        $query = "UPDATE  users SET username = '$username', phone = $phone ,  address = '$address', gender = '$gender', photo = '$photo', password = '$password' WHERE id = '$id'";

        $result = $this->executeQuery($query);
        echo "dsad";

        if ($result) {
            header('Location: index.php');
        }
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM users where username = '$username'";
        $result = $this->executeQuery($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($username == $row['username']) {
                if ($password == $row['password']) {
                    $_SESSION['username'] = $username;
                    header('Location: users.php');
                    exit;
                } else {
                    echo "<p class='alert alert-danger mt-2'>Invalid Password</p>";
                }
            } else {
                echo "<p class='alert alert-danger mt-2'>Invalid User Name</p>";
            }
        }
    }

    public function singleView($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->executeQuery($query);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function users()
    {
        $query = "SELECT * FROM users";
        $result = $this->executeQuery($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = $this->executeQuery($query);
        if ($result) {
            header('Location: users.php');
            exit;
        }
    }
}



$crud = new CRUD();

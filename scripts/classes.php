<?php

$database = new Database();

class User
{

    function drawPanel()
    {
    }
    function draw($connection)
    {
    }
}
class Admin
{
    function drawPanel()
    {
        echo ' <a class="btn btn-outline-primary mr-3" href="../admin/creator-panel.php">Панель администратора</a>';
    }

    function draw($connection)
    {
        $result = mysqli_query($connection, "SELECT * FROM `users` ");

        while ($row = mysqli_fetch_array($result)) {
            switch ($row['lvluser']) {
                case 1:
                    $row['role'] = "Пользователь";
                    break;
                case 2:
                    $row['role'] = "Менеджер";
                    break;
                case 3:
                    $row['role'] = "Администратор";
                    break;
                case 4:
                    $row['role'] = "Создатель";
                    break;
            }
            echo '<div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">' . $row['name'] . ' ' . $row['surname'] . '</h5>
              <p class="card-text">Почта: ' . $row['email'] . '</p>
              <p class="card-text">Роль: ' . $row['role'] . '</p>
              <p class="card-text">Дата регистрации: ' . $row['date_registration'] . '</p>
            </div>
          </div>';
        }
    }
}

class Creator
{
    function drawPanel()
    {
        echo ' <a class="btn btn-outline-primary mr-3" href="../admin/creator-panel.php">Панель разработчика</a>';
    }

    function draw($connection)
    {

        $result = mysqli_query($connection, "SELECT * FROM `users` ");

        while ($row = mysqli_fetch_array($result)) {
            switch ($row['lvluser']) {
                case 1:
                    $row['role'] = "Пользователь";
                    break;
                case 2:
                    $row['role'] = "Менеджер";
                    break;
                case 3:
                    $row['role'] = "Администратор";
                    break;
                case 4:
                    $row['role'] = "Создатель";
                    break;
            }
            echo '<div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">' . $row['name'] . ' ' . $row['surname'] . '</h5>
              <p class="card-text">Логин: ' . $row['login'] . '</p>
              <p class="card-text">Почта: ' . $row['email'] . '</p>
              <p class="card-text">Роль: ' . $row['role'] . '</p>
              <p class="card-text">Дата регистрации: ' . $row['date_registration'] . '</p>
            </div>
          </div>';
        }
    }
}

class Manager
{
    function drawPanel()
    {
        echo ' <a class="btn btn-outline-primary mr-3" href="../admin/creator-panel.php">Панель менеджера</a>';
    }
}

class Database
{
    public $dbhost = "localhost";
    public $dblogin = "root";
    public $dbpassword = "123456";
    public $dbname = "identification";


    function connect()
    {
        $connection = mysqli_connect($this->dbhost, $this->dblogin, $this->dbpassword, $this->dbname);
        return $connection;
    }

    function checkData($column, $values)
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `$column` = '$values'");
        return mysqli_num_rows($result);
    }
}


switch ($_SESSION['user']['role']) {
    case "Создатель": {
            $USER_RIGHTS = new Creator();
            break;
        }
    case "Администратор": {
            $USER_RIGHTS = new Admin();
            break;
        }
    case "Менеджер": {
            $USER_RIGHTS = new Manager();
            break;
        }
    case "Пользователь": {
            $USER_RIGHTS = new User();
            break;
        }
}

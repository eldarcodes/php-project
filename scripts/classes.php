<?php

$database = new Database();

class User extends Database
{
    function draw()
    {
    }
    function drawPanel()
    {
        $login = $_SESSION['user']['login'];
        $lvluser = $_SESSION['user']['lvluser'];
        $checkuser = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `login` = '$login' ");
        $row = mysqli_fetch_assoc($checkuser);
        unset($_SESSION['user']['role']);
        switch ($row['lvluser']) {
            case 1: {
                    $_SESSION['user']['lvluser'] = $row['lvluser'];
                    $_SESSION['user']['role'] = "Пользователь";
                    break;
                }

            case 2: {
                    $_SESSION['user']['lvluser'] = $row['lvluser'];
                    $_SESSION['user']['role'] = "Менеджер";
                    echo ' <a class="btn btn-outline-primary mr-3" href="../admin/manager-panel.php">Панель менеджера</a>';
                    break;
                }
            case 3: {
                    $_SESSION['user']['lvluser'] = $row['lvluser'];
                    $_SESSION['user']['role'] = "Администратор";
                    echo ' <a class="btn btn-outline-primary mr-3" href="../admin/admin-panel.php">Панель администратора</a>';
                    break;
                }
            case 4: {
                    $_SESSION['user']['lvluser'] = $row['lvluser'];
                    $_SESSION['user']['role'] = "Создатель";
                    echo ' <a class="btn btn-outline-primary mr-3" href="../admin/creator-panel.php">Панель создателя</a>';
                    break;
                }
        }
    }
}
class Admin extends User
{
    public function drawAdminPanel()
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM `users` ");

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

class Creator extends User
{
    public function drawCreatePanel()
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM `users` ");

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

class Manager extends User
{
    public function drawManagerPanel()
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM `users` ");

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
            </div>
          </div>';
        }
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
$USER_RIGHTS = new User();

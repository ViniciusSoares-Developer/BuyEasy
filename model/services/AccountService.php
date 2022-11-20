<?php

require "./model/services/ServerService.php";
require "./model/entities/Account.php";

class AccountService
{
    private Account $account;

    function __construct(Account $account)
    {
        $this->setAccount($account);
    }

    function getAccount(): Account
    {
        return $this->account;
    }

    function setAccount(Account $account)
    {
        $this->account = $account;
    }

    function consultAccount()
    {
        $sql = "SELECT * FROM `accounts` WHERE `name` = :name OR `email` = :email";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', $this->getAccount()->getName());
        $stmt->bindValue(':email', $this->getAccount()->getEmailLogin());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function verifyPassword()
    {
        $sql = "SELECT * FROM `accounts` WHERE `id` = :id;";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $_SESSION['user']['idAccount']);
        $stmt->execute();
        $password = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($password && $password[0]['password'] === $this->getAccount()->getPassword()) return true; 
    }

    //Register
    function createdAccount()
    {
        if (empty($this->consultAccount())) {
            $sql = "INSERT INTO `accounts`(`name`, `email`, `password`)
            VALUES (:name, :email, :password);";
            $db = Database::connection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $this->getAccount()->getName());
            $stmt->bindValue(':email', $this->getAccount()->getEmailLogin());
            $stmt->bindValue(':password', $this->getAccount()->getPassword());
            $stmt->execute();
            $stmt = $db->prepare("SELECT * FROM `accounts` ORDER BY `id` DESC LIMIT 1;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    function createdUser()
    {
        $user = $this->getAccount()->getUser();
        $sql = "INSERT INTO `users`(`name`, `type`) VALUES (:name, :type);";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':type', $user->getType());
        $stmt->execute();
        $stmt = $db->prepare("SELECT `id` FROM `accounts` ORDER BY `id` DESC LIMIT 1;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function register()
    {
        $sql = "UPDATE `accounts` SET `idUser` = :idUser WHERE `id` = :idAccount;";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':idAccount', $this->createdAccount()[0]['id']);
        $stmt->bindValue(':idUser', $this->createdUser()[0]['id']);
        return $stmt->execute();
    }

    //Login
    public function verifyAccountAccess()
    {
        if (
            $this->getAccount()->getEmailLogin() === $this->consultAccount()[0]['email']
            && $this->getAccount()->getPassword() === $this->consultAccount()[0]['password']
            ) return true;
    }
    public function getInformationUser()
    {
        $sql = "SELECT * FROM `users` WHERE `id` = :id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $this->consultAccount()[0]['idUser']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function connectAccount($remember)
    {
        if ($this->verifyAccountAccess()) {
            @session_start();
            $_SESSION['user'] = $this->getInformationUser()[0];
        }
        if ($remember) {
            $data = new DateTime('+1 month', new DateTimeZone('America/Sao_Paulo'));
            setcookie("buyeasy_login", $this->getAccount()->getEmailLogin(), strtotime($data->format('Y-m-d H:i:s')));
        } else setcookie("buyeasy_login", "");
    }

    //Edit
    public function editEmail()
    {
        if (!$this->verifyPassword()) return false; 
        $sql = "UPDATE `accounts` SET `email`=:email WHERE `id` = :id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $this->getAccount()->getEmailLogin());
        $stmt->bindValue(':id', $_SESSION['user']['idAccount']);
        return $stmt->execute();
    }
    public function editPassword()
    {
        if (!$this->verifyPassword()) return false; 
        $sql = "UPDATE `accounts` SET `password`=:password WHERE `id` = :id";
        $db = Database::connection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':password', $this->getAccount()->getPassword());
        $stmt->bindValue(':id', $_SESSION['user']['idAccount']);
        return $stmt->execute();
    }
}
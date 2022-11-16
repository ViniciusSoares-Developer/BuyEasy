<?php

class UserService
{

    private User $user;
    function __construct(User $user)
    {
        $this->setUser($user);
    }

    function getUser(): User
    {
        return $this->user;
    }
    function setUser(User $user)
    {
        $this->user = $user;
    }

    function getLast6UsersRegister()
    {
        $sql = "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 6;";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    static function getUserById(int $value)
    {
        $sql = "SELECT * FROM `users` WHERE `id` = $value;";
        $db = Database::connection();
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function alterImage($img)
    {
        if ($_SESSION && isset($_SESSION['user']['id'])) {
            $folder = "archives/users/";
            $nameArchive = uniqid();
            $extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
            if ($extension != "jpg" && $extension != "png")
                return false;
            $path = $folder . $nameArchive . "." . $extension;
            if (move_uploaded_file($img['tmp_name'], $path)) {
                $sql = "UPDATE `users` SET `img_path` = ':img_path' WHERE `id` = :id;";
                $db = Database::connection();
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':img', $path);
                $stmt->bindValue(':id', $_SESSION['user']['id']);
                return $stmt->execute();
            }
        }
    }

    function alterInformations()
    {
        $sql[] = [];
        $db = Database::connection();
        $user = $this->getUser();
        if ($user->getName())
            array_push($sql, "UPDATE `users` SET `name` = ':name' WHERE `id` = :id");
        if ($user->getNumberContact())
            array_push($sql, "UPDATE `users` SET `numberContact` = ':number' WHERE `id` = :id");
        if ($user->getEmailContact())
            array_push($sql, "UPDATE `users` SET `emailContact` = ':email' WHERE `id` = :id");
        if ($user->getWhatsapp())
            array_push($sql, "UPDATE `users` SET `whatsapp` = ':whatsapp' WHERE `id` = :id");
        if ($user->getInstagram())
            array_push($sql, "UPDATE `users` SET `instagram` = ':instagram' WHERE `id` = :id");

        foreach ($sql as $key => $value) {
            $stmt = $db->prepare($value);
            $stmt->bindValue(':name', $user->getName());
            $stmt->bindValue(':number', $user->getNumberContact());
            $stmt->bindValue(':email', $user->getEmailContact());
            $stmt->bindValue(':whatsapp', $user->getWhatsapp());
            $stmt->bindValue(':instagram', $user->getInstagram());
            $stmt->execute();
        }
    }
}
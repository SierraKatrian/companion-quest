<?php

/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-03-11
 * Time: 11:40 PM
 */
class PrivateMessage
{
    private $sender;
    private $receiver;
    private $timestamp;
    private $text;

    public function getSender () {
        return $this->sender;
    }

    public function setSender ($value) {
        $this->sender = $value;
    }

    public function getReceiver () {
        return $this->receiver;
    }

    public function setReceiver ($value) {
        $this->receiver = $value;
    }

    public function getTimestamp () {
        return $this->timestamp;
    }

    public function setTimestamp ($value) {
        $this->timestamp = $value;
    }

    public function getText () {
        return $this->text;
    }

    public function setText ($value) {
        $this->text = $value;
    }

    //list messages

    /*
    public function listChats ($db, $user_id) {
        $query = "SELECT * FROM conversations
                  WHERE user_two = :user_id OR user_one = :user_id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement ->execute();
        $chats = $statement->fetchAll();

        return $chats;

    }
    */

    public function listChats ($db, $user_id) {
        $query = "SELECT conversations.id, users.picture, users.user_name,
                  conversations.user_two, conversations.timestamp  FROM conversations
                  JOIN users ON users.id = conversations.user_two
                  WHERE user_two = :user_id OR user_one = :user_id ";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement ->execute();
        $chats = $statement->fetchAll();

        return $chats;

    }


    //check to see if chat already exits
    public function checkChat ($db, $user_one, $user_two) {
        $query = "SELECT id FROM conversations WHERE user_one=:user_one and user_two= :user_two or user_one=:user_two and user_two=:user_one ";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_one', $user_one);
        $statement->bindValue(':user_two', $user_two);
        $statement->execute();
        $chat = $statement->fetchAll ();

        return count($chat);
    }

    //create chat
    public function insertChat ($db,$user_one, $user_two ) {
       $query= "INSERT INTO conversations (user_one,user_two) VALUES (:user_one,:user_two)";
       $statement = $db->prepare($query);
       $statement->bindValue(':user_one', $user_one);
       $statement->bindValue('user_two', $user_two);
       $statement->execute();

       return true;

}

    //get chat id
    public function getChatId ($db, $user_one, $user_two) {
        $query = "SELECT id FROM conversations WHERE user_one= :user_one AND user_two = :user_two OR user_one = :user_two AND user_two = :user_one";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_one', $user_one);
        $statement->bindValue(':user_two', $user_two);
        $statement->execute();
        $chatId = $statement->fetch();

        return $chatId;


    }


    //send message
    public function sendMessage ($db,$author, $reply, $textTime, $chat_id) {
        $query = "INSERT INTO messages (c_id, author, reply, time_sent) 
                  VALUES (:chat_id,:author, :reply, :time_sent)";
        $statement = $db->prepare($query);
        $statement->bindValue(':reply', $reply);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':chat_id', $chat_id);
        $statement->bindValue(':time_sent', $textTime);
        $statement->execute();



    }

    /*public function sendMessage ($db,$user_one, $user_two, $reply, $textTime) {
        $query = "INSERT INTO messages (c_id, user_one, user_two, reply, time_sent)
                  VALUES ((SELECT id FROM conversations WHERE user_one = :user_one AND user_two = :user_two OR user_two = :user_one AND user_one = :user_two),
        :user_one, :user_two, :reply, :time_sent)";
        $statement = $db->prepare($query);
        $statement->bindValue(':reply', $reply);
        $statement->bindValue(':user_one', $user_one);
        $statement->bindValue(':user_two', $user_two);
        $statement->bindValue(':time_sent', $textTime);
        $statement->execute();



    }
    */

    public function listMessages ($db, $convo) {
        $query = "SELECT * FROM messages WHERE c_id = :convo";
        $statement = $db->prepare($query);
        $statement->bindValue(':convo', $convo);
        $statement->execute();
        $messages = $statement->fetchAll();

        return $messages;
    }

    public function getChats($db, $user_one) {
        $query = "SELECT * FROM conversations WHERE user_one=:user_one or user_one=:user_two ";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_one', $user_one);
        $statement->bindValue(':user_two', $user_one);
        $statement->execute();
        $chats = $statement->fetchAll();

        return $chats;
    }

    public function getUserId($db,$user_name) {

        $query = "SELECT id FROM users WHERE user_name =:user_name ";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_name', $user_name, PDO::PARAM_STR);
        $statement->execute();
        $chatID = $statement->fetch();

        return $chatID;


    }

    public function listMsgs ($db, $convo){
        $query = "SELECT messages.id, messages.c_id, author, reply, time_sent, users.user_name 
        FROM messages JOIN users ON messages.author = users.id WHERE c_id = :convo";
        $statement = $db->prepare($query);
        $statement->bindValue(':convo', $convo);
        $statement->execute();
        $messages = $statement->fetchAll();

        return $messages;
    }

    public function getUsername ($db, $userId){
        $query = "SELECT username FROM users WHERE id = :user_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $username = $statement->fetch();

        return $username;
    }

    public function getChatsTwo($db, $user_one) {
        $query = "SELECT DISTINCT u.id,c.id,u.user_name,u.picture
                  FROM conversations c, users u, messages m
                  WHERE (
                     CASE 
                         WHEN c.user_one = :user_one
                        THEN c.user_two = u.id
                         WHEN c.user_two = :user_one
                         THEN c.user_one= u.id
                     END) 
                     AND c.id=m.c_id
                  AND (c.user_one = :user_one OR c.user_two = :user_one)";
        $statement = $db->prepare($query);
        $statement->bindValue(':user_one', $user_one);
        $statement->execute();
        $chats = $statement->fetchAll();

        return $chats;
    }



}

//now need to create pm view php so that when chat is clicked on it displays messaged
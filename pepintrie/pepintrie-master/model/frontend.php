<?php
function hashGroupFromUsername($username){
    $db = dbConnect();
    $rp = $db->prepare('SELECT id_group, hash FROM members WHERE username = :username'); //le probleme vient à l'ajout d'id group
    $rp->execute(array(
    'username'=> $username));
    $hashGroup = $rp->fetch();
    $rp->closeCursor();
    return $hashGroup;
}

function getGroupName($idGroup){
    $db = dbConnect();
    $rp = $db->prepare('SELECT name FROM groups WHERE id = :id_group');
    $rp->execute(array(
    'id_group'=>$idGroup));
    $groupName = $rp->fetch();
    $rp->closeCursor();
    return $groupName['name'];
}

function getMembersNameAndEmail(){
    $db = dbConnect();
    $rp = $db->query('SELECT username, email FROM  members');
    return $rp;
}

function adddMember($username, $email, $hash){
    $db = dbConnect();
    $rq = $db->prepare('INSERT INTO members(username, hash, email) VALUES(:username, :hash, :email)');
    $rq->execute(array(
    'username' => $username,
    'hash' => $hash,
    'email' => $email
    ));
    $rq->closeCursor();
}

function sendMessage($username, $message){
    $db = dbConnect();
    $rq = $db->prepare('INSERT INTO chat(username, message) VALUES(:username, :message)');
    $rq->execute(array(
    'username' => $username,
    'message' => $message));
    $rq-> closeCursor();
    
}

function getChat(){
    
}


function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=pepintrie;charset=utf8', 'root', '');
    return $db;
}
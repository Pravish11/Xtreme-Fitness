<?php
session_start();
require_once "includes/db_connect.php";
if(isset($_POST['class_name']))
{
    if(isset($_POST["class_date"]))
    {
        if(isset($_POST["class_time"]))
        {
            $sql='call insertOnlineClassReg(:email,:name,:date,:time)';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email',$mail);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':date',$date);
            $stmt->bindParam(':time',$time);
            $mail=$_SESSION['username'];
            $name=$_POST['class_name'];
            $date=$_POST["class_date"];
            $time=$_POST["class_time"];
            $stmt->execute();
        }
    }
}

if(isset($_POST['c_name']))
{
    if(isset($_POST["c_date"]))
    {
        if(isset($_POST["c_time"]))
        {
            $email=$_SESSION['username'];
            $className=$_POST['c_name'];
            $classDate=$_POST["c_date"];
            $classTime=$_POST["c_time"];
            $RemoveRegistration="DELETE FROM online_class_registration
            WHERE member_mail='$email'
            AND class_name='$className'
            AND class_date='$classDate'
            AND starting_time='$classTime'";
            $Result2=$conn->query($RemoveRegistration);
        }
    }
}

?>










if(isset($_GET['deleteClass']))
{
    if(isset($_GET['deleteDate']))
    {
        if(isset($_GET['deleteTime']))
        {
            $email=$_SESSION['username'];
            $className=$_GET['deleteClass'];
            $classDate=$_GET['deleteDate'];
            $classTime=$_GET['deleteTime'];
            $RemoveRegistration="DELETE FROM online_class_registration
            WHERE member_mail='$email'
            AND class_name='$className'
            AND class_date='$classDate'
            AND starting_time='$classTime'";
            $Result2=$conn->query($RemoveRegistration);
            header("Location:onlineClasses.php");
        }
    }
}
<?php include "db.php"; ?>

<?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);
        if (!$select_user_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query)){
            $login_user_id = $row['id'];
            $login_username = $row['username'];
            $login_user_password = $row['user_password'];
            $login_user_firstname = $row['user_firstname'];
            $login_user_lastname = $row['user_lastname'];
            $login_user_role = $row['user_role'];
        }
        if ($username !== $login_username && $password !== $login_user_password) {
            header("Location: ../index.php");
        } elseif ($username == $login_username && $password == $login_user_password) {
            if (session_status() == PHP_SESSION_NONE) session_start();
            $_SESSION['username'] = $login_username;
            $_SESSION['user_firstname'] = $login_user_firstname;
            $_SESSION['user_lastname'] = $login_user_lastname;
            $_SESSION['user_role'] = $login_user_role;

            header("Location: ../admin/index.php");
        }
    }
?>

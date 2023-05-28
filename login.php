<?php
$db_connection = mysqli_connect('sql105.epizy.com', 'epiz_34189122', 'OGboYDIf9LXfL', 'epiz_34189122_pdocrud');

session_unset();
session_start();

if (isset($_SESSION['login_id'])) {
    header('Location: signed_in_google/home.php');
    exit;
}

require 'google-api-php-client-2.4.0/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('692907008570-pf8btieioflisqpocse63jq8dlfu1kdm.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('https://serchserpent.infinityfreeapp.com/login.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

$authUrl = $client->createAuthUrl();
header('Location: ' . $authUrl);


if (isset($_GET['code'])) :

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
        list($username, $domain) = explode('@', $email);
        $username = $username . mt_rand(1, 1111);
        $usertype = "user";

        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `google_id` FROM `tblusers` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {

            $_SESSION['login_id'] = $id;
            header('Location: signed_in_google/home.php');
            exit;
        } else {

            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `tblusers`(`google_id`,`name`,`EmailId`,`Photo`,`username`,`user_type`) VALUES('$id','$full_name','$email','$profile_pic','$username','$usertype')");

            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: signed_in_google/home.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        header('Location: login.php');
        exit;
    }

else :
    // Google Login Url = $client->createAuthUrl(); 
?>


<?php endif; ?>
<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/User.php';
class AuthController extends Controller
{

    protected $errors = [];

  public function index()
{
    $this->view('register', [
        'title' => 'Create your account',
        'activePage' => 'register',
        'errors' => [],
        'old' => []
    ]);
}

    public function register()
    {
        // Get data from the post requset 
        // check the email format 
        // check the passowrd length 
        //check email is alrady exist or not 
        // hashed password  
        // register user 

        $email = $_POST['email'];
        $username  = $_POST['username'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        $db = new User();
        if (!(strlen($username) >= 3 && strlen($username) <= 100)) {
            $errors['username'] = "username must be between 3 and 100 characters";
        }
        if ((strlen($email) > 255)) {
            $errors['email'] = "The maxiumum lenght of email is 255 characters";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        } elseif ($db->findByEmail($email)) {
            $errors['email'] = "Email already registered";
        }

        if (!(strlen($password) >= 8 && strlen($password) <= 50)) {
            $errors['password'] = "Password must be between 8 and 50 characters";
        } elseif ($password != $password_confirmation) {
            $errors['password'] = "Passwords do not match";
        }
        if (!empty($errors)) {
            $this->view('register', [
                'title' => 'Register',
                'errors' => $errors,
                'old' => ['username' => $username, 'email' => $email],
                'activePage' => 'register'
            ]);
            // show errors to user, do NOT create the user
        } else {
            $newUserid =  $db->createUser($username, $email, password_hash($password, PASSWORD_BCRYPT));
            $_SESSION['user_id'] = $newUserid;
            header('Location: /');
            exit;
        }



        // if the code bass from all we will hash password and create new user 


    }
}

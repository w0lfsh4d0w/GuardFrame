<?php
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/User.php';
class AuthController extends Controller
{

    protected $errors = [];

    public function registerIndex()
    {
        $this->view('register', [
            'title' => 'Create your account',
            'activePage' => 'register',
            'errors' => [],
            'old' => []
        ]);
    }
    public function loginIndex()
    {
        $this->view('login', [
            'title' => 'Login to your account',
            'activePage' => 'login',
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
            $_SESSION['userid'] = $newUserid;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';

            header('Location: /');
            exit;
        }
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $errors = [];

        if (empty($email) || empty($password)) {
            $errors['login'] = "Email and password are required";
        }

        if (empty($errors)) {
            if (strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['login'] = "Invalid email or password";
            }

            if (strlen($password) < 8 || strlen($password) > 50) {
                $errors['login'] = "Invalid email or password";
            }
        }

        if (empty($errors)) {
            $db = new User();
            $user = $db->findByEmail($email);

            if (!$user || !password_verify($password, $user['password'])) {
                $errors['login'] = "Invalid email or password";
            }
        }

        if (!empty($errors)) {
            $this->view('login', [
                'title' => 'Login',
                'errors' => $errors,
                'old' => ['email' => $email],
                'activePage' => 'login'
            ]);
            return;
        }

        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header('Location: /');
        exit;
    }
   public function logout()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /');
        exit;
    }

    $postToken = $_POST['csrf_token'] ?? '';
    $sessionToken = $_SESSION['csrf_token'] ?? '';
    if (empty($postToken) || !hash_equals($sessionToken, $postToken)) {
        header('Location: /');
        exit;
    }

    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(), 
            '', 
            time() - 42000,
            $params["path"], 
            $params["domain"],
            $params["secure"], 
            $params["httponly"]
        );
    }

    session_destroy();

    header('Location: /login');
    exit;
}
}

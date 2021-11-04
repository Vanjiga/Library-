<?php
namespace app\controller;

class GlobalController {

    public function index(\app\Router $router) {
       $search = $_GET['search'] ?? '';
       $books = $router->database->getBooks($search);
       $staffPicks = $router->database->getBookByStaff();
       $router->view('main/index', ['staffPicks' =>$staffPicks], ['search' =>$search]);
        
    }

    public function login(\app\Router $router) {
        $userData = [
            'user_id' => '',
            'username' => '',
            'password' => '',
            'rank' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData['username'] = $_POST['username'];
            $userData['password'] = $_POST['password'];

            $validate = $router->database->getUserByUsername($userData['username']);

            if ($userData['password'] != $validate['password']) {
                echo 'Wrong pass()';
            }
    
            else {
                
                $_SESSION['username'] = $userData['username'];
                echo 'Welcome' . $_SESSION['username'];
                header('Location : /library');
            }

        }


        $router->view('main/login');
    }

    public function register(\app\Router $router) {
        $userData = [
            'user_id' => '',
            'username' => '',
            'password' => '',
            'rank' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData['username'] = $_POST['username'];
            $userData['password'] = $_POST['password'];


            $user =  new \app\model\UserModel;
            $user->getData($userData);
            $user->loadUser();
        }

        $router->view('main/register');
    }

    public function showcase(\app\Router $router) {
        $search = $_GET['search'] ?? '';
        $books = $router->database->getBooks($search);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_SESSION['username'];
            $bookId = $_POST['book_id'];
            $getUser = $router->database->getUserByUsername($username);
            $add = $router->database->insertInLibrary($getUser['user_id'], $bookId);
        }

        $router->view('main/showcase', ["books" => $books], ['search' =>$search]);
    }

    public function library(\app\Router $router) {

        if (isset($_SESSION['username'])) {
            $userData = $router->database->getUserByUsername($_SESSION['username']);
            $books = $router->database->getBookByUser($_SESSION['username']);
            $router->view('library/index', ["user" => $userData], ['userbooks' =>$books]);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_SESSION['username'];
                $bookId = $_POST['book_id'];
                $getUser = $router->database->getUserByUsername($username);
                $remove = $router->database->removeFromLibrary($getUser['user_id'], $bookId);
            }
        }
        else {
            header('Location: /login');
        }
       
    }

    public function logout(\app\Router $router) {
        $router->view('main/logout');
    }
}
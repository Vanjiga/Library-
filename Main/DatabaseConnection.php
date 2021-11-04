<?php

namespace app;

class DatabaseConnection {

    public $pdoObject;
    public static $database;

    public function __construct()
    {
        $this->pdoObject = new \PDO('mysql:host=localhost;dbname=library;utfcharset=utf8', 'root', '');
        self::$database = $this;
    }

    public function getBooksForHome() {
        $active = 1;
        $sql = 'SELECT * FROM book WHERE home_active = :active';
        $statement = $this->pdoObject->prepare($sql);
        $statement->bindValue(':active', $active);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBooks($search = '') {
        if ($search) {
            $sql = 'SELECT * FROM book WHERE title LIKE :title';
            $statement = $this->pdoObject->prepare($sql);
            $statement->bindValue(':title', "%$search%");
        }

        else {
            $sql = 'SELECT 
            book_author.book_id,
            book.title,
            book.added_date,
            book.home_active,
            book.book_info,
            book_author.author_id,
            author.author_name,
            book.category_id,
            category.category_name 
            FROM 
            book, book_author, author, category
            WHERE 
            book.book_id = book_author.book_id
            AND
            book_author.author_id = author.author_id
            AND book.category_id = category.category_id
            ORDER BY added_date';
            $statement = $this->pdoObject->prepare($sql);
        }

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createUser(\app\model\UserModel $user) {
        $sql = 'INSERT INTO user (username, password) VALUES (:username, :password)';
        $statement = $this->pdoObject->prepare($sql);
        $statement->bindValue(':username', $user->username);
        $statement->bindValue(':password', $user->password);

        $statement->execute();
    }

    public function getUserByUsername($username) {
        $sql = 'SELECT * FROM user WHERE username = :username';
        $statement = $this->pdoObject->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->execute();
        
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getBookByStaff() {
        $sql = "SELECT 
        book_author.book_id,
        book.title,
        book.added_date,
        book.home_active,
        book.book_info,
        book_author.author_id,
        author.author_name,
        book.category_id,
        category.category_name 
        FROM 
        book, book_author, author, category
        WHERE 
        book.book_id = book_author.book_id
        AND
        book_author.author_id = author.author_id
        AND book.category_id = category.category_id
        AND book.home_active = '1'
        ORDER BY added_date";
        $statement = $this->pdoObject->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBookByUser($username) {
        $sql = "SELECT 
        book_author.book_id,
        book.title,
        book.added_date,
        book.home_active,
        book.book_info,
        book_author.author_id,
        author.author_name,
        book.category_id,
        category.category_name,
        user_book.user_added
        FROM 
        book, book_author, author, category, user_book, user
        WHERE 
        book.book_id = book_author.book_id
        AND
        book_author.author_id = author.author_id
        AND user.username = :username
        AND book.category_id = category.category_id
        AND book.book_id = user_book.book_id;
        ORDER BY added_date";
        $statement = $this->pdoObject->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertInLibrary($userId, $bookId) {
        $sql = 'INSERT INTO user_book (user_id, book_id) VALUES (:username, :bookid)';
        $statement = $this->pdoObject->prepare($sql);
        $statement->bindValue(':username', $userId);
        $statement->bindValue(':bookid', $bookId);

        $statement->execute();

    }

    public function removeFromLibrary($userId, $bookId) {
        $sql = 'DELETE FROM user_book WHERE user_id = :username AND book_id = :bookid)';
        $statement = $this->pdoObject->prepare($sql);
        $statement->bindValue(':username', $userId);
        $statement->bindValue(':bookid', $bookId);

        return $statement->execute();

    }

}
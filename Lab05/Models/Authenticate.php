<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/KhachHang.php';

class Authenticate
{
    private KhachHang $model;

    const S_KEY_IS_AUTHENTICATED = 'authenticated';
    const S_KEY_LOGGED_IN_USER = 'logged_in_user';

    public function __construct()
    {
        $this->model = new KhachHang();
    }

    public function register($new_user) : void
    {
        $this->model->save($new_user);

        $this->login($new_user[KhachHang::COL_TEN_DANG_NHAP], $new_user[KhachHang::COL_MAT_KHAU]);
    }

    public function login($username, $password) : ?array
    {
        $all_users = $this->model->getAll();

        foreach ($all_users as $user) {
            $current_username = $user[KhachHang::COL_TEN_DANG_NHAP];
            $current_password = $user[KhachHang::COL_MAT_KHAU];

            if ($current_username == $username && $current_password == $password) {
                $_SESSION[self::S_KEY_IS_AUTHENTICATED] = true;
                $_SESSION[self::S_KEY_LOGGED_IN_USER] = $user;
                return $user;
            }
        }

        return null;
    }

    public function logout() : void
    {
        unset($_SESSION[self::S_KEY_LOGGED_IN_USER]);
        unset($_SESSION[self::S_KEY_IS_AUTHENTICATED]);

        session_destroy();
    }

    public function is_user_logged_in() : bool
    {
        return $_SESSION[self::S_KEY_IS_AUTHENTICATED] ?? false;
    }

    public function get_user_data() : ?array
    {
        if ($this->is_user_logged_in()) {
            return $_SESSION[self::S_KEY_LOGGED_IN_USER];
        }

        return null;
    }

    public function get_user_display_name() : ?string
    {
        if ($this->is_user_logged_in()) {
            return $_SESSION[self::S_KEY_LOGGED_IN_USER][KhachHang::COL_TEN];
        }

        return null;
    }

    public function get_user_id() : ?int
    {
        if ($this->is_user_logged_in()) {
            return $_SESSION[self::S_KEY_LOGGED_IN_USER][KhachHang::COL_PRIMARY_KEY];
        }

        return null;
    }

    public function is_admin_user(): bool
    {
        if ($this->is_user_logged_in()) {
            return $_SESSION[self::S_KEY_LOGGED_IN_USER][KhachHang::COL_KIEU] == KhachHang::TYPE_ADMIN;
        }

        return false;
    }

    public function is_normal_user(): bool
    {
        if ($this->is_user_logged_in()) {
            return $_SESSION[self::S_KEY_LOGGED_IN_USER][KhachHang::COL_KIEU] == KhachHang::TYPE_USER;
        }

        return false;
    }

    public function restrict($account_type = KhachHang::TYPE_ADMIN, $redirect_url = '/Lab05/index.php')
    {
        $user = $this->get_user_data();

        if ($user[KhachHang::COL_KIEU] != $account_type) {
            header('Location: ' . $redirect_url);
            exit();
        }
    }
}
<?php
/*
Plugin Name: Proteger Login
Author: LXuancheng
License: GPL2
Version: 0.0.1
Description: A plugin to protect your login page
Text Domain: proteger_login
 */

if(!defined("ABSPATH")) exit;

class ProtegerLogin {
    public static $instance;

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    public function __construct() {
        add_action('login_form_login', [$this, 'pt_login']);
    }

    public function pt_login() {
        $link = preg_replace("/https?:\/\//", get_site_url(), "");

        if($_SERVER['SCRIPT_NAME'] == $link . '/wp-login.php') {
            header("Location:" . get_site_url());
        }
    }
}

ProtegerLogin::getInstance();

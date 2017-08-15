<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session','table');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'language');

$autoload['config'] = array();


$autoload['language'] = array('content', 'admin_content');

$autoload['model'] = array('AccountsModel', 'AccountsRestModel', 'CategoriesModel','ArticlesModel','CommentsModel','RolesModel','SettingsModel', 'CategoryRestModel', 'ArticlesRestModel', 'SettingRestModel', 'CommentRestModel', 'ContactRestModel','ContactsModel', 'PagesRestModel','PagesModel', 'BrandRestModel', 'OrderRestModel', 'OrderDetailRestModel', 'BrandModel', 'articlesmodel', 'OrderModel', 'OrderDetailModel');

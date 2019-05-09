<?php
namespace App\Repositories\User;

interface UserRepositoryInterface{
    public function suspend($id);

    public function activate($id);
}
<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $userRepository;

    public function __construct( UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index($email)
    {
        $user = $this->userRepository->findByEmail($email);
        if($user->is_admin == 0 ){
            return view('dashboard');
        }else{
            return view('admin');
        }

    }
}

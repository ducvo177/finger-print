<?php

namespace App\Http\Controllers;

use App\Repositories\FingerScanRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $fingerScanRepository;

    public function __construct( UserRepository $userRepository, FingerScanRepository $fingerScanRepository)
    {
        $this->userRepository = $userRepository;
        $this->fingerScanRepository = $fingerScanRepository;
    }

    public function index($email)
    {
        $user = $this->userRepository->findByEmail($email);
        if($user->is_admin == 0 ){
            $fingerscanData = $this->fingerScanRepository->findByUserId($user->id);
            return view('dashboard', compact('fingerscanData','user'));
        }else{
            return view('admin');
        }

    }
    
    public function scan()
    {
        return view('scan');
    }
}

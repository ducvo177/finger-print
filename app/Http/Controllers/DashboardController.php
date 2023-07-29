<?php

namespace App\Http\Controllers;

use App\Repositories\FingerScanRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $fingerScanRepository;

    public function __construct(UserRepository $userRepository, FingerScanRepository $fingerScanRepository)
    {
        $this->userRepository = $userRepository;
        $this->fingerScanRepository = $fingerScanRepository;
    }

    public function index()
    {
        $user = auth()->user();
        if (auth()->user()->is_admin == 0) {
            $fingerscanData = $this->fingerScanRepository->findByUserId(auth()->user()->id);
            return view('dashboard', compact('fingerscanData', 'user'));
        } else {
            return redirect()->route('admin');
        }
    }
    public function admin(Request $request)
    {
        $inputs = $request->all();
        $sortBy = $request->sort_by;
        $sortOrder = $request->sort_order;
        $search = $request->search;
        $users = $this->userRepository->getAllUser($sortBy, $sortOrder, $search);
        return view('admin', compact('users'));
    }
    public function scan()
    {
        return view('scan');
    }

    public function check(Request $request)
    {
        // Lấy thông tin về file
        $file = $request->file('url');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('image', $fileName, 'public');
        $imageUrl = Storage::url($filePath);
        $inputs['isCorrect'] = 0;
        $inputs['date'] = Carbon::now();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['tmpContent'] = $imageUrl;
        $inputs['scanmachine_id'] = 20;
        $this->fingerScanRepository->save($inputs);
        return redirect()->route('dashboard')->with('success', 'Đã điểm danh thành công');
    }
}

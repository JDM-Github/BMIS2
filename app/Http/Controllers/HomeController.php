<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\BlotterRecord;
use App\Models\BulletinBoard;
use App\Models\Notification;
use App\Models\RequestDocument;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $requestDocuments = RequestDocument::where('user_id', auth()->id())->get();

        $notifications = [];
        foreach ($requestDocuments as $document) {

            $notificationData = [];

            if ($document->is_announce == 1) {
                $message = 'Document ' . $document->document_name . ' is Accepted, the document valid until ' . $document->valid_until;
                flash()->success($message);
                $document->is_announce = 2;

                $notificationData = [
                    'user_id' => auth()->id(),
                    'title' => 'Document Accepted',
                    'message' => $message
                ];
            } elseif ($document->is_announce == 3) {
                $message = 'Document ' . $document->document_name . ' is Rejected.';
                flash()->flash('error', $message, [], 'Rejected');
                $document->is_announce = 5;

                $notificationData = [
                    'user_id' => auth()->id(),
                    'title' => 'Document Rejected',
                    'message' => $message
                ];
            } elseif ($document->is_announce == 2) {
                $message = 'Document ' . $document->document_name . ' valid until ' . $document->valid_until;
                flash()->flash('warning', $message, [], 'Notice');

                $notificationData = [
                    'user_id' => auth()->id(),
                    'title' => 'Document Validity Notice',
                    'message' => $message
                ];
            }

            if ($document->status == 2 && Carbon::parse($document->valid_until)->isPast()) {
                $message = 'Document ' . $document->document_name . ' validity has expired.';
                flash()->flash('error', $message, [], 'Expired');
                $document->is_announce = 5;
                $document->status = 4;

                $notificationData = [
                    'user_id' => auth()->id(),
                    'title' => 'Document Expired',
                    'message' => $message
                ];
            }
            if (!empty($notificationData)) {
                Notification::create($notificationData);
                $notifications[] = $notificationData;
            }
            $document->save();
        }

        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        if ($notifications->isEmpty()) {
            Notification::create([
                'user_id' => auth()->id(),
                'title' => 'Hello User',
                'message' => 'You have no notifications at the moment.',
            ]);
            $notifications = Notification::where('user_id', auth()->id())->get();
        }

        $bulletins = BulletinBoard::latest()->take(5)->get();
        $members = [
            ['name' => 'Hon. Nemar G. Mendoza', 'role' => 'Punong Barangay', 'image' => 'nemar.jpg'],
            ['name' => 'Hon. Nancy G. Mendoza', 'role' => 'Barangay Kagawad', 'image' => 'nancy.jpg'],
            ['name' => 'Hon. Jimmy O. Castillo', 'role' => 'Barangay Kagawad', 'image' => 'jimmy.jpg'],
            ['name' => 'Hon. Joanne M. Soriano', 'role' => 'Barangay Kagawad', 'image' => 'joanne.jpg'],
            ['name' => 'Hon. Marcos E. Alcantara', 'role' => 'Barangay Kagawad', 'image' => 'marcos.jpg'],
            ['name' => 'Hon. Valeriano T. Evangelista', 'role' => 'Barangay Kagawad', 'image' => 'valeriano.jpg'],
            ['name' => 'Hon. Marni M. Matamis', 'role' => 'Barangay Kagawad', 'image' => 'marni.jpg'],
            ['name' => 'Hon. Aaron O. Lucido', 'role' => 'Barangay Kagawad', 'image' => 'aaron.jpg'],
            ['name' => 'Hon. Kym Ervin J. Alcantara', 'role' => 'SK Chairman', 'image' => 'kym.jpg'],
            ['name' => 'Sec. Lea P. Tercero', 'role' => 'Kalihim', 'image' => 'lea.jpg'],
            ['name' => 'Treas. Rodelyn M. Grumal', 'role' => 'Ingat Yaman', 'image' => 'rodelyn.jpg'],
        ];

        return view('home', compact('notifications', 'bulletins', 'members'));
    }


    public function dashboard(Request $request)
    {
        $role = UserTypeEnum::Resident->value;

        $timePeriod = $request->get('timePeriod', 'month');

        $totalUsers = User::count();
        $previousMonthUserCount = User::where('created_at', '>', Carbon::now()->subMonth())->count();
        $userGrowth = $totalUsers > 0 ? round((($previousMonthUserCount / $totalUsers) * 100), 2) : 0;

        if ($timePeriod == 'week') {
            $userGrowth = $totalUsers > 0 ? round((User::where('created_at', '>', Carbon::now()->subWeek())->count() / $totalUsers) * 100, 2) : 0;
        } elseif ($timePeriod == 'month') {
            $userGrowth = $totalUsers > 0 ? round((User::where('created_at', '>', Carbon::now()->subMonth())->count() / $totalUsers) * 100, 2) : 0;
        } elseif ($timePeriod == 'year') {
            $userGrowth = $totalUsers > 0 ? round((User::where('created_at', '>', Carbon::now()->subYear())->count() / $totalUsers) * 100, 2) : 0;
        }

        if ($timePeriod == 'week') {
            $servicesUsed = RequestDocument::where('status', 0)->where('created_at', '>', Carbon::now()->subWeek())->count();
        } elseif ($timePeriod == 'month') {
            $servicesUsed = RequestDocument::where('status', 0)->where('created_at', '>', Carbon::now()->subMonth())->count();
        } elseif ($timePeriod == 'year') {
            $servicesUsed = RequestDocument::where('status', 0)->where('created_at', '>', Carbon::now()->subYear())->count();
        }

        $totalServices = RequestDocument::count();
        $servicesUsage = $totalServices > 0 ? round(($servicesUsed / $totalServices) * 100, 2) : 0;

        $activeResidents = User::role($role)->where('status', true)->count();
        $inactiveResidents = User::role($role)->where('status', null)->count();
        $activePercentage = $totalUsers > 0 ? round(($activeResidents / $totalUsers) * 100, 2) : 0;

        $completedAppointments = RequestDocument::where('status', 1)->count();
        $pendingAppointments = RequestDocument::where('status', 0)->count();
        $completedPercentage = $totalServices > 0 ? round(($completedAppointments / $totalServices) * 100, 2) : 0;

        $residentCount = User::role($role)->where('status', true)->count();
        $pendingResidentCount = User::role($role)->where('status', null)->count();

        $maleCount = User::role($role)->where('status', true)->where('gender', 'male')->count();
        $femaleCount = User::role($role)->where('status', true)->where('gender', 'female')->count();
        $otherGenderCount = User::role($role)->where('status', true)->where('gender', 'others')->count();

        $totalCount = $maleCount + $femaleCount + $otherGenderCount;
        $pwdCount = $totalCount > 0 ? $totalCount - User::role($role)->where('status', true)->where('pwd', 'None')->count() : 0;

        $malePercentage = $totalCount > 0 ? round(($maleCount / $totalCount) * 100, 2) : 0;
        $femalePercentage = $totalCount > 0 ? round(($femaleCount / $totalCount) * 100, 2) : 0;
        $otherGenderPercentage = $totalCount > 0 ? round(($otherGenderCount / $totalCount) * 100, 2) : 0;

        $pendingDocument = RequestDocument::where('status', 0)->count();
        $blotterRecordCount = BlotterRecord::count();

        $bulletins = BulletinBoard::latest()->take(5)->get();
        $appointmentPendingCount = RequestDocument::where('status', null)->count();
        $servicesDone = RequestDocument::where('status', 1)->count();
        $totalDocuments = RequestDocument::count();

        return view('dashboard', compact(
            'bulletins',
            'residentCount',
            'maleCount',
            'femaleCount',
            'otherGenderCount',
            'appointmentPendingCount',
            'pendingResidentCount',
            'pendingDocument',
            'blotterRecordCount',
            'servicesDone',
            'totalDocuments',
            'userGrowth',
            'servicesUsage',
            'activePercentage',
            'completedPercentage',
            'timePeriod'
        ));
    }




    // public function home()
    // {
    //     $role = UserTypeEnum::Resident->value;

    //     $residentCount = User::role($role)->where('status', true)->count();
    //     $pendingResidentCount = User::role($role)->where('status', null)->count();

    //     $maleCount = User::role($role)
    //         ->where('status', true)
    //         ->where('gender', 'male')->count();
    //     $femaleCount = User::role($role)
    //         ->where('status', true)
    //         ->where('gender', 'female')->count();
    //     $otherGenderCount = User::role($role)
    //         ->where('status', true)
    //         ->where('gender', 'others')->count();

    //     $pendingDocument = RequestDocument::where('status', null)->count();
    //     $blotterRecordCount = BlotterRecord::count();

    //     $appointmentPendingCount = RequestDocument::where('status', null)->count();
    //     return view('home', compact('residentCount', 'maleCount', 'femaleCount', 'otherGenderCount', 'appointmentPendingCount', 'pendingResidentCount', 'pendingDocument', 'blotterRecordCount'));
    // }
}

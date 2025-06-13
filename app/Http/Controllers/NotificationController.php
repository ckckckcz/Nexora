<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanMagang;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function getAdminNotifications()
    {
        // Get recent internship applications (last 24 hours for fresh notifications)
        $recentApplications = PengajuanMagang::with(['mahasiswa', 'lowongan'])
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->orderBy('created_at', 'desc')
            ->limit(15)
            ->get();

        // Get pending applications count
        $pendingCount = PengajuanMagang::where('status_pengajuan', 'menunggu')->count();

        $notifications = [];

        // Add each recent application as a notification
        foreach ($recentApplications as $application) {
            $timeAgo = $this->timeAgo($application->created_at);
            
            $notifications[] = [
                'id' => 'app_' . $application->id_pengajuan,
                'type' => 'new_application',
                'icon' => 'user-plus',
                'color' => 'blue',
                'title' => 'Pengajuan Magang Baru',
                'message' => $application->mahasiswa->nama_mahasiswa . ' mengajukan magang untuk posisi ' . $application->lowongan->posisi,
                'time' => $timeAgo,
                'url' => '/admin/pengajuan-magang',
                'status' => $application->status_pengajuan,
                'created_at' => $application->created_at,
                'isNew' => $application->created_at->diffInHours(Carbon::now()) < 1
            ];
        }

        // Add summary notification for pending applications
        if ($pendingCount > 0) {
            $notifications[] = [
                'id' => 'pending_summary',
                'type' => 'pending_summary',
                'icon' => 'clock',
                'color' => 'yellow',
                'title' => 'Pengajuan Menunggu Persetujuan',
                'message' => $pendingCount . ' pengajuan magang menunggu persetujuan Anda',
                'time' => 'Sekarang',
                'url' => '/admin/pengajuan-magang',
                'count' => $pendingCount
            ];
        }

        return response()->json([
            'notifications' => $notifications,
            'total_count' => count($notifications),
            'unread_count' => $pendingCount // Use pending count as unread indicator
        ]);
    }

    public function markAsRead(Request $request)
    {
        return response()->json(['success' => true, 'message' => 'Notifikasi telah ditandai sebagai sudah dibaca']);
    }

    private function timeAgo($datetime)
    {
        $now = Carbon::now();
        $diff = $datetime->diffInMinutes($now);

        if ($diff < 1) {
            return 'Baru saja';
        } elseif ($diff < 60) {
            return $diff . ' menit yang lalu';
        } elseif ($diff < 1440) {
            $hours = floor($diff / 60);
            return $hours . ' jam yang lalu';
        } else {
            $days = floor($diff / 1440);
            if ($days == 1) {
                return 'Kemarin';
            }
            return $days . ' hari yang lalu';
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\LowonganMagang;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public function matriksPerbandingan($preferensi) {
        $matriks = [];
        $lowongan = LowonganMagang::all();
        foreach ($lowongan as $low) {
            $skor = [];
            
            // Keahlian
            $keahlianLow = explode(', ', $low['bidang_keahlian']);
            $cocokKeahlian = !empty(array_intersect($keahlianLow, $preferensi['keahlian']));
            $skor[] = $cocokKeahlian ? 5 : 1;
            
            // Fasilitas
            $fasilitasLow = explode(', ', $low['fasilitas_perusahaan']);
            $cocokFasilitas = !empty(array_intersect($fasilitasLow, $preferensi['fasilitas']));
            $skor[] = $cocokFasilitas ? 4 : 2;
            
            // Status Gaji
            $skor[] = ($low['status_gaji'] == $preferensi['status_gaji']) ? 5 : 3;
            
            // Tipe Perusahaan
            $skor[] = ($low['tipe_perusahaan'] == $preferensi['tipe_perusahaan']) ? 5 : 2;
            
            // Fleksibilitas
            $skor[] = ($low['fleksibilitas_kerja'] == $preferensi['fleksibilitas_kerja']) ? 5 : 
            ($low['fleksibilitas_kerja'] == 'hybrid' ? 4 : 2);
            
            $matriks[] = $skor;
        }
        // $this->normalisasiWmsc($matriks));

        return $matriks;
    }

    public function normalisasiWmsc($matriks) {
        $n = count($matriks[0]);
        $max_values = [];
        $min_values = [];
        for ($j = 0; $j < $n; $j++) {
            $max_values[$j] = max(array_column($matriks, $j));
            $min_values[$j] = min(array_column($matriks, $j));
        }
        $normalized = [];
        foreach ($matriks as $row) {
            $norm_row = [];
            for ($j = 0; $j < $n; $j++) {
                if ($max_values[$j] == $min_values[$j]) {
                    $norm_row[$j] = 0;
                } else {
                    $norm_row[$j] = ($row[$j] - $min_values[$j]) / ($max_values[$j] - $min_values[$j]);
                }
            }
            $normalized[] = $norm_row;
        }
        return $normalized;
    }

    public function scoreWmsc($normalized) {
        $bobot = ['C1' => 0.4, 'C2' => 0.25, 'C3' => 0.1, 'C4' => 0.15, 'C5' => 0.1];
        $n = count($normalized[0]);
        $wmsc_scores = [];
        foreach ($normalized as $index => $row) {
            $score = 1;
            for ($j = 0; $j < $n; $j++) {
                $score *= pow($row[$j] + 0.01, $bobot[array_keys($bobot)[$j]]);
            }
            $wmsc_scores[$index] = round($score, 3);
        }
        // $wmsc_scores = array_map(function($val) {
            //     return number_format($val, 5); // 3 angka di belakang koma
            // }, $wmsc_scores);
            
            // print_r($wmsc_scores);
        // $wmsc_scores);
        return $wmsc_scores;
    }    
    public function hitungVIKOR($matriks, $v = 0.5) {
        $bobot = ['C1' => 0.4, 'C2' => 0.25, 'C3' => 0.1, 'C4' => 0.15, 'C5' => 0.1];
        $n = count($matriks[0]);
        $max_values = [];
        $min_values = [];
        for ($j = 0; $j < $n; $j++) {
            $max_values[$j] = max(array_column($matriks, $j));
            $min_values[$j] = min(array_column($matriks, $j));
        }
        $normalized = [];
        foreach ($matriks as $row) {
            $norm_row = [];
            for ($j = 0; $j < $n; $j++) {
                if ($max_values[$j] == $min_values[$j]) {
                    $norm_row[$j] = 0;
                } else {
                    $norm_row[$j] = ($max_values[$j] - $row[$j]) / ($max_values[$j] - $min_values[$j]);
                }
            }
            $normalized[] = $norm_row;
        }
        $S = [];
        $R = [];
        foreach ($normalized as $index => $row) {
            $s_score = 0;
            $r_score = 0;
            for ($j = 0; $j < $n; $j++) {
                $weighted_value = $bobot[array_keys($bobot)[$j]] * $row[$j];
                $s_score += $weighted_value;
                $r_score = max($r_score, $weighted_value);
            }
            $S[$index] = round($s_score, 3);
            $R[$index] = round($r_score, 3);
        }
        $S_star = min($S);
        $S_minus = max($S);
        $R_star = min($R);
        $R_minus = max($R);
        $Q = [];
        foreach ($S as $index => $s_score) {
            if ($S_minus == $S_star || $R_minus == $R_star) {
                $Q[$index] = 0;
            } else {
                $Q[$index] = number_format(
                    $v * ($s_score - $S_star) / ($S_minus - $S_star) +
                    (1 - $v) * ($R[$index] - $R_star) / ($R_minus - $R_star),
                    3
                );
            }
        }
        $result = [
            'matriks_perbandingan' => $matriks, 
            'normalisasi' => $normalized, 
            'nilai_max' => $max_values,
            'nilai_min' => $min_values,
            's' => $S, 
            'r' => $R, 
            's_max' => $S_minus,
            's_min' => $S_star,
            'r_max' => $R_minus,
            'r_min' => $R_star,
            'q' => $Q
        ];

        return $result;
    }

    public function filterWmsc($wmsc_scores, $matriks) {
        $threshold = 0.030;
        $filtered_indices = array_keys(array_filter($wmsc_scores, fn($score) => $score >= $threshold));
        $filtered_matriks = [];
        foreach ($filtered_indices as $index) {
            $filtered_matriks[] = $matriks[$index];
        }
        $result = [$filtered_matriks, $filtered_indices];
        // $result);
        return $result;
    }
    
    public function ValidasiAkhir($vikor_result, $wmsc_scores, $filtered_matriks) {
        $filtered_indices = array_keys(array_filter($wmsc_scores, fn($score) => $score >= 0.030));
        // Validasi VIKOR
        $Q = $vikor_result['q'];
        $S = $vikor_result['s'];
        $R = $vikor_result['r'];

        // Urutkan berdasarkan nilai Q (semakin kecil semakin baik)
        $sorted_Q = $Q;
        asort($sorted_Q);
        // $sorted_Q);
        $ranked_indices = array_keys($sorted_Q);

        // Hitung DQ (acceptable advantage threshold)
        $jumlah_alternatif = count($filtered_matriks);
        $DQ = ($jumlah_alternatif > 1) ? 1 / ($jumlah_alternatif - 1) : 0;

        // Validasi Acceptable Advantage
        $acceptable_advantage = false;
        if ($jumlah_alternatif > 1) {
            $selisih_Q = $Q[$ranked_indices[1]] - $Q[$ranked_indices[0]];
            $acceptable_advantage = $selisih_Q >= $DQ;
        }

        // Validasi Acceptable Stability
        $best_index = $ranked_indices[0];
        $acceptable_stability = true;

        // Cek peringkat S
        $S_ranked = $S;
        asort($S_ranked);
        $S_ranks = array_keys($S_ranked);

        // Cek peringkat R
        $R_ranked = $R;
        asort($R_ranked);
        $R_ranks = array_keys($R_ranked);

        // Jika best_index bukan peringkat 1 di S maupun R → tidak stabil
        if ($S_ranks[0] !== $best_index && $R_ranks[0] !== $best_index) {
            $acceptable_stability = false;
        }

        // Solusi kompromi
        $compromise_solutions = [$best_index];

        if (!$acceptable_advantage && $jumlah_alternatif > 1) {
            for ($i = 1; $i < $jumlah_alternatif; $i++) {
                $current_index = $ranked_indices[$i];
                if (($Q[$current_index] - $Q[$best_index]) < $DQ) {
                    $compromise_solutions[] = $current_index;
                } else {
                    break;
                }
            }
        }

        $lowongan = LowonganMagang::all();
        $output_data = [];
        foreach ($filtered_matriks as $index => $low) {
            $wmsc_value = isset($wmsc_scores[$filtered_indices[$index]]) ? $wmsc_scores[$filtered_indices[$index]] : null;
            $qi_value = isset($filtered_indices[$index]) && isset($vikor_result['q'][array_search($filtered_indices[$index], $filtered_indices)])
                ? $vikor_result['q'][array_search($filtered_indices[$index], $filtered_indices)]
                : null;

            $output_data[] = [
                'id_lowongan' => $lowongan[$filtered_indices[$index]]['id_lowongan'],
                'wmsc' => $wmsc_value,
                'qi' => intval($qi_value),
            ];
        }

        usort($output_data, function($a, $b) {
            if ($a['qi'] === null) return 1;
            if ($b['qi'] === null) return -1;
            return intval($a['qi']) <=> intval($b['qi']);
        });
        $rank = 1;
        foreach ($output_data as &$item) {
            $item['ranking'] = $rank++;
            $item['qi'] = (float)$item['qi'];
        }
        unset($rank);

        return $output_data;
    }
}

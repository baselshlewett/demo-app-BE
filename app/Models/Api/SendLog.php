<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class SendLog extends Model
{
    use HasFactory;

    protected $table = "send_log";

    public function getAll($dateFrom, $dateTo, $countryId, $userId)
    {
        $query = SendLog::select(DB::raw('count(log_id) as count'), DB::raw('DATE(log_created) as log_created'), 'log_success');

        if (!empty($dateFrom) && !empty($dateTo)) {
            $query->whereBetween('log_created', [ $dateFrom, $dateTo ]);
        }

        if (!empty($countryId)) {
            // since country is tied to numbers, we'd have to do an inner join on numbers then countries to fetch country title
            $query->addSelect('countries.cnt_title')->join('numbers', 'send_log.num_id', '=', 'numbers.num_id')
                    ->join('countries', 'numbers.cnt_id', '=', 'countries.cnt_id')
                    ->where('countries.cnt_id', $countryId);
        }

        if (!empty($userId)) {
            $query->where('usr_id', $userId);
        }

        $query->groupBy('log_success')->groupBy(DB::raw('log_created'))->orderBy('log_created');

        return $this->_mapLogsData($query->get());
    }

    private function _mapLogsData($data)
    {
        if (empty($data)) {
            return [];
        }

        $mapped = [];

        foreach ($data as $log) {
            // are the keys we want to use set? if not then continue to next iteration
            if (!isset($log['log_success']) || !isset($log['log_created'])) {
                continue;
            }

            // map the log_success to better descriptive values than 0 and 1 || in case there is no count, then we put 0 to catch any failures
            if ($log['log_success']) {
                $mapped[ $log['log_created'] ]['success'] = $log['count'] ?? 0;
            } else {
                $mapped[ $log['log_created'] ]['failed'] = $log['count'] ?? 0;
            }
        }

        return $mapped;
    }
}

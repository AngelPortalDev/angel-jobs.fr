<?php

use Illuminate\Support\Facades\{DB, Storage, Mail, Exception, Queue,Http};
use App\Jobs\SendActionMails;
use Carbon\Carbon;

if (!function_exists('getDropDownlist')) {
    function getDropDownlist($table, $select, $limit = '')
    {

        if (!empty($select[1])) {
            $order = $select[1];
        } else {
            $order = $select[0];
        }
        if (isset($table) && !empty($table) && isset($select) && is_array($select)) {
            if($table == 'job_types'){
                $query = DB::table($table)->select($select)->where('is_deleted', 'No')->orderBy('id','ASC');
            }
            elseif($table == 'notice_periods'){
                // $query = DB::table($table)->select($select)->where('is_deleted', 'No')->orderBy($order,'ASC');
                $query = DB::table($table)->select($select)->where('is_deleted', 'No')->orderBy('id','ASC');
        }else{
                $query = DB::table($table)->select($select)->where('is_deleted', 'No')->orderBy($order,'ASC');
            }
           
            if (!empty($limit) && isset($limit) && is_numeric($limit)) {
                $query->take($limit);
            }
            $data = $query->get();
            return $data;
        }
    }
}
if (!function_exists('getData')) {
    function getData($table, $select, $where = '', $limit = '', $order_col = '', $order_dirc = 'DESC')
    {
        if (isset($table) && !empty($table) && isset($select) && is_array($select) && isset($where) && is_array($where)) {
            // $query = DB::table($table)->select($select)->where('is_deleted', 'No'); OLD
            $query = DB::table($table)->select($select); //New
            if (isset($where) && !empty($where) && $where != '' &&  is_array($where)) {
                $query->where($where);
            }
            if (isset($limit) && !empty($limit) && is_numeric($limit) && $limit != '') {
                $query->limit($limit);
            }
            if (isset($order_col) && !empty($order_col)) {
                $query->orderBy($order_col, $order_dirc);
            }
            
           
            $data = $query->get();
           
            return $data;
        }
    }
}
if (!function_exists('jobList')) {
    function jobList($table, $select, $where = '', $limit = '', $order_col = '', $order_dirc = 'DESC')
    {
        if (isset($table) && !empty($table) && isset($select) && is_array($select) && isset($where) && is_array($where)) {
            // $query = DB::table($table)->select($select)->where('is_deleted', 'No'); OLD
            $query = DB::table($table)->select($select); //New
            if (isset($where) && !empty($where) && $where != '' &&  is_array($where)) {
                $query->where($where);
            }
            if (isset($limit) && !empty($limit) && is_numeric($limit) && $limit != '') {
                $query->limit($limit);
            }
            if (isset($order_col) && !empty($order_col)) {
                $query->orderBy($order_col, $order_dirc);
            }
            // if (session()->has('js_username')) {               
            //     $js_data = getData('jobseeker_view', ['id', 'js_id', 'skill'], ['js_id' => session('js_user_id')],);
            //     if (!empty($js_data[0]->skill)) {                                     
            //         $skills = explode(',', $js_data[0]->skill);
            //         $query->where(function ($q) use ($skills) {
            //             foreach ($skills as $skill) {
            //                 $q->orWhereRaw('FIND_IN_SET(?, `skill_keyword`)', [intval($skill)]);
            //             }
            //         });  
            //     }                
            // }
            $query->where('job_expired_on', '>=', Carbon::now('Europe/Paris')->format('Y-m-d'));
            $data = $query->get();
            return $data;
        }
    }
}
if (!function_exists('multiSelectDropdown')) {
    function multiSelectDropdown($table, $select, $keys)
    {
        if (isset($table) && !empty($table) && isset($keys) && is_array($keys)) {
          
            foreach ($keys as $key) {
                $data[] = DB::table($table)->select($select)->where('id', $key)->get()->toArray();
            }
            return $data;
        }
    }
}
if (!function_exists('userEmailExist')) {
    function userExist($table, $select)
    {

        $data = DB::table($table)->select($select)->where('is_deleted', 'No')->get();
        return $data;
    }
}
if (!function_exists('jobseekerAction')) {
    function jobseekerAction($table, $data, $where = '')
    {
        $exists = DB::table($table)->where($where)->count();

        if ($exists != 0) {
            $data = DB::table($table)->where($where)->update($data);
            return $data;
        } else {
            $data = DB::table($table)->insert($data);
            return $data;
        }
    }
}
if (!function_exists('is_exist')) {
    function is_exist($table, $where)
    {
        if (isset($table) && !empty($table) && isset($where) && is_array($where)) {
            $data = DB::table($table)->where($where)->count();
            return $data;
        }
    }
}

if (!function_exists('jobCount')) {
    function jobCount($table, $where)
    {
        if (isset($table) && !empty($table) && isset($where) && is_array($where)) {
            $data = DB::table($table)->where($where)->where('job_expired_on', '>=', Carbon::now('Europe/Paris')->format('Y-m-d'))->count();
            return $data;
        }
    }
}
if (!function_exists('file_upload')) {
    function file_upload($file, $folder, $filename, $old_file = '')
    {
        
        if (isset($file) && !empty($file) && isset($folder) && !empty($folder) && isset($filename) && !empty($filename)) {
            //$is_uploaded = Storage::disk('local')->putFileAs($folder, $file, $filename);
            // $is_uploaded = Storage::disk('s3')->put($filename, file_get_contents($file)); //AWS S3 
            // $is_uploaded = $file->storeAs($folder, $filename, 's3');
            $filePath = $file->getRealPath();
            if (function_exists('passthru')) {
                ob_start();
                passthru("clamscan $filePath", $returnCode);
                $scanResult = ob_get_clean();
                if ($returnCode === 0 && str_contains($scanResult, 'OK')) {
                    return FALSE;
                }else{
                    $is_uploaded = Storage::disk('local')->putFileAs($folder, $file, $filename);
                }
            }else{
                $is_uploaded = Storage::disk('local')->putFileAs($folder, $file, $filename);
                
            }  
            }
           
            if (isset($is_uploaded) && !empty($is_uploaded)) {
                if (!empty($old_file) && isset($old_file) && file_exists($folder . "/" . $old_file)) {
                    unlink(public_path($folder . $old_file));
                    // Storage::disk('s3')->delete($old_file);
                     return TRUE;
                }
                return TRUE;
            } else {
              return FALSE;
            }
        } else {

            return FALSE;
        }
    }
}
if (!function_exists('getCurrentPlan')) {
    function is_JpPlanActive($table, $where)
    {

        if (!empty($table) && !empty($where) && is_array($where)) {

            $currentDate = Carbon::now('Europe/Paris');
            $today = $currentDate->format('Y-m-d');
            $planDetails = DB::table($table)->where($where)->where(function ($query) {
                $query->where('left_credit_job_posting_plan', '>', 0)->orWhere('free_assign_job_posting', '>', 0);
            })
                ->where('plan_expired_on', '>=', $today)->where('is_deleted', 'No')->count();
        return $planDetails;
        }
    }
}
if (!function_exists('mail_send')) {
    function mail_send($tmpl_id, $repl_contain, $repl_value, $sendto,$sendcc=[],$attachments = [])
    {
       
        
        $templContain = getData('email_templates', ['email_subject', 'email_content'], ['is_deleted' => 'No', 'id' => $tmpl_id]);
       
        $email_subject = $templContain[0]->email_subject;
        $email_content = $templContain[0]->email_content;
        $data['newSubject'] = str_replace($repl_contain, $repl_value, $email_subject);
        $data['newContain'] = str_replace($repl_contain, $repl_value, $email_content);
       
        $tes = send(
            $data['newSubject'],
            $data['newContain'],
            $sendto,
            $sendcc,
            $attachments
        );

    }
}
if (!function_exists('send')) {
    function send($subject, $sendingData, $sendto,$sendcc = [],$attachments = [])
    {
        
        try {
            Queue::push(new SendActionMails($subject, $sendingData, $sendto,$sendcc,$attachments));
            return TRUE;
        } catch (\Exception $error) {
            return FALSE;
        }
    }
}
if (!function_exists('duration')) {
    function duration($diff_date)
    {

        $date = new Carbon($diff_date, 'Europe/Paris');
        if ($date->diffInYears() != 0) {
            if ($date->diffInYears() > 1) {
                return $date->diffInYears() . " Years";
            } else {
                return $date->diffInYears() . " Year";
            }
        } elseif ($date->diffInMonths() != 0) {
            if ($date->diffInMonths() > 1) {
                return $date->diffInMonths() . " Months";
            } else {
                return $date->diffInMonths() . " Month";
            }
        } elseif ($date->diffInWeeks() != 0) {
            if ($date->diffInWeeks() > 1) {
                return $date->diffInWeeks() . " Weeks";
            } else {
                return $date->diffInWeeks() . " Week";
            }
        } elseif ($date->diffInDays() != 0) {
            if ($date->diffInDays() > 1) {
                return $date->diffInDays() . " Days";
            } else {
                return $date->diffInDays() . " Day";
            }
        } elseif ($date->diffInHours() != 0) {
            if ($date->diffInHours() > 1) {
                return $date->diffInHours() . " Hours";
            } else {
                return $date->diffInHours() . " Hour";
            }
        } elseif ($date->diffInMinutes() != 0) {
            if ($date->diffInMinutes() > 1) {
                return $date->diffInMinutes() . " Minutes";
            } else {
                return $date->diffInMinutes() . " Minute";
            }
        } elseif ($date->diffInMinutes() === 0) {
            return "Just Now";
        }
    }
}
function getCountryCodeByIp()
{
    try {
        $response = Http::get("https://api.myip.com");

        if ($response->successful()) {
            $countryName = $response->json('country');

            $countryData = DB::table('country_master')
                            ->where('country_name', $countryName)
                            ->select('country_code', 'country_flag', 'country_name', 'id')
                            ->first();

            return [
                'country_code' => $countryData ? $countryData->country_code : '',
                'country_flag' => $countryData ? $countryData->country_flag : '',
                'country_name' => $countryData ? $countryData->country_name : '',
                'country_id' => $countryData ? $countryData->id : ''
            ];
        }
    } catch (\Exception $e) {
    }

    return [
        'country_code' => '',
        'country_flag' => '',
        'country_name' => '',
        'country_id' => ''
    ];
}

if (!function_exists('processData')) {
    function processData($tableInfo, $data = [], $where = [])
    {

        $exists = 0;
        if (count($where) > 0) {
            $exists =  is_exist($tableInfo[0], $where);
        }
        if (isset($tableInfo) && is_array($tableInfo) && count($tableInfo) === 2) {
            $query = DB::table($tableInfo[0]);
            $primarykeyCol = isset($tableInfo[1])  ? $tableInfo[1] : 0;

            if (isset($exists) && is_numeric($exists) && $exists === 0) {
                if (isset($data) && is_array($data) && count($data) > 0) {
                    $getId =  $query->insertGetId($data);
                    if (isset($getId) && is_numeric($getId) && $getId > 0) {
                        return ['status' => TRUE, 'id' => $getId];
                    }
                }
                return FALSE;
            } elseif (isset($exists) && is_numeric($exists) && $exists > 0) {
                if (isset($where) && is_array($where) && count($where) > 0) {
                    $query->where($where);
                }
                $getId = $query->first($primarykeyCol)->$primarykeyCol;
                if (isset($data) && is_array($data) && count($data) > 0) {
                    $response = $query->update($data);
                    if (isset($response) && is_numeric($response)) {
                        return ['status' => TRUE, 'id' => $getId];
                    }
                }
                return FALSE;
            }
            return FALSE;
        }
        return FALSE;
    }
}


if (!function_exists('saveData')) {
    function saveData($modelInstance, $data = [], $where = [])
    {
        $exists = 0;
        if (count($where) > 0) {
            $exists =  is_exists($modelInstance, $where);
        }
        if (isset($modelInstance)) {
            if (isset($exists) && is_numeric($exists) && $exists === 0) {
                if (isset($data) && is_array($data) && count($data) > 0) {
                    $getId =  $modelInstance->create($data);
                    if (isset($getId) && is_numeric($getId->getKey()) && $getId->getKey() > 0) {
                        return ['status' => TRUE, 'id' => $getId->getKey()];
                    }
                }
                return FALSE;
            } elseif (isset($exists) && is_numeric($exists) && $exists > 0 && isset($where) && is_array($where) && count($where) > 0) {
                $getData = $modelInstance->where($where)->first();
                if (isset($data) && is_array($data) && count($data) > 0) {
                    $getData->update($data);
                    if (isset($getData) && is_numeric($getData->getKey()) && $getData->getKey() > 0) {
                        return ['status' => TRUE, 'id' => $getData->getKey()];
                    }
                }
                return FALSE;
            }
            return FALSE;
        }
    }
}

if (!function_exists('getEmails')) {
    function getEmails($table, $columns, $where = [])
    {

        $query = DB::table($table)->select($columns);

        if (!empty($where)) {

            if (isset($where[1]) && $where[1] === 'IN' && is_array($where[2])) {
                $query->whereIn($where[0], $where[2]);
            } else {

                $query->where($where[0], $where[1], $where[2]);
            }
        }

        return $query->get();
    }
}

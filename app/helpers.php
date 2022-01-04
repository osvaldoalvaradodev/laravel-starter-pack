<?php
    use App\Activitylog;

    if (!function_exists('activityPush')) {
        function activityPush($type,$description){
            try {
                $activitylog = Activitylog::create(['type' => $type,'description'=>$description]);
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
?>

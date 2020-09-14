<?php
    use lavrentiev\widgets\toastr\NotificationFlash;
    echo NotificationFlash::widget([
        'options' => [
            "closeButton" => true,
            "debug" => true,
            "newstOnTop" => true,
            "progressBar" => true,
            "positionClass" => "toast-top-right",
            "preventDuplicates" => false,
            "onclick" => null,
            "showDuration" => "2000",
            "hideDuration" => "1000",
            "timeOut" => "5000",
            "extendedTimeOut" => "1000",
            "showEasing" => "swing",
            "hideEasing" => "linear",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]
    ])
?>
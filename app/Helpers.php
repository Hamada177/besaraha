<?php 

use Illuminate\Support\Facades\App;



function getTime($time)
{

    date_default_timeZone_set("Africa/Cairo");

    $date2 = $time;
    $date1 = date("y-m-d h:i:sa");

    $diff = abs(strtotime($date2) - strtotime($date1));
    $years   = floor($diff / (365 * 60 * 60 * 24));
    $months  = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days    = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $hours   = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
    $minuts  = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
    $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60));


    $hours = $hours - 2;


    
 if (App::getLocale() == 'en') {


    // Start year
    if ($years >  0) {
        if ($years == 1) {
            return "one year";
        }
        if ($years == 2) {
            return "tow years";
        }
        if ($years >  2 && $years < 11) {
            return  $years . " years";
        }
        if ($years > 10) {
            return  $years ."year";
        }
    }
    //End year

    else {

        // start month 
        if ($months >  0) {
            if ($months == 1) {
                return  "one month";
            }
            if ($months == 2) {
                return  "tow months";
            }
            if ($months >  2 && $months < 11) {
                return  $months . " months";
            }
            if ($months > 10 ) {
                return  $months ."month";
            }
        }
        // End month

        else {

            // Start day
            if ($days >  0) {
                if ($days == 1) {
                    return  "one day";
                }
                if ($days == 2) {
                    return  "tow days";
                }
                if ($days >  2 && $days < 11) {
                    return  $days . " days";
                }
                if ($days > 10) {
                    return   $days ."day";
                }
            }
            // End day

            else {
                //  Start hours
                if ($hours >  0) {
                    if ($hours == 1) {
                        return  "one hour";
                    }
                    if ($hours == 2) {
                        return  "tow hours";
                    }
                    if ($hours >  2 && $hours < 11) {
                        return  $hours . " hours";
                    }
                    if ($hours > 10) {
                        return   $hours . " hour";
                    }
                }
                // End hours 

                else {

                    // Start minuts 
                    if ($minuts >  0) {
                        if ($minuts == 1) {
                            return  "one minute";
                        }
                        if ($minuts == 2) {
                            return  "tow minuts";
                        }
                        if ($minuts >  2 && $minuts < 11) {
                            return  $minuts . " minuts";
                        }
                        if ($minuts > 10) {
                            return  $minuts . " minute";
                        }
                    } else {

                        // Start seconds 
                        if ($seconds >  0) {
                            if ($seconds == 1) {
                                return  "a second";
                            }
                            if ($seconds == 2) {
                                return  "tow seconds";
                            }
                            if ($seconds >  2 && $seconds < 11) {
                                return  $seconds . " seconds";
                            }
                            if ($seconds > 10) {
                                return  $seconds ." second";
                            }
                        }else{
                            return  "Now";
                        // End seconds
                        }
                    }
                }
            }
        }
    }

 

 } else {
     # ///////////////////////////////////////////////////////////////////
    
    // Start year
    if ($years >  0) {
        if ($years == 1) {
            return "?????? ??????????";
        }
        if ($years == 2) {
            return "??????????";
        }
        if ($years >  2  && $years < 11) {
            return  $years . " ????????";
        }
        if ($years > 10) {
            return $years ." ??????";
        }
    }
    //End year

    else {

        // start month 
        if ($months >  0) {
            if ($months == 1) {
                return  "?????? ????????";
            }
            if ($months == 2) {
                return  "??????????";
            }
            if ($months >  2  && $months < 11) {
                return  $months . " ????????";
            }
            if ($months > 10) {
                return  $months ." ??????";
            }
        }
        // End month

        else {

            // Start day
            if ($days >  0) {
                if ($days == 1) {
                    return  "?????? ????????";
                }
                if ($days == 2) {
                    return  "??????????";
                }
                if ($days >  2 && $days < 11) {
                    return  $days . " ????????";
                }
                if ($days > 10) {
                    return   $days . " ??????";
                }
            }
            // End day

            else {
                //  Start hours
                if ($hours >  0) {
                    if ($hours == 1) {
                        return  "???????? ??????????";
                    }
                    if ($hours == 2) {
                        return  "????????????";
                    }
                    if ($hours >  2 && $hours < 11) {
                        return  $hours . " ??????????";
                    }
                    if ($hours >  10) {
                        return  $hours . " ????????";
                    }
                }
                // End hours 

                else {

                    // Start minuts 
                    if ($minuts >  0) {
                        if ($minuts == 1) {
                            return  "?????????? ??????????";
                        }
                        if ($minuts == 2) {
                            return  "??????????????";
                        }
                        if ($minuts >  2 && $minuts < 11) {
                            return  $minuts . " ??????????";
                        }
                        if ($minuts > 10) {
                            return  $minuts . " ??????????";
                        }
                    } else {

                        // Start seconds 
                        if ($seconds >  0) {
                            if ($seconds == 1) {
                                return  "?????????? ??????????";
                            }
                            if ($seconds == 2) {
                                return  "??????????????";
                            }
                            if ($seconds >  2 && $seconds < 11) {
                                return  $seconds . " ????????";
                            }
                            if ($seconds > 10) {
                                return    $seconds ." ??????????";
                            }
                        }else{
                            return  "????????";
                        // End seconds
                        }
                    }
                }
            }
        }
    }

 }




}
    
    // End function show time

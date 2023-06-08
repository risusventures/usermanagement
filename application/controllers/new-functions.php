<?php
function checktime_range()
{
    error_reporting(E_ALL);
    global $mysqli_crm;
    global $memcache;
    $q = "select id,tid,casetype,range_start,range_end,created_date from range_relation";
    $rows = get_rows($q);
    if (!empty($rows)) {
        $range = array();
        for ($i = 0; $i < count($rows); $i++) {
            $d = $rows[$i];
            $range[$d['range_end']][] = $d;
        }
        $arr = array();
        foreach ($range as $key => $val) {

            if (isset($val['0']['created_date']) && isset($val['1']['created_date'])) {
                $date1 = strtotime($val['0']['created_date']);
                $date2 = strtotime($val['1']['created_date']);
                $dif = abs($date1 - $date2);
                $gap = round(abs($date1 - $date2) / 60, 2);
                if ($gap < 1000) {
                    $arr[] = $gap;
                }

                //echo $gap. " minute <br>";


                /*
               $date_a = new \DateTime($date1);
               $date_b = new \DateTime($date2);   
               $interval = date_diff($date_a,$date_b);
               echo $interval->format('%h:%i:%s'); echo "<br>"; die;*/
            }
        }
        $a = array_filter($arr);
        $average = array_sum($a) / count($a);
        echo $average . " minute <br>";;
        // echo '<pre>'; print_r($arr); echo '</pre>';
    }
}

function insert_order_new_coin_order_USER($type, $buy, $account, $price_value, $buy_amount, $gain_percenate, $status, $symbol, $money_used_by, $algo_name, $coin, $OT, $buytype, $USER_ID, $last_ticker_id)
{
    global $mysqli_crm;
    global $memcache;

    $day_high = "day_high_$symbol";
    $day_low = "day_low_$symbol";
    $day_high_value = $memcache->get($day_high);
    $day_low_value = $memcache->get($day_low);
    $last_ticker_id = trim($last_ticker_id);
    $type = trim($type);
    $account = trim($account);
    $coin = trim($coin);
    $price_value = trim($price_value);
    $buy_amount = trim($buy_amount);
    $gain_percenate = trim($gain_percenate);
    $status = trim($status);
    $order_bit = array_map('trim', $buy);
    $id = $order_bit["id"];
    $id = addslashes($id);
    $dd = @date("Y-m-d H:i:s");
    $insert = "insert into orders (bid,symbol,acc_id,price,amount,status,type,created_date,buytype,money_used_by,comment,coin,ordertype,last_ticker_id,dayhp,daylp,subuser) values ('$id','$symbol','$account','$price_value','$buy_amount','$status','$type','$dd','$buytype','$money_used_by','$algo_name','$coin','$OT','$last_ticker_id','$day_high_value','$day_low_value','$USER_ID')";
    mysqli_query($mysqli_crm, $insert);

    $insert = addslashes($insert);
    $dd = "insert into query_log (data) values ('$insert')";
    mysqli_query($mysqli_crm, $dd);
}

function insert_order_sell_new_coin_order_with_tickerid($type, $buy, $account, $price_value, $buy_amount, $gain_percenate, $status, $symbol, $bbid, $money_used_by, $comment, $coin, $OT, $buytype, $last_ticker_id)
{
    global $mysqli_crm;
    global $memcache;

    $day_high = "day_high_$symbol";
    $day_low = "day_low_$symbol";
    $day_high_value = $memcache->get($day_high);
    $day_low_value = $memcache->get($day_low);
    $last_ticker_id = trim($last_ticker_id);
    if (empty($last_ticker_id)) {
        $www = "select id from tickernew where symbol='$symbol' order by id desc limit 1";
        $cu_data = get_row($www);
        $last_ticker_id = $cu_data['id'];
        $last_ticker_id = trim($last_ticker_id);
    }

    $type = trim($type);
    $coin = trim($coin);
    $account = trim($account);
    $price_value = trim($price_value);
    $buy_amount = trim($buy_amount);
    $gain_percenate = trim($gain_percenate);
    $status = trim($status);
    $money_used_by = trim($money_used_by);
    $order_bit = array_map('trim', $buy);
    $id = $order_bit["id"];
    $id = addslashes($id);
    $dd = @date("Y-m-d H:i:s");
    $insert = "INSERT INTO orders (type,bid,status,price,amount,gain_percentage,acc_id,created_date,symbol,bbid,money_used_by,comment,coin,ordertype,buytype,last_ticker_id,dayhp,daylp) values ('$type','$id','$status','$price_value','$buy_amount','$gain_percenate','$account','$dd','$symbol','$bbid','$money_used_by','$comment','$coin','$OT','$buytype','$last_ticker_id','$day_high_value','$day_low_value')";
    mysqli_query($mysqli_crm, $insert);

    $insert = addslashes($insert);
    $dd = "insert into query_log (data) values ('$insert')";
    mysqli_query($mysqli_crm, $dd);
}

function insert_order_new_coin_order_with_tickerid($type, $buy, $account, $price_value, $buy_amount, $gain_percenate, $status, $symbol, $money_used_by, $algo_name, $coin, $OT, $buytype, $last_ticker_id)
{
    global $mysqli_crm;
    global $memcache;

    $day_high = "day_high_$symbol";
    $day_low = "day_low_$symbol";
    $day_high_value = $memcache->get($day_high);
    $day_low_value = $memcache->get($day_low);
    $last_ticker_id = trim($last_ticker_id);
    $type = trim($type);
    $account = trim($account);
    $coin = trim($coin);
    $price_value = trim($price_value);
    $buy_amount = trim($buy_amount);
    $gain_percenate = trim($gain_percenate);
    $status = trim($status);
    $order_bit = array_map('trim', $buy);
    $id = $order_bit["id"];
    $id = addslashes($id);
    $dd = @date("Y-m-d H:i:s");
    $insert = "insert into orders (bid,symbol,acc_id,price,amount,status,type,created_date,buytype,money_used_by,comment,coin,ordertype,last_ticker_id,dayhp,daylp) values ('$id','$symbol','$account','$price_value','$buy_amount','$status','$type','$dd','$buytype','$money_used_by','$algo_name','$coin','$OT','$last_ticker_id','$day_high_value','$day_low_value')";
    mysqli_query($mysqli_crm, $insert);


    $insert = addslashes($insert);
    $dd = "insert into query_log (data) values ('$insert')";
    mysqli_query($mysqli_crm, $dd);
}

function check_deleted_orders_status()
{
    global $mysqli_crm;
    global $memcache;
    $mem = $memcache;
    $accounts = $memcache->get('account_active_semibot_sell');
    if (empty($accounts)) {
        $q = "select * from accounts where status_automatic_sell='active'";
        $accounts = get_rows_mem($q, 60);
        $memcache->set('account_active_semibot_sell', $accounts, 0, 0);
    }
    foreach ($accounts as $acc_info) {
        $account = $aid = $acc_info['id'];
        $key = $acc_info['acc_keys'];
        $secret = $acc_info['secret'];
        $bfx_acc2 = new Bitfinex($key, $secret);
        $formdata = $memcache->get('formdata');
        if (empty($formdata)) {
            $q1 = "select * from formdata where run='yes'";
            $formdata = get_rows_mem($q1, 120);
            $memcache->set('formdata', $formdata, 0, 0);
        }
        if (!empty($formdata)) {
            foreach ($formdata as $single_currency) {
                $jsnon_d = json_decode($single_currency['data'], true);
                $only_c = $single_currency['formcode'];
                $symbol = setcurrency($only_c);
                $sym_lower = strtolower($symbol);
                $mem_data = get_memcache_data_db($symbol);

                check_status_deleted_sell_orders($account, $sym_lower, $bfx_acc2);
            }
        }

    }
}

function check_status_deleted_sell_orders($account, $symbol, $bfx_acc2)
{
    global $mysqli_crm;
    $q = "select status,type,bbid,acc_id,id,bid,price,amount,gain_percentage,money_used_by,comment,coin,error_counter from orders where acc_id='$account' and symbol='$symbol'  and status='deleted' and type='selldeleted' order by id desc";
    // echo $q;
    // echo '<pre>'; print_r();  echo '</pre>';  echo "<br>";
    $open_orders = $bfx_acc2->get_orders();
    echo "account-->" . $account . ' <br>';
    echo '<pre>';
    print_r($open_orders);
    echo '</pre>';
    echo "<br>";
    /* if(!empty($open_orders)){
         foreach($open_orders as $single_order){
              $symbol=trim($single_order['symbol']);
              if($symbol=="eosusd"){
                  $order_id=$single_order['id'];
                 
                  $cancel_order = $bfx_acc2->cancel_order($order_id);
                   if(!isset($cancel_order['error'])){        
                      $qq="delete order directly $order_id   account $account";
                      $insert= addslashes($qq);
                      $dd="insert into query_log (data) values ('$insert')";
                      mysqli_query($mysqli_crm, $dd); 
                   }
              }
         }
     }
      
     */


}

function sell_order_semibot_new_sell_at_loss()
{
    global $mysqli_crm;
    global $memcache;
    $mem = $memcache;

    $accounts = $memcache->get('account_active_semibot_sell');
    if (empty($accounts)) {
        $q = "select * from accounts where status_automatic_sell='active'";
        $accounts = get_rows_mem($q, 60);
        $memcache->set('account_active_semibot_sell', $accounts, 0, 0);
    }
    //echo '<pre>'; print_r($accounts); echo '</pre>';

    foreach ($accounts as $acc_info) {
        $account = $aid = $acc_info['id'];
        $key = $acc_info['acc_keys'];
        $secret = $acc_info['secret'];
        $bfx_acc2 = new Bitfinex($key, $secret);

        $formdata = $memcache->get('formdata');
        if (empty($formdata)) {
            $q1 = "select * from formdata where run='yes'";
            $formdata = get_rows_mem($q1, 120);
            $memcache->set('formdata', $formdata, 0, 0);
        }
        if (!empty($formdata)) {
            foreach ($formdata as $single_currency) {
                $jsnon_d = json_decode($single_currency['data'], true);
                $only_c = $single_currency['formcode'];
                $symbol = setcurrency($only_c);
                $sym_lower = strtolower($symbol);
                $mem_data = get_memcache_data_db($symbol);

                $day_data = $memcache->get("trading_day_data_" . $sym_lower);
                $K_ARRAY = array_reverse($day_data['k']);
                $D_ARRAY = array_reverse($day_data['d']);
                $CP_ARRAY = array_reverse($day_data['ticker']);
                $H_ARRAY = array_reverse($day_data['histogram']);
                $M_ARRAY = array_reverse($day_data['mac']);
                $S_ARRAY = array_reverse($day_data['signals']);
                $BBLP_ARRAY = array_reverse($day_data['lower']);
                $BBHP_ARRAY = array_reverse($day_data['upper']);
                $BBBP_ARRAY = array_reverse($day_data['basis']);


                echo "K_ARRAY--->" . count($K_ARRAY) . "  ==  D_ARRAY--->" . count($D_ARRAY) . "  ==  CP_ARRAY" . count($CP_ARRAY);
                echo " \n";
                echo "H_ARRAY--->" . count($H_ARRAY) . "  ==  M_ARRAY--->" . count($M_ARRAY) . "  ==  S_ARRAY" . count($S_ARRAY);
                echo " \n";
                echo "BBLP_ARRAY--->" . count($BBLP_ARRAY) . "  ==  BBHP_ARRAY--->" . count($BBHP_ARRAY) . "  ==  BBBP_ARRAY" . count($BBBP_ARRAY);
                echo " \n";


                $condition = $jsnon_d["conditions_" . $sym_lower];
                $sell_condition = $jsnon_d["sellconditions_" . $sym_lower];

                $mem_data["form_money_avail_" . $sym_lower] = $acc_info['money_avail'];
                $mem_data["form_amount_to_buy_" . $sym_lower] = $acc_info['amount_to_buy'];
                $mem_data["form_allow_money_used_" . $sym_lower] = $acc_info['money_used'];


                $basic_price_detection = $mem_data['basic_price_detection'];
                $transaction_fee = $mem_data['transaction_fee'];
                $avg_error = $mem_data['avg_error'];
                $dead_exit_percentage = $mem_data['dead_exit_percentage'];
                $dead_exit = $mem_data['dead_exit'];
                $no_money_avail_new = $mem_data["form_money_avail_" . $sym_lower];
                $run_buy = $mem_data["form_run_buy_" . $sym_lower];

                $no_money_avail_new = $mem_data["form_money_avail_" . $sym_lower];
                $run_buy = $mem_data["form_run_buy_" . $sym_lower];
                $gain_percenate = $mem_data["form_gain_percentage_" . $sym_lower];
                $buy_amount = $mem_data["form_amount_to_buy_" . $sym_lower];
                // $rsi_k=$mem_data["form_rsi_k_buy_".$sym_lower];
                $allow_money_used = $mem_data["form_allow_money_used_" . $sym_lower];
                //$allow_money_used_sell=$mem_data["form_drop_sell_allow_money_".$sym_lower];
                //$rsi_d=$mem_data["form_rsi_d_buy_".$sym_lower];

                $k = $mem_data["trading_k_" . $sym_lower];
                $d = $mem_data["trading_d_" . $sym_lower];
                $time = $mem_data["trading_time_" . $sym_lower];
                // echo $mem_data["trading_time_".$sym_lower]; die;
                $current_price = $mem_data["trading_ticker_" . $sym_lower];

                $www = "select c from tickernew_only_one where symbol='$sym_lower' order by id desc limit 1";
                $current_data = get_row($www);
                if (!empty($current_data)) {
                    $current_price = $current_data['c'];
                }

                $buy_price_array = $mem_data["trading_basic_" . $sym_lower];
                $trading_lower_array = $mem_data["trading_lower_" . $sym_lower];
                $trading_upper_array = $mem_data["trading_upper_" . $sym_lower];
                //echo '<pre>'; print_r($trading_upper_array); echo '</pre>';
                $histogram = $mem_data["trading_histogram_" . $sym_lower];
                $mac = $mem_data["trading_mac_" . $sym_lower];
                $signal = $mem_data["trading_signal_" . $sym_lower];
                $reverse = array_reverse($buy_price_array);

                $buy_price = end($buy_price_array);
                $bb_lower_price = end($trading_lower_array);
                $bb_high_price = end($trading_upper_array);
                $ct = @date('Y-m-d H:i:s');
                $current_time = @strtotime($ct);
                $differenceInSeconds = $current_time - @strtotime($time);
                $msg = "";
                $waiting = 0;
                $msg = "";
                $waiting = 0;
                $allow_money_used_total = $allow_money_used;
                if ($only_c == "iotusd") {
                    iot();
                }
                if ($differenceInSeconds > 30) {
                    $msg = 'time difference is more than 30 sec';
                    $run_buy = "no";
                    $waiting = 1;
                    nodata();
                }
                //   $current_total_buy_amount=get_money_used_overall($aid);
                $current_total_buy_amount = 0;
                $K = $k;
                $D = $d;
                $CP = $current_price;

                $BBLP = $bb_lower_price;
                $BBHP = $bb_high_price;
                $H = $histogram;
                $M = $mac;
                $S = $signal;
                $BP = $buy_price;
                $BA = $buy_amount;
                $B300 = $reverse['299'];
                $AM = $allow_money_used_total;
                $UM = $current_total_buy_amount;
                $price_value = $CP + 0.0001;
                $rsi_k = $rsi_d = '';
                echo "account -->" . $account . " \n";
                echo "k --->" . $K . "  ( $rsi_k )" . " \n";
                echo "d --->" . $D . "   ( $rsi_d )" . " \n";
                echo "run_buy --->" . $run_buy . " \n";
                echo "current_price --->" . $current_price . " \n";
                echo "gain_percenate --->" . $gain_percenate . " \n";
                echo "buy_amount --->" . $buy_amount . " \n";
                echo "Time difference--->" . $differenceInSeconds . " \n";
                if ($differenceInSeconds > 30) {
                    $msg = 'time difference is more than 30 sec';
                    $run_buy = "no";
                    $cancel = 1;
                    nodata();
                    if ($differenceInSeconds > 180) {
                        //  nodata_place_sell_order($symbol,$account,$BA,$bfx_acc2,$gain_percenate,$transaction_fee,$CP,$K,$D,$H,$M,$S,98);
                    }

                } else {
                    // reset_nodata_place_sell_order($symbol,$account,$BA,$bfx_acc2,$gain_percenate,$transaction_fee,$CP,$K,$D,$H,$M,$S,98);


                    echo '*********************************' . " \n";

                    //   buy_to_bought_semiauto_order($symbol,$account,$BA,$bfx_acc2);
                    bought_to_sellorders_percentage_semiauto_order_at_current_price_new_final_at_loss($symbol, $account, $BA, $bfx_acc2, $gain_percenate, $transaction_fee, $CP, $K, $D, $H, $M, $S, 98, $acc_info);
                    //   check_status_cancel_pert_semiauto_order($symbol,$account,$BA,$bfx_acc2,$gain_percenate,$transaction_fee,$CP);
                    //  checkstatus_of_sellorders_semiauto_order($symbol,$account,$BA,$bfx_acc2,$gain_percenate,$transaction_fee,$CP);
                    //consolidate_pert_semiauto_order($symbol,$account,$BA,$bfx_acc2,$gain_percenate,$transaction_fee,$CP);
                    echo '*********************************' . " \n";


                }


            }
        }

    }
}


function bought_to_sellorders_percentage_semiauto_order_at_current_price_new_final_at_loss($symbol, $account, $buy_amount, $bfx_acc2, $gain_percenate, $transaction_fee, $current_price, $K, $D, $H, $M, $S, $default, $acc_info)
{
    global $profit;
    global $memcache;
    echo "bought_to_sellorders_percentage_semiauto_order_at_current_price_new_final_at_loss start \n";
    global $mysqli_crm;
    $q = "select acc_id,id,bid,price,amount,gain_percentage,money_used_by,comment,coin,error_counter from orders where status='bought' and money_used_by='pert' and (check_for_bought='0' or dataprobem='yes' ) and acc_id='$account' and symbol='$symbol' and (error_counter<=5 or error_counter IS NULL) and ordertype='semiauto' and consolidate='no'";

    $mainq = $q = "select acc_id,id,bid,price,amount,gain_percentage,money_used_by,comment,coin,error_counter from orders where status='bought' and money_used_by='pert' and (check_for_bought='0' or dataprobem='yes' ) and acc_id='$account' and symbol='$symbol'  and ordertype='semiauto' and consolidate='no'";
    $rows = get_rows_mem($q, 5);

    $querykey_mem = "KEY" . md5($mainq);
    $array_mem = array();

    $sell_at_loss = $acc_info['sell_al_lose'];
    $pecentage_loss = $acc_info['pecentage_loss'];
    $www = "select id from tickernew where symbol='$symbol' order by id desc limit 1";
    $cu_data = get_row($www);
    $last_ticker_id = $cu_data['id'];
    if (!empty($rows)) {
        foreach ($rows as $ff) {
            $oid = $ff['id'];
            $comment = $ff['comment'];
            $condition_query = "select id,sell_conditions,priority,internal_priority,prioritydata from conditions where symbol='$symbol' and casedd='$comment' limit 1";
            $condition_Data = get_row_mem($condition_query, 1);
            if (!empty($condition_Data)) {

//                $case_idd=$condition_Data['id'];
//                if($condition_Data['priority']!=$condition_Data['internal_priority']){

//                }

                $sell_conditions = $condition_Data['sell_conditions'];
                // echo $sell_conditions;
                if (!empty($sell_conditions)) {
                    $sell = "no";
                    eval($sell_conditions);
                    if ($sell != "no") {
                        $acc_id = $ff['acc_id'];
                        $coin = $ff['coin'];
                        $error_counter = $ff['error_counter'];
                        $money_used_by = $ff['money_used_by'];
                        $comment = $ff['comment'];

                        $b_order_id = $ff['bid'];
                        $oid = $ff['id'];
                        $buy_price = $ff['price'];
                        $amount = $ff['amount'];
                        if (empty($amount)) {
                            $amount = $buy_amount;
                        }

                        $gain_percentage = $ff['gain_percentage'];
                        $order_id = (int)$b_order_id;
                        $q = "select bid from orders where type='sell' and bbid='$order_id' and acc_id='$account' and symbol='$symbol' limit 1";
                        $row = get_row($q);
                        if (empty($row)) {
                            echo "try to place order at current price cp=$current_price and bp=$buy_price \n";
                            if ($current_price > $buy_price) {
                                $sell_price_new = $current_price;
                                $sell_amount = $amount - (($amount * $transaction_fee) / 100);
                                $sell_amou = $sell_amount / $sell_price_new;
                                $sell_price = $current_price;


                                $sell_amount = $sell_price * $coin;
                                $buy_amount = $amount;


                                // $__Percentage=(($sell_price-$buy_price)/$buy_price)*100;
                                $__Percentage = (($sell_amount - $buy_amount) / $buy_amount) * 100;

                                if ($__Percentage >= $profit) {
                                    echo " selling at Current price--->" . $sell_price . " \n";

                                    $sell = $bfx_acc2->new_order("$symbol", "$coin", "$sell_price", "bitfinex", "sell", 'exchange limit');
                                    if (!isset($sell['error'])) {

                                        $memcache->set($querykey_mem, $array_mem, 0, 0);

                                        $buyer_id = $order_id;
                                        echo "Placed sell order of buy id --->" . $order_id . "  sell id-->" . $sell["id"] . " \n";

                                        insert_order_sell_new_coin_order_with_tickerid('sell', $sell, $account, $sell_price, $amount, $gain_percentage, 'sell', $symbol, $buyer_id, $money_used_by, $comment, $coin, 'semiauto', 'semi_sell', $last_ticker_id);

                                        insert_sell_new($sell, $buyer_id, $account);

                                        // update check_for_bought 
                                        $q = "update orders SET check_for_bought='1' where id='$oid' and bid='$order_id' limit 1";
                                        update_row($q);

                                        fetch_balance_yes($account);


                                        $case_idd = $condition_Data['id'];
                                        if ($condition_Data['priority'] != $condition_Data['internal_priority']) {
                                            $prioritydata = json_decode($condition_Data['prioritydata'], true);
                                            $prioritydata[$account]['internal_priority'] = $condition_Data['priority'];
                                            $prioritydata = json_encode($prioritydata);
                                            $priority = $condition_Data['priority'];
                                            $up_condi = "update conditions set internal_priority='$priority',prioritydata='$prioritydata' where id='$case_idd' limit 1";
                                            execute($up_condi);
                                        }
                                        save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'seccuessfullysaved', $oid, $sell_price, $coin);
                                    } else {
                                        $msg = "";
                                        if (isset($sell['message'])) {
                                            $msg = trim($sell['message']);
                                            $array = explode("not enough exchange balance", $msg);
                                            if (count($array) > 1) {

                                                $newcoin = $coin - 2;
                                                $q = "update orders SET coin='$newcoin',coin_decrease='yes' where id='$oid'  limit 1";
                                                update_row($q);
                                                $q = "update orders SET error_msg='$msg' where id='$oid'  limit 1";
                                                update_row($q);
                                            }
                                        }

                                        debug_pre($sell);
                                        save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'errorplace-sellorder' . $msg, $oid);
                                    }


                                } else {
                                    sellorder_notplaced_percentage($oid, $__Percentage, $comment, $account, $symbol);
                                    save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'percentage<setpercet', $oid);
                                }

                            } else {
                                sell_vanish($comment, $account, $symbol, $oid);
                                $msg = "buyprice>cp:$buy_price>$current_price";
                                save_sellorders_semibot_tocheck_case($comment, $account, $symbol, $msg, $oid);
                            }
                        } else {
                            // update check_for_bought 
                            $q = "update orders SET check_for_bought='1' where id='$oid' and bid='$order_id' limit 1";
                            update_row($q);
                        }

                    } else {
                        cancel_sellorders_semiauto_case($comment, $account, $bfx_acc2, $symbol);
                        // save_sellorders_semibot_tocheck_case($comment,$account,$symbol,$sell,$oid);
                    }

                } else {
                    if ($K > $default) {

                        $acc_id = $ff['acc_id'];
                        $coin = $ff['coin'];
                        $error_counter = $ff['error_counter'];
                        $money_used_by = $ff['money_used_by'];
                        $comment = $ff['comment'];

                        $b_order_id = $ff['bid'];
                        $oid = $ff['id'];
                        $buy_price = $ff['price'];
                        $amount = $ff['amount'];
                        if (empty($amount)) {
                            $amount = $buy_amount;
                        }

                        $gain_percentage = $ff['gain_percentage'];
                        $order_id = (int)$b_order_id;
                        $q = "select bid from orders where type='sell' and bbid='$order_id' and acc_id='$account' and symbol='$symbol' limit 1";
                        $row = get_row($q);
                        if (empty($row)) {
                            echo "try to place order at current price cp=$current_price and bp=$buy_price \n";
                            if ($current_price > $buy_price) {
                                $sell_price_new = $current_price;
                                $sell_amount = $amount - (($amount * $transaction_fee) / 100);
                                $sell_amou = $sell_amount / $sell_price_new;
                                $sell_price = $current_price;

                                $sell_amount = $sell_price * $coin;
                                $buy_amount = $amount;


                                //$__Percentage=(($sell_price-$buy_price)/$buy_price)*100;
                                $__Percentage = (($sell_amount - $buy_amount) / $buy_amount) * 100;

                                if ($__Percentage >= $profit) {
                                    echo " selling at Current price--->" . $sell_price . " \n";

                                    $sell = $bfx_acc2->new_order("$symbol", "$coin", "$sell_price", "bitfinex", "sell", 'exchange limit');
                                    if (!isset($sell['error'])) {
                                        $memcache->set($querykey_mem, $array_mem, 0, 0);
                                        $buyer_id = $order_id;
                                        echo "Placed sell order of buy id --->" . $order_id . "  sell id-->" . $sell["id"] . " \n";
                                        insert_order_sell_new_coin_order_with_tickerid('sell', $sell, $account, $sell_price, $amount, $gain_percentage, 'sell', $symbol, $buyer_id, $money_used_by, $comment, $coin, 'semiauto', 'semi_sell', $last_ticker_id);

                                        insert_sell_new($sell, $buyer_id, $account);

                                        // update check_for_bought 
                                        $q = "update orders SET check_for_bought='1' where id='$oid' and bid='$order_id' limit 1";
                                        update_row($q);

                                        fetch_balance_yes($account);

                                        $case_idd = $condition_Data['id'];
                                        if ($condition_Data['priority'] != $condition_Data['internal_priority']) {
                                            $prioritydata = json_decode($condition_Data['prioritydata'], true);
                                            $prioritydata[$account]['internal_priority'] = $condition_Data['priority'];
                                            $prioritydata = json_encode($prioritydata);

                                            $priority = $condition_Data['priority'];
                                            $up_condi = "update conditions set internal_priority='$priority',prioritydata='$prioritydata' where id='$case_idd' limit 1";
                                            execute($up_condi);
                                        }
                                        save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'seccuessfullysaved', $oid, $sell_price, $coin);
                                    } else {
                                        $msg = "";
                                        if (isset($sell['message'])) {
                                            $msg = trim($sell['message']);
                                            $array = explode("not enough exchange balance", $msg);
                                            if (count($array) > 1) {

                                                $newcoin = $coin - 2;
                                                $q = "update orders SET coin='$newcoin',coin_decrease='yes' where id='$oid'  limit 1";
                                                update_row($q);

                                                $q = "update orders SET error_msg='$msg' where id='$oid'  limit 1";
                                                update_row($q);
                                            }
                                        }

                                        debug_pre($sell);
                                        save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'errorplace-sellorder' . $msg, $oid);
                                    }


                                } else {
                                    sellorder_notplaced_percentage($oid, $__Percentage, $comment, $account, $symbol);
                                    save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'percentage<setpercet', $oid);
                                }


                            } else {
                                sell_vanish($comment, $account, $symbol, $oid);
                                $msg = "buyprice>cp:$buy_price>$current_price";
                                save_sellorders_semibot_tocheck_case($comment, $account, $symbol, $msg, $oid);
                            }
                        } else {
                            // update check_for_bought 
                            $q = "update orders SET check_for_bought='1' where id='$oid' and bid='$order_id' limit 1";
                            update_row($q);
                        }
                    } else {
                        cancel_sellorders_semiauto($account, $bfx_acc2, $symbol);
                    }
                }

            }

        }
    } else {
        //clean_balance($symbol,$account,$buy_amount,$bfx_acc2,$gain_percenate,$transaction_fee,$current_price);       
        nothingtosell();
    }


    $q = "select acc_id,id,bid,price,amount,gain_percentage,money_used_by,comment,coin,error_counter from orders where status='bought' and money_used_by='pert' and (check_for_bought='0' or dataprobem='yes' ) and acc_id='$account' and symbol='$symbol'  and ordertype='semiauto' and consolidate='no' and subuser='0'";
    $rows = get_rows_mem($q, 5);

    $querykey_mem = "KEY" . md5($q);
    $array_mem = array();

    //$sell_at_loss="no";
    if ($sell_at_loss == "yes") {

        if (!empty($rows)) {
            foreach ($rows as $ff) {
                $oid = $ff['id'];
                $comment = $ff['comment'];
                $condition_query = "select id,sell_conditions,priority,internal_priority,prioritydata,moneydata from conditions where symbol='$symbol' and casedd='$comment' limit 1";
                $condition_Data = get_row_mem($condition_query, 1);
                if (!empty($condition_Data)) {
                    $moneydata = json_decode($condition_Data['moneydata'], true);
                    $acc_id = $ff['acc_id'];
                    $money_data = $moneydata[$acc_id];
                    $coin = $ff['coin'];
                    $error_counter = $ff['error_counter'];
                    $money_used_by = $ff['money_used_by'];
                    $comment = $ff['comment'];

                    $b_order_id = $ff['bid'];
                    $oid = $ff['id'];
                    $buy_price = $ff['price'];
                    $amount = $ff['amount'];
                    if (empty($amount)) {
                        $amount = $buy_amount;
                    }
                    $gain_percentage = $ff['gain_percentage'];
                    $order_id = (int)$b_order_id;
                    $q = "select bid from orders where type='sell' and bbid='$order_id' and acc_id='$account' and symbol='$symbol' limit 1";
                    $row = get_row($q);
                    if (empty($row)) {
                        echo "try to place order at current price cp=$current_price and bp=$buy_price \n";
                        if ($current_price > $buy_price) {
                            $sell_price_new = $current_price;
                            $sell_amount = $amount - (($amount * $transaction_fee) / 100);
                            $sell_amou = $sell_amount / $sell_price_new;
                            $sell_price = $current_price;

                            $__Percentage = (($sell_price - $buy_price) / $buy_price) * 100;
                            if ($__Percentage >= $profit) {
                                echo " selling at Current price--->" . $sell_price . " \n";

                                $sell = $bfx_acc2->new_order("$symbol", "$coin", "$sell_price", "bitfinex", "sell", 'exchange limit');
                                if (!isset($sell['error'])) {
                                    $memcache->set($querykey_mem, $array_mem, 0, 0);
                                    $buyer_id = $order_id;
                                    echo "Placed sell order of buy id --->" . $order_id . "  sell id-->" . $sell["id"] . " \n";
                                    insert_order_sell_new_coin_order_with_tickerid('sell', $sell, $account, $sell_price, $amount, $gain_percentage, 'sell', $symbol, $buyer_id, $money_used_by, $comment, $coin, 'semiauto', 'semi_sell', $last_ticker_id);

                                    insert_sell_new($sell, $buyer_id, $account);

                                    // update check_for_bought 
                                    $q = "update orders SET check_for_bought='1' where id='$oid' and bid='$order_id' limit 1";
                                    update_row($q);

                                    fetch_balance_yes($account);

                                    $case_idd = $condition_Data['id'];
                                    if ($condition_Data['priority'] != $condition_Data['internal_priority']) {
                                        $prioritydata = json_decode($condition_Data['prioritydata'], true);
                                        $prioritydata[$account]['internal_priority'] = $condition_Data['priority'];
                                        $prioritydata = json_encode($prioritydata);

                                        $priority = $condition_Data['priority'];
                                        $up_condi = "update conditions set internal_priority='$priority',prioritydata='$prioritydata' where id='$case_idd' limit 1";
                                        execute($up_condi);
                                    }
                                    save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'seccuessfullysaved', $oid, $sell_price, $coin);
                                } else {
                                    $msg = '';
                                    if (isset($sell['message'])) {
                                        $msg = trim($sell['message']);
                                        $array = explode("not enough exchange balance", $msg);
                                        if (count($array) > 1) {

                                            $newcoin = $coin - 2;
                                            $q = "update orders SET coin='$newcoin',coin_decrease='yes' where id='$oid'  limit 1";
                                            update_row($q);

                                            $q = "update orders SET error_msg='$msg' where id='$oid'  limit 1";
                                            update_row($q);
                                        }
                                    }

                                    debug_pre($sell);
                                    save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'errorplace-sellorder' . $msg, $oid);
                                }


                            } else {
                                sellorder_notplaced_percentage($oid, $__Percentage, $comment, $account, $symbol);
                                save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'percentage<setpercet', $oid);
                            }


                        } else {
                            $sellstatus = 'no';
                            $sellstatus = $money_data['sellstatus'];
                            if ($sellstatus == "yes") {

                                print_r("         Place loss orders waiting from harry command \n\n        ");
                                if (isset($money_data['sellpercentage']) && !empty($money_data['sellpercentage'])) {
                                    $pecentage_loss = $money_data['sellpercentage'];
                                }
                                // sell at loss  start 
                                $los_percentage = (($buy_price - $current_price) / $buy_price) * 100;
                                if ($los_percentage >= $pecentage_loss) {
                                    echo "Sell at loss \n";
                                    $sell_price_new = $current_price;
                                    $sell_amount = $amount - (($amount * $transaction_fee) / 100);
                                    $sell_amou = $sell_amount / $sell_price_new;
                                    $sell_price = $current_price;
                                    $__Percentage = (($sell_price - $buy_price) / $buy_price) * 100;
                                    echo " selling at Current price--->" . $sell_price . " \n";

                                    $sell = $bfx_acc2->new_order("$symbol", "$coin", "$sell_price", "bitfinex", "sell", 'exchange limit');
                                    if (!isset($sell['error'])) {
                                        $memcache->set($querykey_mem, $array_mem, 0, 0);
                                        $buyer_id = $order_id;
                                        echo "Placed sell order of buy id --->" . $order_id . "  sell id-->" . $sell["id"] . " \n";
                                        insert_order_sell_new_coin_order_with_tickerid('sell', $sell, $account, $sell_price, $amount, $gain_percentage, 'sell', $symbol, $buyer_id, $money_used_by, $comment, $coin, 'semiauto', 'semi_sell', $last_ticker_id);

                                        insert_sell_new($sell, $buyer_id, $account);

                                        // update check_for_bought 
                                        $q = "update orders SET check_for_bought='1',sell_loss='1' where id='$oid' and bid='$order_id' limit 1";
                                        update_row($q);

                                        fetch_balance_yes($account);

                                        $case_idd = $condition_Data['id'];
                                        if ($condition_Data['priority'] != $condition_Data['internal_priority']) {
                                            $prioritydata = json_decode($condition_Data['prioritydata'], true);
                                            $prioritydata[$account]['internal_priority'] = $condition_Data['priority'];
                                            $prioritydata = json_encode($prioritydata);

                                            $priority = $condition_Data['priority'];
                                            $up_condi = "update conditions set internal_priority='$priority',prioritydata='$prioritydata' where id='$case_idd' limit 1";
                                            execute($up_condi);
                                        }
                                        $mds = "seccuessfullysaved-atlost->$los_percentage-->cp-$current_price--bp->$buy_price";

                                        save_sellorders_semibot_tocheck_case($comment, $account, $symbol, $mds, $oid, $sell_price, $coin);

                                        stop_buy_account($account);
                                        loss_limit($comment, $account, $symbol, $mds, $oid, $sell_price, $coin);

                                    } else {
                                        if (isset($sell['message'])) {
                                            $msg = trim($sell['message']);
                                            $array = explode("not enough exchange balance", $msg);
                                            if (count($array) > 1) {

                                                $newcoin = $coin - 2;
                                                $q = "update orders SET coin='$newcoin',coin_decrease='yes' where id='$oid'  limit 1";
                                                update_row($q);

                                                $q = "update orders SET error_msg='$msg' where id='$oid'  limit 1";
                                                update_row($q);
                                            }
                                        }

                                        debug_pre($sell);
                                        save_sellorders_semibot_tocheck_case($comment, $account, $symbol, 'errorplace-sellorder', $oid);
                                    }


                                } else {
                                    $msg = "percentage>los_percentage-->$pecentage_loss>$los_percentage";
                                    save_sellorders_semibot_tocheck_case($comment, $account, $symbol, $msg, $oid);

                                }
                                // sell at loss  start 

                            }

                        }
                    } else {
                        $q = "update orders SET check_for_bought='1' where id='$oid' and bid='$order_id' limit 1";
                        update_row($q);
                    }
                }
            }
        }


    }


    echo "bought_to_sellorders_percentage_semiauto_order_at_current_price_new_final_at_loss end \n";
}

function stop_buy_account($aid)
{

    $users = array();
    $memcache->set('account_active_semibot_buy', $users, 0, 0);

    $q = "update accounts SET status_automatic_buy='inactive' where id='$aid' limit 1";
    update_row($q);

}

function get_money_used_overall_with_currency_Case_interger_price($account, $case, $sym_lower, $interger_price)
{
    global $mysqli_crm;
    global $ranges;
    $total = 0;

    $q = "SELECT created_date FROM `orders` WHERE `acc_id` = '$account'  AND symbol='$sym_lower' and comment='$case' AND `status` = 'bought' AND `gameover` = 'no' AND `consolidate` = 'no' and subuser='0' ORDER BY `id` DESC limit 1";


    //  $q="SELECT created_date FROM `orders` WHERE `acc_id` = '$account'  AND symbol='$sym_lower'  AND `status` = 'bought' AND `gameover` = 'no' AND `consolidate` = 'no' ORDER BY `id` DESC limit 1";

    $boughtss = get_row($q);
    if (!empty($boughtss)) {
        $created_date = $boughtss['created_date'];
        $now = @strtotime($created_date);
        $ten_minutes = $now - (10 * 60);
        $startDate = @date('Y-m-d H:i:s', $now);
        $endDate = @date('Y-m-d H:i:s', $ten_minutes);

        //echo $startDate."  ".$endDate." \n";

        $q = "select max(price) as max_price from orders WHERE `acc_id` = '$account'  AND symbol='$sym_lower' and comment='$case' AND `status` = 'bought' AND `gameover` = 'no' AND `consolidate` = 'no' and subuser='0'  and created_date>='$endDate' and created_date<='$startDate' ";
        // $q="select max(price) as max_price from orders WHERE `acc_id` = '$account'  AND symbol='$sym_lower'  AND `status` = 'bought' AND `gameover` = 'no' AND `consolidate` = 'no' and created_date>='$endDate' and created_date<='$startDate' "; 
        // echo $q." \n"; die;

        $data_max = get_row($q);
        if (!empty($data_max)) {

            $interger_price = $data_max['max_price'];
            $interger_price_start = $interger_price - $ranges;
            $interger_price_end = $interger_price;

            $q_amt = "SELECT SUM(amount)as amt FROM orders WHERE type= 'buy'  and status='buy' and consolidate='no'  and acc_id='$account' and ordertype='semiauto' and symbol='$sym_lower' and comment='$case' and subuser='0'  and price>='$interger_price_start' and price<'$interger_price_end' limit 1";

            $amtt = get_row($q_amt);
            if (isset($amtt['amt']) && !empty($amtt['amt']) && !is_null($amtt['amt'])) {
                $current_total_buy_amount = $amtt['amt'];
            } else {
                $current_total_buy_amount = 0;
            }
            $money = get_money_bought_overall_with_currency_Case_interger_price($account, $case, $sym_lower, $interger_price);

            $total = $current_total_buy_amount + $money;

        }

    }


    return $total;

}

function get_money_bought_overall_with_currency_Case_interger_price($account, $case, $sym_lower, $interger_price)
{
    global $mysqli_crm;
    global $ranges;

    $interger_price_start = $interger_price - $ranges;
    $interger_price_end = $interger_price;
    $current_total_buy_amount = $money = 0;
    $arrrr = array();
    $q_amt = "SELECT id,bid,amount FROM orders WHERE status='bought' and consolidate='no' and acc_id='$account' and ordertype='semiauto' and symbol='$sym_lower' and comment='$case' and subuser='0' and price>='$interger_price_start' and price<'$interger_price_end'";

    $rows = get_rows($q_amt);
    if (!empty($rows)) {

        foreach ($rows as $ff) {
            $b_order_id = $ff['bid'];
            $arrrr[] = $b_order_id;
            $oid = $ff['id'];
            $amount = $ff['amount'];

            $dd = "select id from orders where acc_id='$account' and bbid='$b_order_id' and ordertype='semiauto' LIMIT 1";
            $rs = get_row($dd);
            if (!empty($rs)) {

                $q_amt = "SELECT id FROM orders WHERE status='sold' and acc_id='$account' and bbid='$b_order_id' and ordertype='semiauto' LIMIT 1";
                $rowss = get_row($q_amt);
                if (!empty($rowss)) {
                    // debug_pre($rowss); die;
                } else {
                    $q_amt = "SELECT id FROM orders WHERE type='sell' and ordertype='semiauto' and (status='cancelled' and status='deleted')and acc_id='$account' and bbid='$b_order_id' LIMIT 1";
                    $rowss = get_row($q_amt);
                    if (empty($rowss)) {
                        $money = $money + $amount;
                    }
                }
            } else {
                $money = $money + $amount;
            }
        }
    }

    // echo "money--->".$money;

    if (!empty($arrrr)) {
        $ee = implode(",", $arrrr);
        $qqq = "select SUM(amount) as amt  from orders WHERE type='sell' and status='sell' and acc_id='$account' and sell_ids!='' and symbol='$sym_lower' and comment='$case' and subuser='0' and  bbid in ($ee) limit 1";
        // echo $qqq." \n";
        $amtt = get_row($qqq);

        if (isset($amtt['amt']) && !empty($amtt['amt']) && !is_null($amtt['amt'])) {
            $current_total_buy_amount = $amtt['amt'];
        } else {
            $current_total_buy_amount = 0;
        }
    }


    $total = $money + $current_total_buy_amount;
    return $total;

}


function get_money_used_overall_with_currency_Case_User($account, $case, $sym_lower, $USER_ID)
{
    $q_amt = "SELECT SUM(amount)as amt FROM orders WHERE type= 'buy'  and status='buy' and consolidate='no' and subuser='$USER_ID' and acc_id='$account' and ordertype='semiauto' and symbol='$sym_lower' and comment='$case' limit 1";
    // echo $q_amt;
    $amtt = get_row($q_amt);
    if (isset($amtt['amt']) && !empty($amtt['amt']) && !is_null($amtt['amt'])) {
        $current_total_buy_amount = $amtt['amt'];
    } else {
        $current_total_buy_amount = 0;
    }
    $money = get_money_bought_overall_with_currency_Case_User($account, $case, $sym_lower, $USER_ID);
    // echo "money--->". $money. "<br>";
    $total = $current_total_buy_amount + $money;
    return $total;
}

function get_money_bought_overall_with_currency_Case_User($account, $case, $sym_lower, $USER_ID)
{
    $money = 0;
    $q_amt = "SELECT id,bid,amount FROM orders WHERE status='bought' and consolidate='no' and subuser='$USER_ID' and acc_id='$account' and ordertype='semiauto' and symbol='$sym_lower' and comment='$case'";

    $rows = get_rows($q_amt);
    if (!empty($rows)) {
        foreach ($rows as $ff) {
            $b_order_id = $ff['bid'];
            $oid = $ff['id'];
            $amount = $ff['amount'];

            $dd = "select id from orders where acc_id='$account' and bbid='$b_order_id' and ordertype='semiauto' LIMIT 1";
            $rs = get_row($dd);
            if (!empty($rs)) {

                $q_amt = "SELECT id FROM orders WHERE status='sold' and acc_id='$account' and bbid='$b_order_id' and ordertype='semiauto' LIMIT 1";
                $rowss = get_row($q_amt);
                if (!empty($rowss)) {
                    // debug_pre($rowss); die;
                } else {
                    $q_amt = "SELECT id FROM orders WHERE type='sell' and ordertype='semiauto' and (status='cancelled' and status='deleted')and acc_id='$account' and bbid='$b_order_id' LIMIT 1";
                    $rowss = get_row($q_amt);
                    if (empty($rowss)) {
                        $money = $money + $amount;
                    }
                }
            } else {
                $money = $money + $amount;
            }
        }
    }

    // echo $money." \n";
    $qqq = "select SUM(amount) as amt  from orders WHERE type='sell' and status='sell' and subuser='$USER_ID' and acc_id='$account' and sell_ids!='' and symbol='$sym_lower' and comment='$case' limit 1";

    $amtt = get_row($qqq);
    if (isset($amtt['amt']) && !empty($amtt['amt']) && !is_null($amtt['amt'])) {
        $current_total_buy_amount = $amtt['amt'];
    } else {
        $current_total_buy_amount = 0;
    }
    $total = $money + $current_total_buy_amount;
    return $total;


}

?>
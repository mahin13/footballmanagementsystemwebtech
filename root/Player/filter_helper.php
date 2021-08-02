<?php

function filterData($filterParameters){

  if(!empty($filterParameters['c_name_filter']) && !empty($filterParameters['credit_filter']) && !empty($filterParameters['sort_filter'])){
    $_SESSION['all_filters'] = 1;
  }elseif(!empty($filterParameters['c_name_filter']) && empty($filterParameters['credit_filter']) && empty($filterParameters['sort_filter'])){
    unset($_SESSION['all_filters']);
    $_SESSION['c_name_filter'] = 1;
  }elseif(empty($filterParameters['c_name_filter']) && !empty($filterParameters['credit_filter']) && empty($filterParameters['sort_filter'])){
    unset($_SESSION['all_filters']);
    unset($_SESSION['c_name_filter']);
    $_SESSION['credit_filter'] = 1;
  }elseif(empty($filterParameters['c_name_filter']) && empty($filterParameters['credit_filter']) && !empty($filterParameters['sort_filter'])){
    unset($_SESSION['all_filters']);
    unset($_SESSION['c_name_filter']);
    unset($_SESSION['credit_filter']);
    $_SESSION['sort_filter'] = 1;
  }elseif(empty($filterParameters['c_name_filter']) && !empty($filterParameters['credit_filter']) && !empty($filterParameters['sort_filter'])){
    unset($_SESSION['all_filters']);
    unset($_SESSION['c_name_filter']);
    unset($_SESSION['credit_filter']);
    unset($_SESSION['sort_filter']);
    $_SESSION['credit_filter_sort_filter'] = 1;
  }elseif(!empty($filterParameters['c_name_filter']) && empty($filterParameters['credit_filter']) && !empty($filterParameters['sort_filter'])){
    unset($_SESSION['all_filters']);
    unset($_SESSION['c_name_filter']);
    unset($_SESSION['credit_filter']);
    unset($_SESSION['sort_filter']);
    unset($_SESSION['credit_filter_sort_filter']);
    $_SESSION['c_name_filter_sort_filter'] = 1;
  }elseif(!empty($filterParameters['c_name_filter']) && !empty($filterParameters['credit_filter']) && empty($filterParameters['sort_filter'])){
    unset($_SESSION['all_filters']);
    unset($_SESSION['c_name_filter']);
    unset($_SESSION['credit_filter']);
    unset($_SESSION['sort_filter']);
    unset($_SESSION['credit_filter_sort_filter']);
    unset($_SESSION['c_name_filter_sort_filter']);
    $_SESSION['c_name_filter_credit_filter'] = 1;
  }else{
    unset($_SESSION['all_filters']);
    unset($_SESSION['c_name_filter']);
    unset($_SESSION['credit_filter']);
    unset($_SESSION['sort_filter']);
    unset($_SESSION['credit_filter_sort_filter']);
    unset($_SESSION['c_name_filter_sort_filter']);
    unset($_SESSION['c_name_filter_credit_filter']);
    $msg = "No filter options were selected!";
  }
}

function prepareFilterQueries($filterParameters, $i, $j){

  $sql_extension = "";

  if(isset($filterParameters['sort_filter']) && ($filterParameters['sort_filter'] == "cn_high_low")){
    $sql_extension = " desc";
  }

  if(isset($_SESSION['all_filters'])){

    $sql = "select id, name, weight, task from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%'
    and weight = '".$filterParameters['credit_filter']."'
    order by name$sql_extension LIMIT $i, $j;";

  }elseif(isset($_SESSION['c_name_filter'])){

    $sql = "select id, name, weight, task from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%' LIMIT $i, $j;";

  }elseif(isset($_SESSION['credit_filter'])){
    $sql = "select id, name, weight, task from coachtask
    where weight = '".$filterParameters['credit_filter']."' LIMIT $i, $j;";

  }elseif(isset($_SESSION['sort_filter'])){

    $sql = "select id, name, weight, task from coachtask
    order by name$sql_extension LIMIT $i, $j;";

  }elseif(isset($_SESSION['credit_filter_sort_filter'])){

    $sql = "select id, name, weight, task from coachtask
    where weight = '".$filterParameters['credit_filter']."'
    order by name$sql_extension LIMIT $i, $j;";

  }elseif(isset($_SESSION['c_name_filter_sort_filter'])){

    $sql = "select id, name, weight, task from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%'
    order by name$sql_extension LIMIT $i, $j;";

  }elseif(isset($_SESSION['c_name_filter_credit_filter'])){

    $sql = "select id, name, weight, task from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%'
    and weight = '".$filterParameters['credit_filter']."' LIMIT $i, $j;";

  }else{
    $sql = "select id, name, weight, task from coachtask LIMIT $i, $j;";
  }

  return $sql;
}

function prepareCountFilterQueries($filterParameters){

  $sql_extension = "";

  if(isset($filterParameters['sort_filter']) && ($filterParameters['sort_filter'] == "cn_high_low")){
    $sql_extension = " desc";
  }

  if(isset($_SESSION['all_filters'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%'
    and weight = '".$filterParameters['credit_filter']."'
    order by name$sql_extension;";

  }elseif(isset($_SESSION['c_name_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%';";

  }elseif(isset($_SESSION['credit_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask
    where weight = '".$filterParameters['credit_filter']."';";

  }elseif(isset($_SESSION['sort_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask order by name$sql_extension;";
  }elseif(isset($_SESSION['credit_filter_sort_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask
    where wheight = '".$filterParameters['credit_filter']."'
    order by name$sql_extension;";

  }elseif(isset($_SESSION['c_name_filter_sort_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%'
    order by name$sql_extension;";

  }elseif(isset($_SESSION['c_name_filter_credit_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from coachtask
    where name like '%" .$filterParameters['c_name_filter']. "%'
    and weight = '".$filterParameters['credit_filter']."';";

  }else{
    $sqlTotalRows = "select count(*) as total_rows from coachtask;";
  }

  return $sqlTotalRows;
}

?>

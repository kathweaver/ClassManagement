<?php 
    function last_history_index () 
    { 
        return sizeof ($_SESSION['page_history']) - 1; 
    } 

    function script_name ($full_path) 
    { 
        return substr ($full_path, strrpos ($full_path, '/') + 1); 
    } 

    $this_page = script_name ($_SERVER['REQUEST_URI']); 

    if (!isset ($_SESSION['page_history']) and strpos ($this_page, 'index.php') === false) 
        $_SESSION['page_history'][0] = 'index.php'; 

    if (strpos ($_SESSION['page_history'][last_history_index ()], script_name ($_SERVER['PHP_SELF'])) === false) 
        $_SESSION['page_history'][] = $this_page; 
    else 
        $_SESSION['page_history'][last_history_index ()] = $this_page; 

    if ((sizeof ($_SESSION['page_history'])) > 10) 
        array_shift ($_SESSION['page_history']); 

    $this_page_index = last_history_index (); 

    if ($this_page === $_SESSION['page_history'][$this_page_index - 2]) 
        unset ($_SESSION['page_history'][$this_page_index], $_SESSION['page_history'][$this_page_index - 1]); 

    $referer = $_SESSION['page_history'][last_history_index () - 1]; 

?> 
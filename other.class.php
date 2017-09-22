<?php
    
    function checkempty($get,&$new_get){
      if (!empty($get)){
          $new_get=$get;
      }else {
          $new_get="";
      }
        
    }
    
    ?>
<?php

require_once ('../Model/ModelVO/Upload.php');

  $addinfo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       if ($addinfo && $addinfo['addArquivo']):
          $upload = new Upload();
          $file = $_FILES['file'];
          $upload->File($file);

          if (!$upload->getResult()):
              echo "<script type='text/javascript'>  
                     alert('Upload não foi realizado com sucesso'); 
                     history.back()
                   </script>";
            else : 

              echo "<script type='text/javascript'> 
                     alert('Upload realizado com sucesso!');  
                     history.back()
                   </script>";
            echo $upload->getMsg();
          endif;
        endif;
       
?>
         
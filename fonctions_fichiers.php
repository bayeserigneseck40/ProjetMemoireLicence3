<?php
//pour valider ou non l'extension du fichier
function valide_extension($file_name,$ext_ok){
    $file_ext=strtolower(substr(strrchr($file_name,'.'),1));
    if(in_array($file_ext,$ext_ok))
    return true;
    else
    return false;
}
//pour valider ou la taille du fichier
function valide_size($file){
    $maxsize=0;
    if(isset($_POST['max_file_size'])){
        $maxsize=$_POST['max_file_size'];
    }
        if($file['size']<=$maxsize)
        return true;
        else
        return false;
    
}
//deplacer un fichier en le renommant avec la dateheure courante
function move_file($Sourcefile,$destpath,$destname){
    if(!(is_dir($destpath)))
    mkdir($destpath);
    $dhc=date('dmY-His',time());
    $destname=$dhc."_".$destname;
    $dest="$destpath/$destname";
    return move_uploaded_file($Sourcefile,$destname);

}



?>
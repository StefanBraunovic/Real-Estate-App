<?php



function uploadPhoto($file)
{
    $original_name = $_FILES[$file]['name'];
    $temp_name = $_FILES[$file]['tmp_name'];

    $temp_arr = explode(".", $original_name);
    $ekstenzija = $temp_arr[count($temp_arr) - 1];

    $new_file_name = "./uploads/" . uniqid() . "." . $ekstenzija;
    copy($temp_name, $new_file_name);

    return $new_file_name;
};

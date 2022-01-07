<?php

class Course_model{

  public function add_course($formdata){

    global $chain;
    $chain = false;
    if(insertat('tbl_course',$formdata)){
      return true;
    }else{
      return false;
    }
  }

  public function getAllCourses() {
            
            global $chain;
            $chain = false;

            return fetch_records("select * from tbl_course where status  = 'active' and deleted_at IS NULL");
			//whis record is existing 

        }

public function getMyCourses($user_id){

	global $chain;
	$chain = true;

	$query = where_this(getAll('tbl_course'),[
		'status' =>" ='active' AND",
		'user_id'=>" ='{$user_id}'"


	]);
	return fetch_records($query);
}
public function UpdateBannerPath($file_name,$course_id){
	global $chain;
	$chain=false;
	// prx(update('tbl_course',['banner_path'=>$file_name,'is_banner_added'=>'1'],['id'=>$course_id]));
	if(update('tbl_course',['banner_path'=>$file_name,'is_banner_added'=>'1'],['id'=>$course_id])){
		return true;


	}else{
		return false;
	}
}


public function UpdateSyllabusPath($file_name,$course_id){
	global $chain;
	$chain=false;
	// prx(update('tbl_course',['banner_path'=>$file_name,'is_banner_added'=>'1'],['id'=>$course_id]));
	if(update('tbl_course',['syllabus_path'=>$file_name,'is_syllabus_added'=>'1'],['id'=>$course_id])){
		return true;


	}else{
		return false;
	}

}
public function getActiveCourses(){

	global $chain;
	$chain = false;
	
	return fetch_records("SELECT * from tbl_course where status='active'");


}


public function getCourseInfoById($course_id) {

    global $chain;
    $chain = true;

    $query = inner_join('tbl_course = id as course_id, user_id | tbl_user = user_id as instructor_id, name as instructor_name', ["tbl_user" => 'tbl_user.user_id = tbl_course.user_id']);

    return fetch_records(where_this($query,['tbl_course.id' => " = '$course_id'"]));

}

}




?>
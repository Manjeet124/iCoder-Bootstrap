<h4>Add Recording</h4>
<hr>

<form action = "<?php echo base_url('admin/recording/add')?>" method = 'POST'>

    <table>

        <tr>

            <td><label for = "course_id">Course:</label></td>

            <td>

                <select id = "course_id" style = "width: 255px; padding-left: 10px;" name = "course_id" onchange="selectCourse(this.value);">
						
                    <option value = "">Select</option>
		
                    <?php foreach($courses as $course) : ?>
                        <option value = "<?php echo $course['id']; ?>">
                        	<?php echo $course['course_name']; ?>
                        </option>
                    <?php endforeach ?>

                </select>

            </td>
            
        </tr>

        <tr>

            <td><label for = 'instructor_id'>Course Instructor: </label></td>

            <td>
                
                <select id = 'instructor_id' name = 'instructor_id' disabled>
                    <option value = "">Select</option>
                </select>

            </td>
            
        </tr>

        <tr>
                        
            <td><label for = "title">Recording Title:</label></td>

            <td><input type = "text" name = "title" id = "title"></td>

        </tr>

        <tr>
                        
            <td><label for = "description">Recording Description:</label></td>

            <td><textarea name = "description" id = "description"></textarea></td>

        </tr>

        <tr>
                        
            <td><label for = "attachment">Attachment:</label></td>

            <td><textarea name = "attachment" id = "attachment"></textarea></td>

        </tr>

        <tr>
                        
            <td><label for = "link">Recording Link:</label></td>

            <td><textarea name = "link" id = "link" rows = "1"></textarea></td>

        </tr>

    </table>

    <br/>

    <input type = 'submit' value = 'Add Recording'/>

</form>

<script type = "text/javascript">

    function selectCourse(course_id) {

        // JavaScript AJAX

        fetch("<?php echo base_url('admin/recording/getInstructorByAjax/'); ?>" + course_id)
            .then(function(response) {
                return response.text();
            }).then(function(data){
                document.getElementById('instructor_id').innerHTML = data;
            }).catch(function(error){
                console.log(error);
            });

    }

</script>
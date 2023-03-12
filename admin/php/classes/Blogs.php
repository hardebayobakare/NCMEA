<?php
//Start Session
session_start();

//Blogs Class
class Blogs{

    private $con;

    function __construct(){
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //Get All Blog Categories DB Query
    public function getBlogCategories(){
        $result = $this->con->query("SELECT * FROM blog_cats");
        $blog_cats = array();
        while($item = $result->fetch_assoc())
            $blog_cats[] = $item;
        if(!empty($blog_cats != 0)){
            return $blog_cats; 
        }else{
            return NULL;
        }
    }

    //Get All Blogs DB Query
    public function getBlogs(){
        $result = $this->con->query("SELECT `Blog_ID`, blog_cats.Blog_Cat_ID as Blog_Cat_ID, `Blog_Title`, `Blog_Cat_Name` as Category, `Blog_Content`, `Paragraph_2`, `Paragraph_3`, `Special_Quote`, `Blog_Image_S`, `Blog_Image_B`, `Date`, `Time`, `Author` FROM blogs, blog_cats
        WHERE blogs.Blog_Cat_ID = blog_cats.Blog_Cat_ID");
        $blog = array();
        while($item = $result->fetch_assoc())
            $blog[] = $item;
        if(!empty($blog != 0)){
            return $blog; 
        }else{
            return NULL;
        }
    }

    //Add Blog Category DB Query
    public function createNewBlogCategory($name){
        $q = $this->con->query("INSERT INTO `blog_cats`(`Blog_Cat_Name`) VALUES ('$name')");
        if ($q) {
            return ['status'=> 200, 'message'=> 'Blog Category Created Successfully..!'];
        }else{
            return ['status'=> 303, 'message'=> 'Failed to run query'];
        }
    }

    //Add Blog DB Query
    public function addBlog($title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $file1, $file2){
        $fileName1 = $file1['name'];
		$fileNameAr1= explode(".", $fileName1);
		$extension1 = end($fileNameAr1);
		$ext1 = strtolower($extension1);
        $fileName2 = $file2['name'];
		$fileNameAr2= explode(".", $fileName2);
		$extension2 = end($fileNameAr2);
		$ext2 = strtolower($extension2);
        if ($ext1 == "jpg" || $ext1 == "jpeg" || $ext1 == "png"){
            if($ext2 == "jpg" || $ext2 == "jpeg" || $ext2 == "png"){
                if (($file1['size']) <= (3145728)){
                    if(($file2['size']) <= (2097152)){
                        $uniqueImageName1 = time()."_".$file1['name'];
                        $uniqueImageName2 = time()."1_".$file2['name'];
                        $datetime = $date ." ". $time;
                        // return ['status'=> 303, 'message'=> $category_id];
                        if (move_uploaded_file($file1['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/blogs/".$uniqueImageName1)) {
                            if (move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/blogs/".$uniqueImageName2)) {
                                $q = $this->con->query("INSERT INTO `blogs`(`Blog_Title`, `Date`, `Time`, `Author`, `Blog_Cat_ID`, `Blog_Content`, `Paragraph_2`, `Paragraph_3`, `Special_Quote`, `Blog_Image_B`, `Blog_Image_S`) VALUES ('$title', '$date', '$datetime', '$author', '$category_id', '$content', '$para_2', '$para_3', '$quote', '$uniqueImageName1', '$uniqueImageName2')");
                                if ($q) {
                                    $q = $this->con->query("UPDATE `blog_cats` SET `Number` = `Number` + 1 WHERE `BLog_Cat_ID` = '$category_id'");
                                    return ['status'=> 200, 'message'=> 'Blog Created Successfully..!'];
                                }else{
                                    return ['status'=> 303, 'message'=> 'Failed to run query'];
                                }
                            }else{
                                return ['status'=> 303, 'message'=> 'Failed to upload Preview Image'];
                            }
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to upload Content Image'];
                        }
                    }else{
                        return ['status'=> 303, 'message'=> 'Large Preview Image ,Max Size allowed 2MB '];
                    }
                }else{
                    return ['status'=> 303, 'message'=> 'Large Content Image ,Max Size allowed 3MB '];
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Preview Image Format [Valid Formats : jpg, jpeg, png]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Content Image Format [Valid Formats : jpg, jpeg, png]'];
        }
    }

    //Edit Blog Category DB Query
    public function editBlogCategory($id, $name){
        if($id != null){
            $q = $this->con->query("UPDATE `blog_cats` SET 
                        `Blog_Cat_Name` = '$name'
                        WHERE `Blog_Cat_ID` = '$id'");
                        
            if ($q) {
                return ['status'=> 200, 'message'=> 'Blog Category Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Blog Category ID'];
        }
    }

    //Edit Blog Without Image
    public function editBlogWithoutImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote){
        if($id != null){
            $datetime = $date ." ". $time;
            $q = $this->con->query("UPDATE `blogs` SET 
                        `Blog_Title` = '$title',
                        `Date` = '$date',
                        `Time` = '$datetime',
                        `Author` = '$author',
                        `Blog_Cat_ID` = '$category_id',
                        `Blog_Content` = '$content',
                        `Paragraph_2`= '$para_2',
                        `Paragraph_3` = '$para_3',
                        `Special_Quote` = '$quote'
                        WHERE `Blog_ID` = '$id'");
                        
            if ($q) {
                return ['status'=> 200, 'message'=> 'Blog Updated Successfully..!'];
            }else{
                return ['status'=> 303, 'message'=> 'Failed to run query'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Blog Category ID'];
        }
    }

    //Edit Blog With Small Image
    public function editBlogWithSmallImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        $datetime = $date ." ". $time;
        if($id != null){
            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                if (($file['size']) > (2097152)) {
                    return ['status'=> 303, 'message'=> 'Large Preview Image ,Max Size allowed 2MB '];
                }else{
                    $uniqueImageName = time()."_".$file['name'];
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/blogs/".$uniqueImageName)) {
                        $q = $this->con->query("UPDATE `blogs` SET 
                        `Blog_Title` = '$title',
                        `Date` = '$date',
                        `Time` = '$datetime',
                        `Author` = '$author',
                        `Blog_Cat_ID` = '$category_id',
                        `Blog_Content` = '$content',
                        `Paragraph_2`= '$para_2',
                        `Paragraph_3` = '$para_3',
                        `Special_Quote` = '$quote',
                        `Blog_Image_S` = '$uniqueImageName'
                        WHERE `Blog_ID` = '$id'");
                        
                        if ($q) {
                            return ['status'=> 200, 'message'=> 'Blog Updated Successfully..!'];
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to run query'];
                        }
    
                    }else{
                        return ['status'=> 303, 'message'=> 'Failed to upload preview image'];
                    }
                    
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Preview Image Format [Valid Formats : jpg, jpeg, png]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
    }

    //Edit Blog With Big Image
    public function editBlogWithBigImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $file){
        $fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);
        $datetime = $date ." ". $time;
        if($id != null){
            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                if (($file['size']) > (3145728)) {
                    return ['status'=> 303, 'message'=> 'Large Content Image ,Max Size allowed 2MB '];
                }else{
                    $uniqueImageName = time()."_".$file['name'];
                    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/blogs/".$uniqueImageName)) {
                        $q = $this->con->query("UPDATE `blogs` SET 
                        `Blog_Title` = '$title',
                        `Date` = '$date',
                        `Time` = '$datetime',
                        `Author` = '$author',
                        `Blog_Cat_ID` = '$category_id',
                        `Blog_Content` = '$content',
                        `Paragraph_2`= '$para_2',
                        `Paragraph_3` = '$para_3',
                        `Special_Quote` = '$quote',
                        `Blog_Image_B` = '$uniqueImageName'
                        WHERE `Blog_ID` = '$id'");
                        
                        if ($q) {
                            return ['status'=> 200, 'message'=> 'Blog Updated Successfully..!'];
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to run query'];
                        }
    
                    }else{
                        return ['status'=> 303, 'message'=> 'Failed to upload content image'];
                    }
                    
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Content Image Format [Valid Formats : jpg, jpeg, png]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Event ID'];
        }
    }

    //Edit Blog With Big and Small Image
    public function editBlogWithBigAndSmallImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $file1, $file2){
        $fileName1 = $file1['name'];
		$fileNameAr1= explode(".", $fileName1);
		$extension1 = end($fileNameAr1);
		$ext1 = strtolower($extension1);
        $fileName2 = $file2['name'];
		$fileNameAr2= explode(".", $fileName2);
		$extension2 = end($fileNameAr2);
		$ext2 = strtolower($extension2);
        if ($ext1 == "jpg" || $ext1 == "jpeg" || $ext1 == "png"){
            if($ext2 == "jpg" || $ext2 == "jpeg" || $ext2 == "png"){
                if (($file1['size']) <= (3145728)){
                    if(($file2['size']) <= (2097152)){
                        $uniqueImageName1 = time()."_".$file1['name'];
                        $uniqueImageName2 = time()."1_".$file2['name'];
                        $datetime = $date ." ". $time;
                        if (move_uploaded_file($file1['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/blogs/".$uniqueImageName1)) {
                            if (move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ncmea/admin/assets/img/blogs/".$uniqueImageName2)) {
                                $q = $this->con->query("UPDATE `blogs` SET 
                                    `Blog_Title` = '$title',
                                    `Date` = '$date',
                                    `Time` = '$datetime',
                                    `Author` = '$author',
                                    `Blog_Cat_ID` = '$category_id',
                                    `Blog_Content` = '$content',
                                    `Paragraph_2`= '$para_2',
                                    `Paragraph_3` = '$para_3',
                                    `Special_Quote` = '$quote',
                                    `Blog_Image_B` = '$uniqueImageName1',
                                    `Blog_Image_S` = '$uniqueImageName2'
                                    WHERE `Blog_ID` = '$id'");
                                if ($q) {
                                    return ['status'=> 200, 'message'=> 'Blog Updated Successfully..!'];
                                }else{
                                    return ['status'=> 303, 'message'=> 'Failed to run query'];
                                }
                            }else{
                                return ['status'=> 303, 'message'=> 'Failed to upload Preview Image'];
                            }
                        }else{
                            return ['status'=> 303, 'message'=> 'Failed to upload Content Image'];
                        }
                    }else{
                        return ['status'=> 303, 'message'=> 'Large Preview Image ,Max Size allowed 2MB'];
                    }
                }else{
                    return ['status'=> 303, 'message'=> 'Large Content Image ,Max Size allowed 3MB '];
                }
            }else{
                return ['status'=> 303, 'message'=> 'Invalid Preview Image Format [Valid Formats : jpg, jpeg, png]'];
            }
        }else{
            return ['status'=> 303, 'message'=> 'Invalid Content Image Format [Valid Formats : jpg, jpeg, png]'];
        }
    }
    //Delete Blog Category DB Query
    public function deleteBlogCategory($id = null){
        if ($id != null) {
            $q = $this->con->query("DELETE FROM blog_cats WHERE `Blog_Cat_ID` = '$id'");
            if ($q) {
                return ['status'=> 200, 'message'=> 'Event Successfully removed'];
            }else{
                return ['status'=> 303, 'message'=> 'Category is currently used in a Blog'];
            }
            
        }else{
            return ['status'=> 303, 'message'=>'Invalid event id'];
        }
    }

}

//Get All Blog Categories
if (isset($_GET['GET_BLOGCAT'])) {
    $b = new Blogs();
    $json_data['data'] = $b->getBlogCategories();
    echo json_encode($json_data);
    exit();
}

//Get All Blogs
if (isset($_GET['GET_BLOG'])) {
    $b = new Blogs();
    $json_data['data'] = $b->getBlogs();
    echo json_encode($json_data);
    exit();
}

//Add Blog
if (isset($_POST['add_blog'])){
    $b = new Blogs();
    extract($_POST);
    if(empty($title)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Title']);
        exit();
    }if(empty($date)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Date']);
        exit();    
    }
    if(empty($time)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Time']);
        exit();  
    }
    if(empty($author)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Author']);
        exit();  
    }
    if(empty($category_id)){
        echo json_encode(['status'=> 303, 'message'=> 'Select a Category']);
        exit();  
    }
    if(empty($content)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Content']);
        exit();  
    }else if (empty($_FILES['blog_s_image']['name']) && !empty($_FILES['blog_s_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Blog Preview Image']);
        exit();
    }
    else if (empty($_FILES['blog_b_image']['name']) && !empty($_FILES['blog_b_image']['name'])){
        echo json_encode(['status'=> 303, 'message'=> 'Add Blog Content Image']);
        exit();
    }else{
        $result = $b->addBlog($title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $_FILES['blog_b_image'], $_FILES['blog_s_image']);
        echo json_encode($result);
        exit();
    }
}

//Add Blog Category
if (isset($_POST['add_blogcat'])){
    $b = new Blogs();
    extract($_POST);
    if(empty($name)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Category Name']);
        exit();
    }else{
        $result = $b->createNewBlogCategory($name);
        echo json_encode($result);
        exit();
    }
}

//Edit Blog Category
if (isset($_POST['edit_blogcat'])){
    $b = new Blogs();
    extract($_POST);
    if(empty($name)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Category Name']);
        exit();
    }else{
        $result = $b->editBlogCategory($id, $name);
        echo json_encode($result);
        exit();
    }

}

//Edit Blog
if (isset($_POST['edit_blog'])){
    $b = new Blogs();
    extract($_POST);
    if(empty($title)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Title']);
        exit();
    }if(empty($date)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Date']);
        exit();    
    }
    if(empty($time)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Time']);
        exit();  
    }
    if(empty($author)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Author']);
        exit();  
    }
    if(empty($category_id)){
        echo json_encode(['status'=> 303, 'message'=> 'Select a Category']);
        exit();  
    }
    if(empty($content)){
        echo json_encode(['status'=> 303, 'message'=> 'Enter Blog Content']);
        exit();  
    }else{
        if(isset($_FILES['blog_s_image']['name']) && !empty($_FILES['blog_s_image']['name'])){
            $result = $b->editBlogWithSmallImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $_FILES['blog_s_image']);
        }else if(isset($_FILES['blog_b_image']['name']) && !empty($_FILES['blog_b_image']['name'])){
            $result = $b->editBlogWithBigImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $_FILES['blog_b_image']);
        }else if(isset($_FILES['blog_b_image']['name']) && !empty($_FILES['blog_b_image']['name']) && isset($_FILES['blog_s_image']['name']) && !empty($_FILES['blog_s_image']['name'])){
            $result = $b->editBlogWithBigAndSmallImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote, $_FILES['blog_b_image'], $_FILES['blog_s_image']);
        }else{
            $result = $b->editBlogWithoutImage($id, $title, $date, $time, $author, $category_id, $content, $para_2, $para_3, $quote);
        }
        echo json_encode($result);
        exit();
    }

}


//Delete Blog Category
if (isset($_POST['DELETE_BLOGCAT'])) {
	$b = new Blogs();
    extract($_POST);
    if(!empty($_POST['bid'])){
        $bid = $_POST['bid'];
        $result = $b->deleteBlogCategory($bid);
        echo json_encode($result);
        exit();
    }else{
        echo json_encode(['status'=> 303, 'message'=> 'Invalid Blog Category id']);
        exit();
    }
}

?>
<?php
/*

Giả sử có một danh sách học sinh và điểm số của họ, cùng với thông tin chi tiết về lớp học.
Chúng ta sẽ lưu trữ thông tin này trong một mảng đa chiều và cách truy cập các thông tin cụ thể như nào. 

Xem  tổng học sinh của các lớp trong mảng là bao nhiêu?
Thêm học sinh vào 1 lớp 
Xóa học sinh ở đầu
Tạo ra một mảng nữa về 1 lớp khác rồi gộp nó vào
TÍnh điểm trung bình của các học sinh

*/

/*
1. count(): đếm số phần tử trong mảng
2. array_push(): thêm phần vào cuối mảng
3. array_pop(): xóa một phần tử cuối cùng của mảng
4. array_shift(): xóa một phần tử ở đầu mảng
5. array_unshift(): thêm một phần tử vào đầu mảng
6. array_merge(): gộp 2 hoặc nhiều mảng lại với nhau 
7. array_keyS(): trả về tất cả các khóa trong mảng
8. array_values(): trả về tất cả giá trị trong mảng
*/

// Variable declaration class1
$class1 = array(
    array('name' => 'ThuanPC', 'score' => 9.5),
    array('name' => 'Gabriella', 'score' => 9),
    array('name' => 'MyWifeFuture', 'score' => 10),
    array('name' => 'Bruh;-;', 'score' => 3),
);

// =========================================================================================|
// |                            Show total of students in class                             |
// =========================================================================================|
/* |*/$sumStudentsInClass = count($class1);                                               //|                                                                          
/* |*/echo "<br><br> The sum students are " . $sumStudentsInClass . " in class. <br><br>";//|
// =========================================================================================|




// =============================================================|
// |    Add a student into class using array_push() funtion     |
// =============================================================|
/* |*/echo "Before pushing a new student into class:<br>";  //  |
/* |*/print_r($class1);                                     //  |
/* |*/echo "<br>";                                          //  |
/* |*/                                                      //  |
/* |*/$newMember = array('name' => 'Taylor Ho', 'score' => 7);//|
/* |*/                                                      //  |
/* |*/array_push($class1, $newMember);                      //  |
/* |*/                                                      //  |
/* |*/echo "<br>";                                          //  |
/* |*/echo "After pushing a new student into class: <br>";  //  |
/* |*/print_r($class1);                                     //  |
/* |*/// =======================================================|


// ========================================================================|
// |                   Delete the first student in the class               |
// ========================================================================|
/* |*/echo "<br><br>Before deleting the first student in the class:<br>";//|
/* |*/print_r($class1);                                                 // |
/* |*/echo "<br>";                                                      // |
/* |*/                                                                  // |
/* |*/array_shift($class1);                                             // |
/* |*/                                                                  // |
/* |*/echo "<br>";                                                      // |
/* |*/echo "After deleting the first student in the class:<br>";        // |
/* |*/print_r($class1);                                                 // |
/* |*/// ==================================================================|



// ==============================================================|
// |                       Merge 2 array                         |
// ==============================================================|                                                  
/* | Variable declaration class2 */                            //|
/* |*/$class2 = array(                                         //|
/* |*/    array('name' => 'Zal', 'score' => 4.5),              //|
/* |*/    array('name' => 'Gabriella Rodriguez', 'score' => 3),//|
/* |*/    array('name' => 'Tayla Wager', 'score' => 7),        //|
/* |*/    array('name' => 'Lauren', 'score' => 1),             //|
/* |*/);                                                       //|
/* |*/                                                         //|
/* |*/$resultAfterMerger = array_merge($class1, $class2);      //|
/* |*/                                                         //|
/* |*/echo "<br><br>";                                         //|
/* |*/print_r($resultAfterMerger);                             //|
/* |*/// ========================================================|



// =======================================================================================================|
// |                                     Caculate student average                                         |
// =======================================================================================================|
/* |  Variable declaration class3*/                                                                     //|
/* |*/$class3 = array(                                                                                  //|
/* |*/    array('name' => 'ThuanPC', 'scoreMath' => 7, 'scoreSQL' => 9.5, 'scoreDesignWeb' => 9),       //|
/* |*/    array('name' => 'MyFutureWife', 'scoreMath' => 10, 'scoreSQL' => 9.5, 'scoreDesignWeb' => 3), //|
/* |*/);                                                                                                //|
/* |*/                                                                                                  //|
/* |  Funtion to caculate student average score*/                                                       //|
/* |*/function averageStudentScore($math, $SQL, $designWeb){                                            //|
/* |*/    return ($math+$SQL+$designWeb)/3;                                                             //|
/* |*/}                                                                                                 //|
/* |*/                                                                                                  //|
/* | Variable declaration result average*/                                                              //|
/* |*/$averageOfThuanPC =  averageStudentScore(                                                         //|
/* |*/$class3[0]['scoreMath'],                                                                          //|
/* |*/$class3[0]['scoreSQL'],                                                                           //|
/* |*/$class3[0]['scoreDesignWeb']                                                                      //|
/* |*/);                                                                                                //|
/* |*/                                                                                                  //|
/* |*/$averageOfThuanPCsFutureWife =  averageStudentScore(                                              //|
/* |*/$class3[1]['scoreMath'],                                                                          //|
/* |*/$class3[1]['scoreSQL'],                                                                           //|
/* |*/$class3[1]['scoreDesignWeb']                                                                      //|
/* |*/);                                                                                                //|
/* | Print the results: */                                                                              //|
/* |*/                                                                                                  //|
/* |*/echo "<br><br>Result ThuanPC's average score is: " . $averageOfThuanPC;                           //|
/* |*/echo "<br><br>Result ThuanPC's future wife's average score is: " . $averageOfThuanPCsFutureWife;  //|
// =======================================================================================================|




<?php
 
class DB_Functions {
 
    private $conn;
 
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new DB_Connect();
        $this->conn = $db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($ip_number, $user_name, $user_age, $user_sex, $user_occupation, $phone_number) {
        $stmt = $this->conn->prepare("INSERT INTO tbuser(ip_number, user_name, user_age, user_sex, user_occupation, phone_number, created_at) VALUES(?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssisss", $ip_number, $user_name, $user_age, $user_sex, $user_occupation, $phone_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbuser WHERE ip_number = ?");
            $stmt->bind_param("s", $ip_number);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $user;
        } else {
            return false;
        }
    }
 
    /**
     * Get user by email and password
     */
    public function getUserByIpAndPhone($ip_number, $phone_number) {
 
        $stmt = $this->conn->prepare("SELECT * FROM tbuser WHERE ip_number = ? AND phone_number = ?");
 
        $stmt->bind_param("ss", $ip_number, $phone_number);
 
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }
 
    /**
     * Check user is existed or not
     */
    public function isUserExisted($ip_number) {
        $stmt = $this->conn->prepare("SELECT ip_number from tbuser WHERE ip_number = ?");
 
        $stmt->bind_param("s", $ip_number);
 
        $stmt->execute();
 
        $stmt->store_result();
 
        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    public function storeDrink($drink_id, $ip_number, $drink_name, $drink_qty, $food_sugar, $sysdatetime, $user_datetime) {
        $stmt = $this->conn->prepare("INSERT INTO tbdrink(drink_id, ip_number, drink_name, drink_qty, food_sugar, sysdatetime, user_datetime) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiiss", $drink_id, $ip_number, $drink_name, $drink_qty, $food_sugar, $sysdatetime, $user_datetime);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbdrink WHERE drink_id = ?");
            $stmt->bind_param("i", $drink_id);
            $stmt->execute();
            $drink = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $drink;
        } else {
            return false;
        }
    }

    public function updateDrink($drink_id, $ip_number, $drink_name, $drink_qty, $food_sugar, $sysdatetime, $user_datetime) {
        $stmt = $this->conn->prepare("UPDATE tbdrink SET drink_name=?, drink_qty=?, food_sugar=?, sysdatetime=?, user_datetime=? WHERE drink_id = ? AND ip_number = ?");
        $stmt->bind_param("siissis", $drink_name, $drink_qty, $food_sugar, $sysdatetime, $user_datetime, $drink_id, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbdrink WHERE drink_id = ?");
            $stmt->bind_param("i", $drink_id);
            $stmt->execute();
            $drink = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $drink;
        } else {
            return false;
        }
    }

    public function deleteDrink($drink_id, $ip_number){
        $stmt = $this->conn->prepare("DELETE FROM tbdrink WHERE drink_id = ? AND ip_number = ?");
        $stmt->bind_param("is", $drink_id, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            /*$stmt = $this->conn->prepare("SELECT * FROM tbdrink WHERE drink_id = ?");
            $stmt->bind_param("i", $drink_id);
            $stmt->execute();
            $drink = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $drink;*/
            return true;
        } else {
            return false;
        }
    }

    public function isDrinkExisted($drink_id, $ip_number) {
        $stmt = $this->conn->prepare("SELECT ip_number from tbdrink WHERE drink_id = ? AND ip_number = ?");
 
        $stmt->bind_param("ss", $drink_id, $ip_number);
 
        $stmt->execute();
 
        $stmt->store_result();
 
        if ($stmt->num_rows > 0) {
            // drink existed and therefore update the table 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    //food

    public function isFoodExisted($food_id, $ip_number) {
        $stmt = $this->conn->prepare("SELECT ip_number from tbfood WHERE food_id = ? AND ip_number = ?");
 
        $stmt->bind_param("ss", $food_id, $ip_number);
 
        $stmt->execute();
 
        $stmt->store_result();
 
        if ($stmt->num_rows > 0) {
            // food existed and therefore update the table 
            $stmt->close();
            return true;
        } else {
            // food not existed
            $stmt->close();
            return false;
        }
    }

    public function updateFood($food_id, $ip_number, $food_name, $food_cat, $food_qty, $sysdatetime, $user_datetime) {
        $stmt = $this->conn->prepare("UPDATE tbfood SET food_name=?, food_cat=?, food_qty=?, sysdatetime=?, user_datetime=? WHERE food_id = ? AND ip_number = ?");
        $stmt->bind_param("ssissis", $food_name, $food_cat, $food_qty, $sysdatetime, $user_datetime, $food_id, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbfood WHERE food_id = ?");
            $stmt->bind_param("i", $food_id);
            $stmt->execute();
            $food = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $food;
        } else {
            return false;
        }
    }

    public function storeFood($food_id, $ip_number, $food_name, $food_cat, $food_qty, $sysdatetime, $user_datetime) {
        $stmt = $this->conn->prepare("INSERT INTO tbfood(food_id, ip_number, food_name, food_cat, food_qty, sysdatetime, user_datetime) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssiss", $food_id, $ip_number, $food_name, $food_cat, $food_qty, $sysdatetime, $user_datetime);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbfood WHERE food_id = ?");
            $stmt->bind_param("i", $food_id);
            $stmt->execute();
            $food = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $food;
        } else {
            return false;
        }
    }

    public function deleteFood($food_id, $ip_number){
        $stmt = $this->conn->prepare("DELETE FROM tbfood WHERE food_id = ? AND ip_number = ?");
        $stmt->bind_param("is", $food_id, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            /*$stmt = $this->conn->prepare("SELECT * FROM tbdrink WHERE drink_id = ?");
            $stmt->bind_param("i", $drink_id);
            $stmt->execute();
            $drink = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $drink;*/
            return true;
        } else {
            return false;
        }
    }

    //glucose

    public function isGlucoseExisted($glucose_id, $ip_number) {
        $stmt = $this->conn->prepare("SELECT ip_number from tbglucose WHERE glucose_id = ? AND ip_number = ?");
 
        $stmt->bind_param("ss", $glucose_id, $ip_number);
 
        $stmt->execute();
 
        $stmt->store_result();
 
        if ($stmt->num_rows > 0) {
            // glucose existed and therefore update the table 
            $stmt->close();
            return true;
        } else {
            // glucose not existed
            $stmt->close();
            return false;
        }
    }

    public function updateGlucose($glucose_id, $ip_number, $glucose_reading, $sysdatetime) {
        $stmt = $this->conn->prepare("UPDATE tbglucose SET glucose_reading=?, sysdatetime=? WHERE glucose_id = ? AND ip_number = ?");
        $stmt->bind_param("isis", $glucose_reading, $sysdatetime, $glucose_id, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbglucose WHERE glucose_id = ?");
            $stmt->bind_param("i", $glucose_id);
            $stmt->execute();
            $glucose = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $glucose;
        } else {
            return false;
        }
    }

    public function storeGlucose($glucose_id, $ip_number, $glucose_reading, $sysdatetime) {
        $stmt = $this->conn->prepare("INSERT INTO tbglucose(glucose_id, ip_number, glucose_reading, sysdatetime) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("isis", $glucose_id, $ip_number, $glucose_reading, $sysdatetime);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbglucose WHERE glucose_id = ?");
            $stmt->bind_param("i", $glucose_id);
            $stmt->execute();
            $glucose = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $glucose;
        } else {
            return false;
        }
    }

    public function deleteGlucose($glucose_id, $ip_number){
        $stmt = $this->conn->prepare("DELETE FROM tbglucose WHERE glucose_id = ? AND ip_number = ?");
        $stmt->bind_param("is", $glucose_id, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getFood(){
        $stmt = "SELECT item_name, category, calories from tbfooddrink where category!='drink'";
        $result = mysqli_query($this->conn, $stmt);
        $food = array();
        while($row = mysqli_fetch_assoc($result)){
            $item_name = $row['item_name'];
            $category = $row['category'];
            $calories = $row['calories'];
            $food_item = array("item_name"=>$item_name, "category"=>$category, "calories"=>$calories);
            $food[] = array_merge($food_item);
        }
        return $food;
    }

    public function getDrink(){
        $stmt = "SELECT item_name, category, calories from tbfooddrink where category='Drink'";
        $result = mysqli_query($this->conn, $stmt);
        $drink = array();
        while($row = mysqli_fetch_assoc($result)){
            $item_name = $row['item_name'];
            $category = $row['category'];
            $calories = $row['calories'];
            $drink_item = array("item_name"=>$item_name, "category"=>$category, "calories"=>$calories);
            $drink[] = array_merge($drink_item);
        }
        return $drink;
    }

    public function getUserDetails($ip_number){
        $stmt = $this->conn->prepare("SELECT user_sex, date_of_birth, weight_in_kg, height_in_cm FROM tbuser WHERE ip_number = ?");
        $stmt->bind_param("s", $ip_number);
        if($stmt->execute()){
            $user_details = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user_details;
        }else{
            return NULL;
        }
    }

    public function updateUserDetails($ip_number, $user_dob, $gender, $height, $weight){
        //$weight_in_pounds = round(($weight / 0.45359237),5);
        //$height_in_inches =  round(($height * 0.39370),5);
        $stmt = $this->conn->prepare("UPDATE tbuser SET user_sex=?, date_of_birth=?, weight_in_kg=?, height_in_cm=? WHERE ip_number = ?");
        $stmt->bind_param("ssdds", $gender, $user_dob, $weight, $height, $ip_number);
        $result = $stmt->execute();
        $stmt->close();
 
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbuser WHERE ip_number = ?");
            $stmt->bind_param("s", $ip_number);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $user;
        } else {
            return false;
        }
    }

    public function countDrinkCalorie($ip_number, $startDate, $endDate){
        $stmt = $this->conn->prepare("SELECT drink_name, drink_qty, food_sugar FROM tbdrink WHERE ip_number = ? AND user_datetime >= ? AND user_datetime < ?");
        $stmt->bind_param("sss", $ip_number, $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();
        $drink_calorie = 0;
        $drink_proteins = 0;
        $drink_fats = 0;
        $drink_carbohydrates = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
            {   
                $drink_item = $row["drink_name"];
                $drink_qty = $row["drink_qty"];
                $food_sugar = $row["food_sugar"];
                $stmt1 = $this->conn->prepare("SELECT calories, proteins, carbohydrates, fats FROM tbfooddrink WHERE item_name = ?");
                $stmt1->bind_param("s", $drink_item);
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                $stmt1->free_result();
                $stmt1->close();
                $calorie = 0;
                if ($result->num_rows > 0) {
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    $calorie = ($drink_qty * $row1["calories"]) + ($drink_qty * $food_sugar *  48); //48 is calorie for sugar
                    $drink_proteins = $drink_proteins + ($drink_qty * $row1["proteins"]);
                    $drink_carbohydrates = $drink_carbohydrates + ($drink_qty * $row1["carbohydrates"]) + ($drink_qty * $food_sugar *  15); 
                    $drink_fats = $drink_fats + ($drink_qty * $row1["fats"]);
                    $drink_calorie = $drink_calorie + $calorie;
                }
            }
            $drink_info =  array("Drink Calorie"=>$drink_calorie, "Drink Proteins"=>$drink_proteins, "Drink Carb"=>$drink_carbohydrates, "Drink Fats"=>$drink_fats);
            return $drink_info;
        }else{
            return 0;
        }
    }

    public function countFoodCalorie($ip_number, $startDate, $endDate){
        $stmt = $this->conn->prepare("SELECT food_name, food_qty FROM tbfood WHERE ip_number = ? AND user_datetime >= ? AND user_datetime < ?");
        $stmt->bind_param("sss", $ip_number, $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();
        $food_calorie = 0;
        $food_proteins = 0;
        $food_fats = 0;
        $food_carbohydrates = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
            {   
                $food_item = $row["food_name"];
                $food_qty = $row["food_qty"];
                $stmt1 = $this->conn->prepare("SELECT calories, proteins, carbohydrates, fats FROM tbfooddrink WHERE item_name = ?");
                $stmt1->bind_param("s", $food_item);
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                $stmt1->free_result();
                $stmt1->close();
                $calorie = 0;
                if ($result->num_rows > 0) {
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    $calorie = $food_qty * $row1["calories"];
                    $food_proteins = $food_proteins + ($food_qty * $row1["proteins"]);
                    $food_carbohydrates = $food_carbohydrates +  ($food_qty * $row1["carbohydrates"]);
                    $food_fats = $food_fats +  ($food_qty * $row1["fats"]);
                    $food_calorie = $food_calorie + $calorie;
                }
            }
            $food_info =  array("Food Calorie"=>$food_calorie, "Food Proteins"=>$food_proteins, "Food Carb"=>$food_carbohydrates, "Food Fats"=>$food_fats);;
            return $food_info;
        }else{
            return 0;
        }
    }

    //this is currently extracting the food ate on a particular day
    public function getCalorie($ip_number, $currDate){
        $startDate = $currDate." 00:00:00";
        $next_date = date('Y-m-d', strtotime($currDate .' +1 day'));
        $endDate = $next_date." 00:00:00";
        $FoodCalorieInfo = $this->countFoodCalorie($ip_number, $startDate, $endDate);
        $DrinkCalorieInfo = $this->countDrinkCalorie($ip_number, $startDate, $endDate);
        $Calorie = $DrinkCalorieInfo['Drink Calorie'] + $FoodCalorieInfo['Food Calorie'];
        $Proteins  = $DrinkCalorieInfo['Drink Proteins'] + $FoodCalorieInfo['Food Proteins'];
        $Carb = $DrinkCalorieInfo['Drink Carb'] + $FoodCalorieInfo['Food Carb'];
        $Fats = $DrinkCalorieInfo['Drink Fats'] + $FoodCalorieInfo['Food Fats'];
        return array("TotalCalorie"=>$Calorie, "Proteins"=>$Proteins, "Carb"=>$Carb, "Fats"=>$Fats);
    }

    public function addSuggestion($ip_number, $itemName, $category){
        $status = 0;
        $stmt = $this->conn->prepare("INSERT INTO tbsuggestion(user_name, item_name, category, dop, status) VALUES(?, ?, ?, NOW(), ?)");
        $stmt->bind_param("sssi", $ip_number, $itemName, $category, $status);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // public function countDrinkCalorie($ip_number, $startDate, $endDate){
    //     $stmt = $this->conn->prepare("SELECT drink_name, drink_qty, food_sugar FROM tbdrink WHERE ip_number = ? AND user_datetime >= ? AND user_datetime < ?");
    //     $stmt->bind_param("sss", $ip_number, $startDate, $endDate);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $stmt->free_result();
    //     $stmt->close();
    //     $drink_calorie = 0;
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    //         {   
    //             $drink_item = $row["drink_name"];
    //             $drink_qty = $row["drink_qty"];
    //             $food_sugar = $row["food_sugar"];
    //             $stmt1 = $this->conn->prepare("SELECT calories FROM tbfooddrink WHERE item_name = ?");
    //             $stmt1->bind_param("s", $drink_item);
    //             $stmt1->execute();
    //             $result1 = $stmt1->get_result();
    //             $stmt1->free_result();
    //             $stmt1->close();
    //             $calorie = 0;
    //             if ($result->num_rows > 0) {
    //                 $row1 = $result1->fetch_array(MYSQLI_ASSOC);
    //                 $calorie = ($drink_qty * $row1["calories"]) + ($drink_qty * $food_sugar *  48); //48 is calorie for sugar
    //                 $drink_calorie = $drink_calorie + $calorie;
    //             }
    //         }
    //         return $drink_calorie;
    //     }else{
    //         return 0;
    //     }
    // }

    // public function countFoodCalorie($ip_number, $startDate, $endDate){
    //     $stmt = $this->conn->prepare("SELECT food_name, food_qty FROM tbfood WHERE ip_number = ? AND user_datetime >= ? AND user_datetime < ?");
    //     $stmt->bind_param("sss", $ip_number, $startDate, $endDate);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $stmt->free_result();
    //     $stmt->close();
    //     $food_calorie = 0;
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    //         {   
    //             $food_item = $row["food_name"];
    //             $food_qty = $row["food_qty"];
    //             $stmt1 = $this->conn->prepare("SELECT calories FROM tbfooddrink WHERE item_name = ?");
    //             $stmt1->bind_param("s", $food_item);
    //             $stmt1->execute();
    //             $result1 = $stmt1->get_result();
    //             $stmt1->free_result();
    //             $stmt1->close();
    //             $calorie = 0;
    //             if ($result->num_rows > 0) {
    //                 $row1 = $result1->fetch_array(MYSQLI_ASSOC);
    //                 $calorie = $food_qty * $row1["calories"];
    //                 $food_calorie = $food_calorie + $calorie;
    //             }
    //         }
    //         return $food_calorie;
    //     }else{
    //         return 0;
    //     }
    // }

    

    // //this is currently extracting the food ate on a particular day
    // public function getCalProCarbFat($ip_number, $currDate){
    //     $startDate = $currDate." 00:00:00";
    //     $next_date = date('Y-m-d', strtotime($currDate .' +1 day'));
    //     $endDate = $next_date." 00:00:00";
    //     $FoodCaloriecount = (int)$this->countFoodCalorie($ip_number, $startDate, $endDate);
    //     $DrinkCaloriecount = (int)$this->countDrinkCalorie($ip_number, $startDate, $endDate);
    //     $totalCalorie = $FoodCaloriecount + $DrinkCaloriecount;
    //     return array("TotalCalorie"=>$totalCalorie);
    // }
}
?>
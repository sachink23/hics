<?php
    if(
        isset($_POST["hosp_name"]) &&
        isset($_POST["hosp_type"]) &&
        isset($_POST["other_type"]) &&
        isset($_POST["subdist"]) &&
        isset($_POST["address"]) &&
        isset($_POST["mobile"]) &&
        isset($_POST["doc_name"])
    ) {
        $hosp_name = trim($_POST["hosp_name"]);
        $hosp_type = trim($_POST["hosp_type"]);
        $other_type = trim($_POST["other_type"]);
        $subdist = trim($_POST["subdist"]);
        $address = trim($_POST["address"]);
        $mobile = filter_var($_POST["mobile"], FILTER_VALIDATE_INT);
        $doc_name = trim($_POST["doc_name"]);

        if(strlen($hosp_name) < 5 || strlen($hosp_name) > 256) {
            ret400();
        }

        if(!($hosp_type == "ayurvedic" || $hosp_type == "allopathy" || $hosp_type == "homoeopathy" || $hosp_type == "unani" || $hosp_type == "other")) {
            ret400();
        }
        if($hosp_type == "other") {
            if(strlen($other_type) < 3 || strlen($other_type) > 64) {
                ret400();
            }
            $hosp_type = "Other - (".$other_type.")";
        }
        if(!(
            $subdist == "Parbhani (City)" || $subdist == "Parbhani" || $subdist == "Jintur" || $subdist == "Pathri" || $subdist == "Manwath" ||
            $subdist == "Purna" || $subdist == "Selu" || $subdist == "Sonpeth" || $subdist == "Palam" || $subdist == "Gangakhed"
        )) {
            ret400();
        }
        if(strlen($address) < 5 || strlen($address) > 512) {
            ret400();
        }
        if($mobile) {
            if($mobile < 100000000 || $mobile > 9999999999) {
                ret400();
            }
        }
        else {
            ret400();
        }
        if(strlen($doc_name) < 5 || strlen($doc_name) > 512) {
            ret400();
        }
        require_once "include.php";
        $db = new db;
        $con = $db->con();
        $q = $con->prepare("INSERT INTO hospitals (mobile_number, password, hospital_name, hospital_type, name_of_doctor, subdist, address, ac_status, uqid, reg_ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, UUID(),?)");
        try {
            $q->execute([
                $mobile,
                hash_password("Doc@1234"),
                htmlentities(utf8_encode($hosp_name)),
                htmlentities(utf8_encode(ucfirst($hosp_type))),
                htmlentities(utf8_encode($doc_name)),
                $subdist,
                htmlentities(utf8_encode($address)),
                "REQUESTED",
                $_SERVER["REMOTE_ADDR"]
            ]);
            ret(200, ["error" => "false", "message" => "Registration Successful!"]);
        }
        catch (PDOException $e) {
            if($e->getCode() == 23000){
                ret(403, ["error"=>"true", "message"=>"Mobile Number Already Registered"]);
            }
            ret(500, ["error"=>"true", "message" => "Database Error Occurred!"]);
        }
    }
    else {
        ret400();
    }
    function ret ($statusCode, $data) {
        http_response_code($statusCode);
        die(json_encode($data));
    }
    function ret400() {
        ret(400, ["error"=>"true", "message"=>"Fields Missing or Invalid!"]);
    }

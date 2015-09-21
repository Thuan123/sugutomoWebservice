<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         // put your code here
        $du_lieu_tra_ve_xml = file_get_contents("http://localhost/SugutomoWebService?getUser&format=xml");
        echo $du_lieu_tra_ve_xml;
 
         //Lấy dữ liệu trả về dạng json
        $du_lieu_tra_ve_json = file_get_contents("http://localhost/SugutomoWebService?getUser&format=json");
        echo $du_lieu_tra_ve_json;
        
        echo "DaoHongThuan";
        echo "CaoPhuongAnh";
        echo "Nguyen Van Tu";
        echo "Nguyen Thanh Nga";
        ?>
        
    </body>
</html>

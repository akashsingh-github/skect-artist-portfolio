<?php
    $connect = mysqli_connect("localhost", "root", "", "sketch_art_hub") or die("unsuccessfull connnection");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders list</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .page-title{
            font-size: 40px;
            font-family: "Time new roman, serif";
            text-shadow: 5px 5px 5px rgba(0,0,0,0.25);
            color: purple;
            text-align: center;
        }
        .screen-container{
            width: 90%;
            margin: 25px auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 15px;
        }
        .order{
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px 2px rgba(0,0,0,0.15);
            padding: 15px;
        }
        .half-grid{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
        .third-grid{
            display: grid;
            grid-template-columns: repeat(3, 1fr)
        }
        .order-img-container{
            width: 300px;
            height: 300px;
            margin: auto;
        }
        .order-img-container img{
            width: 100%;
            height: 100%;
        }
        .detail-item h5,
        .address-lines h5{
            font-size: 18px;
            font-weight: 400;
        }
        .delivery-details h1{
            font-size: 28px;
            font-weight: 400;
            padding: 10px 0px;
        }
    </style>
</head>
<body>

    <h1 class="page-title">List of orders</h1>

    <section class="orders">
        <?php
            $query_select_all = "SELECT * FROM url order by order_id desc";
            $output = '';
            $resulted_query = mysqli_query($connect, $query_select_all);
            if(mysqli_num_rows($resulted_query) > 0){
                
                $output .= '<div class="screen-container">';

                while($row = mysqli_fetch_array($resulted_query)){
                    $output .= '
                                <div class="order">
                                    <div class="half-grid">
                                        <div class="detail-item"><h5>Order Id: '.$row["order_id"].'</h5></div>
                                ';
                    $second_query = "SELECT * FROM user_data WHERE user_id=".$row["user_id"]."";
                    $user_data_result = mysqli_query($connect, $second_query);
                    if(mysqli_num_rows($user_data_result) > 0){
                        while($row1 = mysqli_fetch_array($user_data_result)){
                            $output .= '
                                        <div class="detail-item"><h5>User Id: '.$row1["user_id"].'</h5></div>
                                    </div>
                                    <div class="half-grid">
                                        <div class="detail-item"><h5>First Name: '.$row1["first_name"].' </h5></div>
                                        <div class="detail-item"><h5>Last Name: '.$row1["last_name"].'</h5></div>
                                    </div>
                                    <div class="half-grid">
                                        <div class="detail-item"><h5>Email: '.$row1["email"].'</h5></div>
                                        <div class="detail-item"><h5>mobile: '.$row1["mobile_number"].'</h5></div>
                                    </div>
                                        ';
                            $delivery = '
                                    <div class="delivery-details">
                                        <h1>Delivery Details</h1>
                                        <div class="third-grid">
                                            <div class="detail-item"><h5>Pin: '.$row1["pin"].'</h5></div>
                                            <div class="detail-item"><h5>State: '.$row1["state"].'</h5></div>
                                            <div class="detail-item"><h5>City: '.$row1["city"].'</h5></div>
                                        </div>
                                        <div class="address-lines">
                                            <h5>Address line 1: '.$row1["address_line_1"].'</h5>
                                            <h5>Address line 2: '.$row1["address_line_2"].'</h5>
                                            <h5>Address line 3: '.$row1["address_line_3"].'</h5>
                                        </div>
                                    </div>
                                        ';
                        }
                    }
                    $output .= '
                            <div class="img-link">
                                <div class="detail-item"><h5>Img Link: <a href="'.$row["send_url"].'">Go to the Image Link</a></h5></div>
                            </div>
                            <div class="order-img-container">
                                <img src='.$row["send_url"].' alt="">
                            </div>

                        ';
                    $output .= $delivery;
                    $output .= '</div>';
                }
                
                $output .= '</div>';
            }
            else{
                echo "Nothing to show";
            }
            
            echo $output;
        ?>
    </section>  
    

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>
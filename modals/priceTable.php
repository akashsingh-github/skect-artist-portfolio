<?php
    $errors = array();
    if(isset($_POST["openImageModal"])){
        // echo "<script>alert('open image modal')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style/style.css">
    <title>Document</title>
    <style>
    #image-upload-modal{
    }
    </style>
</head>
<body>
    <section id="price-table-modal">
        <div class="modal-container">
            <div class="modal-content">

                <div class="step-circle">
                    <h2>
                        1
                    </h2>
                </div>

                <div class="modal-errors">
                    <ul id="price-table-errors">
                        
                    </ul>
                </div>

                <form action="" method="POST" name="price-table-form" id="price-table-form" onsubmit="return TableValidation()">
                    <div class="modal-inner">
                        <h4 class="modal-heading">Choose your best suite</h4>
                        <div class="selection-table">
                            <h2 class="price-head">Select Art type</h2>

                            <select name="select-art-type" id="select-art-type" class="select" require>
                                <option  value="00">Select Your Art Type</option>
                                <option value="500">Stippling Art</option>
                                <option value="700">Artistics Art</option>
                                <option value="900">Color Drawing </option>
                                <option value="1000">Digital Sketch</option>
                                <option value="1000">Portrait Sketch</option>
                                <option value="1000">Quick Sketch</option>
                            </select>
                            <div class="disable-price">
                                <input type="number" id="input-art-type" class="form-control price" disabled>
                            </div>
                        </div>
                        <div class="selection-table">
                            <h2 class="price-head">Select Number of Heads</h2>

                            <select name="select-heads" id="select-heads" class="select" required>
                                <option value="00">Select Number of Heads</option>
                                <option value="1100">1</option>
                                <option value="1200">2</option>
                                <option value="1300">3</option>
                                <option value="1400">4</option>
                                <option value="1500">5</option>
                            </select>
                            <div class="disable-price">
                                <input type="number" id="input-heads" class="form-control price" disabled>
                            </div>
                        </div>
                        <div class="selection-table">
                            <h2 class="price-head">Select Paper Size: </h2>

                            <select name="select-paper-size" id="select-paper-size" class="select">
                                <option value="00">Select Paper Size</option>
                                <option value="1100">A4</option>
                                <option value="1200">A4</option>
                                <option value="1300">A4</option>
                                <option value="1400">A4</option>
                            </select>
                            <div class="disable-price">
                                <input type="number" id="input-paper-size" class="form-control price" disabled>
                            </div>
                        </div>

                        <div class="total">
                            <h3>Total : </h3>
                            <h2 id="total-price">
                            </h2>
                        </div>

                        <div class="selectImageBtn">
                            <button id="openImageModal" name="openImageModal" class="next-modal-btn" type="submit">NEXT</button>
                            <button id="closePriceTableModal" class="close-modal" type="button">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div id="image-upload-modal" 
        <?php 
            if(isset($_POST["openImageModal"])){
                echo "class='show-image-upload'";
            }
        ?>
    >

    <!-- added a new line -->

        <div class="modal-container">
            <div class="modal-content">
                <div class="step-circle">
                    <h2>
                        2
                    </h2>
                </div>
                <div class="modal-inner">
                    <h4 class="modal-heading">Drop an Image for sketch</h4>
                    <input type="file" id="imageToBeUpload">
                    <button onclick="uploadImage()" id="uploadImageBtn">Upload Image</button>
                    <div class="selected-image-container">
                        <img src="" alt="" id="selected-image">
                    </div>
                    <a id="url"></a>
                    <div class="selectImageBtn">
                        <button id="openPaymentModal" class="next-modal-btn">NEXT</button>
                        <button id="closeImageModal" class="close-modal">CANCEL</button>
                    </div>
                    <!-- <input type="file" id="photo">
                    <button onclick="uploadImage()" id="upload">Upload Image</button>
                    <img src="" alt="" id="image">
                    <a id="url"></a>
                    <div id="compare"></div> -->
                </div>

            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function TableValidation(){
        var getErrorList = document.querySelector("#price-table-errors");
        
        var getArtType = document.getElementById('select-art-type');
        var artTypePrice = parseInt(getArtType.value);
        if(artTypePrice == 0){
            // alert("Hi");
            getErrorList.innerHTML = '<li>Please select art type</li>'
            return false;
        }
        var getHeads = document.getElementById('select-heads');
        var perHeadPrice = parseInt(getHeads.value);
        if(perHeadPrice == 0){
            getErrorList.innerHTML = '<li>Please select number of hheads</li>'
            return false;
        }

        var getPaperSize = document.getElementById('select-paper-size');
        var paperSizePrice = parseInt(getPaperSize.value);
        if(paperSizePrice == 0){
            getErrorList.innerHTML = '<li>Please select paper size</li>'
            return false;
        }

        // console.log(artTypePrice);
    }

        $('#select-art-type').on('change', function(){
            var getArtType = document.getElementById('select-art-type');
            var artTypePrice = parseInt(getArtType.value);
            $('#input-art-type').val(artTypePrice);
        })
        $('#select-heads').on('change', function(){
            var getHeads = document.getElementById('select-heads');
            var headsPerPrice = parseInt(getHeads.value);
            $('#input-heads').val(headsPerPrice);
        })
        $('#select-paper-size').on('change', function(){
            var getPaperSize = document.getElementById('select-paper-size');
            var paperSizePrice = parseInt(getPaperSize.value);
            $('#input-paper-size').val(paperSizePrice);
        })
        $('.select').on('change', function(){
            var totalSum = 0;
            $('.form-control.price').each(function(){
                var inputVal = $(this).val();
                if($.isNumeric(inputVal)){
                    totalSum += parseFloat(inputVal);
                }
            })
            $('#total-price').text(totalSum);
        })
</script>

</html>
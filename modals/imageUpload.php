<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assests/style/style.css">
</head>
<body>
    <div id="image-upload-modal">
        <div class="modal-container">
            <div class="modal-content">
                <div class="step-circle">
                    <h2>
                        2
                    </h2>
                </div>
                <div class="modal-inner">
                    <h4 class="modal-heading">Drop an Image for sketch</h4>
                    <input type="file" id="imageToBeUpload" placeholder="select image">
                    <button onclick="uploadImage()" id="uploadImageBtn">Upload Image</button>
                    <div class="selected-image-container">
                        <img src="" alt="" id="selected-image">
                    </div>
                    <!-- <a id="url"></a> -->
                    <div class="selectImageBtn">
                        <button id="openPaymentModal" class="next-modal-btn">NEXT</button>
                        <button id="closeImageModal" class="close-modal">CANCEL</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
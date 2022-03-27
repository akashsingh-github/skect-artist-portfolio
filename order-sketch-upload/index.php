<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firebase Image storage</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <input type="file" id="photo">
    <button onclick="uploadImage()" id="upload">Upload Image</button>
    <img src="" alt="" id="image">
    <a id="url"></a>
    <div id="compare"></div>
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-storage.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyBsz-RSRgxxRcVfpSsfG4c_eCwm5p67fSY",
    authDomain: "imageupload-f3bf1.firebaseapp.com",
    databaseURL: "https://imageupload-f3bf1.firebaseio.com",
    projectId: "imageupload-f3bf1",
    storageBucket: "imageupload-f3bf1.appspot.com",
    messagingSenderId: "692880566205",
    appId: "1:692880566205:web:c4a52bf5faa28f4d0894d4"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  console.log(firebase);

  function uploadImage(){
      
      const ref = firebase.storage().ref()

      const file = document.querySelector('#photo').files[0]

      const name = new Date() + '-' + file.name

      const metaData = {
          contentType:file.type
      }

      const task = ref.child(name).put(file, metaData)

      task
      .then(snapshot => snapshot.ref.getDownloadURL())
      .then(url => {
            // console.log(url)
            sendURL(url);
            alert("Image uploaded successfully")
            const image = document.querySelector("#image")
            image.src = url
            const imageURL = document.querySelector("#url")
            imageURL.text = url
            imageURL.href = url
      })
      ref = ''
      file = ''
      name = ''
  }
  function sendURL(url){
    console.log("Send url function!!")

    $.ajax({
        url: "search.php",
        method: "post",
        data: {url:url},
        success: function(data)
        {
            $("#compare").html(data);
        }
    });
  }
  


</script>
</html>
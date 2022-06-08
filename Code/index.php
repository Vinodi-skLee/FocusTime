<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Focus: Time</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/stopwatch.css">
    <link rel="stylesheet" type="text/css" href="./css/modal.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/stopwatch.js"></script>
    <script>
        function ajax(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if(req.readyState == 4 && req.status == 200){
                    document.getElementById('chat').innerHTML = req.responseText;	
                }
            }
            req.open('GET','chat.php',true);
            req.send();
        }
        setInterval(function() {ajax()}, 1000);
    </script>
</head>
<body onload="ajax();">
    <div id="modal" class="modal-overlay">
        <div class="modal-window">
            <div class="title">
                <h2>Famous saying</h2>
            </div>
            <div class="close-area">X</div>
            <div >
                <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fblogfiles.naver.net%2F20160901_173%2Fnoteasy817_1472690488100zFmkh_JPEG%2FK-015.jpg&f=1&nofb=1" style="width: 380px; margin-top: 10px;"/>
            </div>           
            <div class="content" style="margin-top: 10px;">
                <p>If the wind will not serve, tae to the oars.</br>
                <p>바람이 불지 않으면 노를 저어라.</p>
            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="title">
            <span class="mainText">Focus!!!</span>
        </div>

        <!-- image -->
        <div style="margin-bottom: 5rem;">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F1d%2F78%2F94%2F1d78948198c6a29e17a1c0abde21cf9b.gif&f=1&nofb=1" />
        </div>

        <!-- Stopwatch -->
        <div class="stopWatch" id="StopWatch">
            <div id='box' class="box">
                <div id='timerBox' class="timerBox">
                    <div id="time" class="time">00:00:00</div>
                </div>
                <div class="btnBox">
                    <i id="startbtn" class="fa fa-play" aria-hidden="true"></i>
                    <i id="pausebtn" class="fa fa-pause" aria-hidden="true"></i>
                    <i id="stopbtn" class="fa fa-stop" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- youtube video -->
        <div class="video" id="video" style="margin-bottom: 3rem;">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/fAOZOfeBh2g?loop=1&autoplay=1&playlist=fAOZOfeBh2g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay=1; loop=1; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="musicText" >Music is the only drug the country has allowed..lol</div>
        </div>

        <!-- famous saying -->
        <button type="button" id="btn-modal" class="btn btn-danger" style="margin-bottom: 40px;">I can't concentrate... Help me! </button>
        
        <!-- comment -->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <form class="mb-4" method="POST" action="index.php">
                        <textarea class="form-control" name="message" rows="2" placeholder="Please leave a comment!" required=""></textarea>
                        <input type="text" name="name" placeholder=" Enter your name" style="width: 49%; border-radius: 3px;" required="" />
                        <input type="submit" style="color: white; background-color: #faa966; width: 49%; border-radius: 3px" name="submit" value="Enter"/>
                    </form>
                    <div class="ibox-content">
                        <div class="row">
                            <div style="margin-left: 10%;" class="col-md-10">
                                <div class="chat-discussion">
                                    <div class="chat-message left">
                                        <div id="chat"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </section>
    </div>
    <!-- php -->
    <?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$message = $_POST['message'];
			$query = "INSERT INTO chat (name, message) VALUES ('$name','$message')";
            $run = $con -> query($query);
        }
	?>
    <!-- js function -->
    <script type="text/javascript">
        const modal = document.getElementById("modal")

        function modalOn() {
            modal.style.display = "flex"
        }
        function isModalOn() {
            return modal.style.display === "flex"
        }
        function modalOff() {
            modal.style.display = "none"
        }

        const btnModal = document.getElementById("btn-modal")
        btnModal.addEventListener("click", e => {
            modalOn()
        })
        const closeBtn = modal.querySelector(".close-area")
        closeBtn.addEventListener("click", e => {
            modalOff()
        })
        modal.addEventListener("click", e => {
            const evTarget = e.target
            if(evTarget.classList.contains("modal-overlay")) {
                modalOff()
            }
        })
        window.addEventListener("keyup", e => {
            if(isModalOn() && e.key === "Escape") {
                modalOff()
            }
        })
    </script>
</body>
</html>
<?php

while($row = mysqli_fetch_assoc($sql)){
    $output .= ' <a href="#">
                <div class="content">
                <img src="img/'. $row['img'] .'" alt="">
                <div class="details">
                    <span>'. $row['fname'] . " " . $row['lname'] .'</span>
                    <p>Esta é uma mensagem de teste</p>
                </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>';
}

?>
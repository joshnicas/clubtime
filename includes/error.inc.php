<?php

function error($pwd,$pwd_confirmed){
    if($pwd != $pwd_confirmed){
    return "password does not match!";
}

}

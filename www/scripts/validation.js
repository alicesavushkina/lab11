function validateX() {
    return true;
}


function validateY() {
    var y = document.getElementById("y").value;
    if (isNaN(Number(y.replace(',', '.')))){
        document.getElementById("error_y_msg").innerHTML = "<div class='game_font'>You lost! </div>  Не число!";
        return false;
    }
    else
        document.getElementById("error_y_msg").innerHTML = "";

    var n = Number(y.replace(',', '.'));
    if(n < -3 || n > 5){
        document.getElementById("error_y_msg").innerHTML = "<div class='game_font'>You lost! </div>  <br> Диапазон должен быть (3, 5)!";
        return false;
    }
    else{
        document.getElementById("error_y_msg").innerHTML = "";
    }

    return true;
}

function validateR() {
    var flag = 0;
    for (var i = 0; i< 5; i++) {
        if(document.myform["R"][i].checked){
            flag ++;
        }
    }
    if (flag === 0) {
        document.getElementById("error_r_msg").innerHTML = "<div class='game_font'>You lost! </div>  Отметьте значение!";
        return false;
    }
    else {
        document.getElementById("error_r_msg").innerHTML = "";
    }

    if (flag > 1) {
        document.getElementById("error_r_msg").innerHTML = "<div class='game_font'>You lost! </div> <br>  Отметьте только одно значение!";
        return false;
    }
    else {
        document.getElementById("error_r_msg").innerHTML = "";
    }
    return true;
}


function validateForm() {
    var a = validateY();
    var b = validateX();
    var c = validateR();
    return a && b && c;
}




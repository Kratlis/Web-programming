function check() {

    warningX.hidden = true;
    let yField = document.getElementById("y");
    yField.classList.remove("warning-text");
    warningYValue.hidden = true;
    warningYFormat.hidden = true;
    warningR.hidden = true;

    checkX();
    checkY();
    checkR();
    return (xValid && yValid && rValid);
}

function checkX() {
    let x = document.getElementById("x").value;

    if (x === 'no') {
        warningX.classList.add("warning");
        xValid = false;
        warningX.hidden = false;
    } else {
        xValid = true;
        warningX.hidden = true;
    }
}

function checkY() {
    let yField = document.getElementById("y");
    // /[^0-9,.+-]/.test(yField.value)
    if (yField.value === '') {
        yField.classList.add("warning-text");
        warningYFormat.hidden = false;
        warningYValue.hidden = false;
        yValid = false;
    } else if (!/^[-+]?([0-3]([.,]\d+)?)/.test(yField.value)){
        yField.classList.add("warning-text");
        warningYValue.hidden = false;
        yValid = false;
    } else{
        console.log(parseFloat(yField.value));
        let y = yField.value;
        if (y < -3 || y > 3){
            yField.classList.add("warning-text");
            warningYValue.hidden = false;
            yValid = false;
        } else {
            yField.classList.remove("warning-text");
            warningYFormat.hidden = true;
            warningYValue.hidden = true;
            yValid = true;
        }
    }
}

    function checkR() {
        if (!rSelected()) {
            warningR.hidden = false;
            rValid = false
        } else{
            warningR.hidden = true;
            rValid = true;
        }
    }

    function rSelected() {
        var first = document.getElementById("r1");
        var second = document.getElementById("r15");
        var third = document.getElementById("r2");
        var forth = document.getElementById("r25");
        var fifth = document.getElementById("r3");
        return first.checked || second.checked || third.checked || forth.checked || fifth.checked;
}
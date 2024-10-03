let switchState = false;

const clickOnSwitch = document.querySelector("#Schedules_closedPark");

console.log(clickOnSwitch.checked);

if (clickOnSwitch.checked) {
    disableInput();
    switchState = true;
}

clickOnSwitch.addEventListener("click", () => {
    if (switchState == false) {
        switchState = true;
        disableInput();
    } else {
        switchState = false;
        enableInput();
    }
});

function disableInput() {
    document
        .querySelector("#Schedules_closesAt")
        .setAttribute("disabled", "disabled");
    document
        .querySelector("#Schedules_opensAt")
        .setAttribute("disabled", "disabled");
    document.querySelector("#Schedules_closesAt").value = "";
    document.querySelector("#Schedules_opensAt").value = "";
}

function enableInput() {
    document.querySelector("#Schedules_closesAt").removeAttribute("disabled");
    document.querySelector("#Schedules_opensAt").removeAttribute("disabled");
}

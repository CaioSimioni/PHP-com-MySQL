const user_msg_erro = {
    "Element": document.querySelector(".user_msg .msg_erro"),
    "displayBlock": (element) => {
        element.style.display = "block";
    },
    "displayNone": (element) => {
        element.style.display = "none";
    },
    "insertMessage": (msg) => {
        element = document.querySelector(".user_msg .msg_erro");
        element.style.display = "block";
        element.innerHTML = msg;
    }
};
const user_msg_sucess = {
    "Element": document.querySelector(".user_msg .msg_sucess"),
    "displayBlock": (element) => {
        element.style.display = "block";
    },
    "displayNone": (element) => {
        element.style.display = "none";
    },
    "insertMessage": (msg) => {
        element = document.querySelector(".user_msg .msg_sucess");
        element.style.display = "block";
        element.innerHTML = msg;
    }
};
const user_input_name = {
    "Element": document.querySelector(".input_name"),
    "setValue": (value) => {
        element = document.querySelector(".input_name");
        element.value = value;
    }
}
const user_input_pass = {
    "Element": document.querySelector(".input_pass"),
    "setValue": (value) => {
        element = document.querySelector(".input_pass");
        element.value = value;
    }
}
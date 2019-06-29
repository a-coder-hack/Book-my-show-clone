console.log("running");

document.getElementById("change_signup").addEventListener("click", hello);

function hello(){
        console.log("clicked");
        document.querySelector(".login").classList.remove("transition_come_login");
    document.querySelector(".signup").classList.remove("transition_go_signup");
        document.querySelector(".login").classList.add("transition_go_login");
        document.querySelector(".signup").classList.add("transition_come_signup");
}

document.getElementById("change_login").addEventListener("click", hello2);

function hello2(){
    console.log("clicked");
    document.querySelector(".login").classList.remove("transition_go_login");
        document.querySelector(".signup").classList.remove("transition_come_signup");
    document.querySelector(".login").classList.add("transition_come_login");
    document.querySelector(".signup").classList.add("transition_go_signup");
}
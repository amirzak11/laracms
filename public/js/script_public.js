function down_up() {


}

document.onclick = function(event){
    var hasParent = false;
    for(var node = event.target; node != document.body; node = node.parentNode)
    {
        if(node.id == 'login-user__one'){
            hasParent = true;
            break;
        }
    }
    if(hasParent)
        document.getElementById("profile-dropdown").style.display = "block";
    else
        document.getElementById("profile-dropdown").style.display = "none";
}

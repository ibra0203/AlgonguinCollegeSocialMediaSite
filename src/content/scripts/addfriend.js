
function onUserSearch(str) {
    if (str.length == 0) { 
        searchList = document.getElementById('search-result');
                searchList.innerHTML="";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                users = JSON.parse(this.responseText)
                searchList = document.getElementById('search-result');
                searchList.innerHTML="";
                for(i=0; i<users.length; i++)
                {
                    var li = document.createElement('li');
                    li.className = "has-text-centered ";
                    li.innerHTML="<p><b class='has-background-warning'>"+str+"</b>"+users[i].substring(str.length)+"</p>";
                    searchList.appendChild(li);
                }
            }
        };
        xmlhttp.open("GET", "helpers/userList.php?q=" + str, true);
        xmlhttp.send();
    }
}
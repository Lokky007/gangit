/**
 * Created by owner on 5.6.2016.
 */


function submitMessage (){
    if (chatBox_SendMessage.textMessage.value == '' ){
        alert("Nelze odeslat prázdnou zprávu.");
        return;
    }
    var textMessage = chatBox_SendMessage.textMessage.value;
    var xmlhttp = new XMLHttpRequest();


    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState==4&&xmlhttp.status==200){
            document.getElementById('chatBox_loadMessages').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open('GET','core/database/db_chatBox.php?message='+textMessage,true);
    xmlhttp.send();
}
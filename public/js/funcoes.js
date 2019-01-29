
function getXMLHttp(){
    var xmlhttp;
    if(window.ActiveXObject){ //IEca
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        console.log("instanciei Microsoft");
    }else if(window.XMLHttpRequest){ //deve ser chrome ou firefox ou opera
        xmlhttp = new XMLHttpRequest();
        console.log("instanciei XMLHttpRequest");
    }else{
        alert("Seu navegador nao suporta XMLHTTP, queime sua maquina, é inutil demais");
    }
    return xmlhttp;
} 

function getTextInfo(){
    ajax = getXMLHttp();   
    ajax.open("POST", "http://localhost:8000/pokemon/search?nome=" + document.getElementById('nome').value, true);
    ajax.onreadystatechange = updateInfo;
    console.log(document.getElementById('nome').value)
    ajax.send();
    return false;
}

function updateInfo(){
    if(ajax.readyState == 4 && ajax.status == 200){
        var response = ajax.responseText;
        obj = JSON.parse(response);
        console.log(obj);
        html = '<br><div>'
        obj.bicharada.forEach(element => {
            html = html + '<p>' + element.nome + '</p>' + '<img src="./img/' + element.foto + '" height="60" width="60"/><br>'; 
        });
        html = html + '</div>';
        console.log(html)
        document.getElementById("arrei").innerHTML = html;
    }
}
    
function enableButton() {
    if (document.getElementById("checkbox").checked) {
        document.getElementById("submitBtn").disabled=false;
    }
    else {
        document.getElementById("submitBtn").disabled=true;
    }
}

function success() 
  {   
    alert("Transaction Successful"); 
  } 

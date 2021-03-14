function validimi(){
    
    var emri = document.getElementById("fname").value;
    var mbiemri = document.getElementById("lname").value;
    var imella = document.getElementById("email").value;
    var country = document.getElementById("country").value;
    var komenti = document.getElementById("subject").value;
   
    
    var nameerror;
    var lnerror;
    var emailerror;
    var countryerror;
    var messageerror;
   

    if(emri == ""){
        nameerror = "Name is required!"
        error.innerHTML = nameerror;
        
        return false;
    }
    else if(emri.length <= 2){
        nameerror = "Name must contain at least 3 characters!"
        error.innerHTML = nameerror;
        return false;
    }
    else{
        error.innerHTML = "";   
    }
    

   
    if(mbiemri.length <= 2){
        lnerror = "Last name is required!"
        error2.innerHTML = lnerror;
        return false;
    }
    else{
        error2.innerHTML = "";   
    }

   

    if(imella == ""){
        emailerror = "Email is required!";
        error3.innerHTML = emailerror;
        
        return false;
    }
    else{
        error3.innerHTML = "";   
    }



    if(country === "select"){
        countryerror = "Country is required!";
        error4.innerHTML = countryerror;
        return false;
    }
    else{
        error4.innerHTML = "";   
    }



    if(komenti.length <= 20){
        messageerror = "Message must contain at least 20 characters!";
        error5.innerHTML = messageerror;
        return false;
    }
    else{
        error5.innerHTML = "";   
    }
  
}



//Validimi Loginit

function validimilogin(){

    var imella = document.getElementById("email").value;
    var pasi = document.getElementById("password").value;


    var emailerror;
    var paserror;


    if(imella.length == ""){
        emailerror = "Email is required!";
        imellaerror.innerHTML = emailerror;
        return false;

    }
    else{
        imellaerror.innerHTML = "";
    }


    if(pasi.length <= 7){
        paserror = "Pasword longer than 7";
        pwerror.innerHTML = paserror;
        return false;

    }
    else{
        pwerror.innerHTML = "";
    }
    
}


//validimi i Register

function validimiregister(){
    
    var emri = document.getElementById("name1").value;
    var mbiemri = document.getElementById("username1").value;
    var emaili = document.getElementById("email1").value;
    var paswordi = document.getElementById("password1").value;


    var emrierror;
    var mbiemrierror;
    var emailierror;
    var paswordierror;


        if(emri == ""){
            emrierror = "Name is required";
            errorregister.innerHTML = emrierror;
            return false;
        }
        else{
            errorregister.innerHTML = "";
        }

        if(mbiemri == ""){
            mbiemrierror = "Username is required";
            errorregister2.innerHTML = mbiemrierror;
            return false;
        }
        else{
            errorregister2.innerHTML = "";
        }

        if(emaili == ""){
            emailierror = "Email is required!";
            errorregister3.innerHTML = emailierror;
            return false;
    
        }
        else{
            errorregister3.innerHTML = "";
        }

        if(paswordi.length <= 6){
            paswordierror = "Pasword longer than 6";
            errorregister4.innerHTML = paswordierror;
            return false;
    
        }
        else{
            errorregister4.innerHTML = "";
        }

}



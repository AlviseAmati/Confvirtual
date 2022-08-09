function validateLoginForm() { 
    if (document.loginForm.psw.value.length<1 || document.loginForm.mail.value.length<1 ) { 
      alert("Completali tutti i campi"); 
      return false; 
    } 
    if (document.loginForm.mail.value.includes("@") == false) {
      alert("Inserisci una mail valida");
      return false; 
    }
  return true;                                  
}
const passwordForm=document.querySelector(".passwordform"),passwordForm2=document.querySelector(".passwordform2"),passwordSpecs=document.querySelector(".passwordspecs"),passwordCheck=document.querySelector(".passwordCheck"),passwordCheckspecs=document.querySelector(".passwordcheckspecs"),passwordSpecs2=document.querySelector(".passwordspecs2"),showPasswordButton=document.getElementById("showPasswordButton"),showPasswordButton2=document.getElementById("showPasswordButton2");let showPasswordSpecs2=!1;const passwordField=document.getElementById("newPassword");function checkPassword(){const e=document.querySelector(".passwordform").value,s=passwordCheck.value;passwordCheckspecs.style.display=e!==s?"block":"none"}function updatePasswordSpecsVisibility(){showPasswordSpecs2?(passwordSpecs.style.display="none",passwordSpecs2.style.display="block"):(passwordSpecs.style.display="block",passwordSpecs2.style.display="none")}function hidePasswordSpecs(){passwordSpecs.style.display="none",passwordSpecs2.style.display="none"}function redirectToProfile(){setTimeout((function(){window.location.href="perfil.html"}),3300)}function getCookie(e){for(var s=e+"=",o=decodeURIComponent(document.cookie).split(";"),t=0;t<o.length;t++){for(var d=o[t];" "===d.charAt(0);)d=d.substring(1);if(0===d.indexOf(s))return d.substring(s.length,d.length)}return""}function showModal(e){const s=document.getElementById("modal");document.getElementById("modal-text").textContent=e,s.style.display="block",window.onclick=function(e){e.target===s&&(s.style.display="none")};document.getElementById("modal-close").onclick=function(){s.style.display="none"}}showPasswordButton.addEventListener("click",(()=>{"password"===passwordField.type?passwordField.type="text":passwordField.type="password"})),showPasswordButton2.addEventListener("click",(()=>{"password"===passwordForm2.type?passwordForm2.type="text":passwordForm2.type="password"})),passwordForm.addEventListener("focus",(()=>{updatePasswordSpecsVisibility()})),passwordForm.addEventListener("blur",(()=>{hidePasswordSpecs()})),passwordForm.addEventListener("input",(()=>{const e=passwordForm.value.trim();showPasswordSpecs2=!(""===e||e.length<8||!/[A-Z]/.test(e)||!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(e)||!/[0-9]/.test(e)||/\s/.test(e)),updatePasswordSpecsVisibility()})),passwordCheck.addEventListener("input",checkPassword),document.addEventListener("DOMContentLoaded",(function(){document.getElementById("passwordChangeForm").addEventListener("submit",(function(e){e.preventDefault();const s=document.getElementById("newPassword"),o=document.getElementById("confirmPassword"),t=s.value;if(t!==o.value)return void showModal("Senhas diferentes!");const d={newPassword:t,username:getCookie("username")},n=new XMLHttpRequest;n.open("POST","api/atualizar_senha2.php",!0),n.setRequestHeader("Content-Type","application/json"),n.onreadystatechange=function(){if(4===n.readyState)if(200===n.status)try{const e=JSON.parse(n.responseText);"success"===e.status?(showModal("Senha atualizada com sucesso!"),redirectToProfile()):showModal("Erro ao atualizar a senha: "+e.message)}catch(e){showModal("Erro ao processar a resposta do servidor.")}else showModal("Erro de conexão com o servidor. Tente novamente.")},n.send(JSON.stringify(d))}))}));
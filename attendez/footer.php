<footer>
    <p><small>&copy;2023 Attend EZ</small></p>  
</footer> 

</div> <!--/main_contents-->

<script>
    
    var showPasswordButton = document.getElementById("showPasswordButton");
    showPasswordButton.addEventListener("click", togglePasswordVisibility);

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordButton.textContent = "非表示";
        } else {
            passwordInput.type = "password";
            showPasswordButton.textContent = "表示";
        }
    }

</script>
        
    </body>
</html>
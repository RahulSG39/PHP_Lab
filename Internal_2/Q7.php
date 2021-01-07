<html>
<body>
    <form method="GET">
        <label>Enter Username</label>
          <input type="text" id="name" onkeyup="showUser(this.value)">
          <div id="suggestion"></div>
          <button type="submit">Submit</button>
    </form>

    <script>
      function showUser(str) {
        if (str == "") {
            document.getElementById("suggestion").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("suggestion").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","Q7-p1.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>
  </body>
</html>


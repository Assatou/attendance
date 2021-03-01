   <table>
     <tr>
      <form name="frmSearch" method="post" action="">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
       
     </tr>
   </table>
   <br>
   <br>


	<table class="table table-bordered table-sm" id="empTable" >
    <thead>
      <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>
<script>
	$.ajax({
		url: "View.php",
		type: "POST",
		cache: false,
		success: function(data){
			alert(data);
			$('#table').html(data); 
		}
	});


  // Fonction pour rechercher nom
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("empTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

</script>

</body>
</html>
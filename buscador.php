<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar</title>
	
<style>
        #results {
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
        }
        .result-item {
            padding: 10px;
            border-bottom: 1px solid #FFFFFF;
   			background-color: #969696}
        .result-itemrpadding-item {
            background-color: #f0f0f0;
			padding: 10px;
            border-bottom: 1px solid #ccc;
        }
		.result-item:hover {
    	color: Blue;
		background-color: #f0f0f0;	
			}

	
	</style>
</head>

<body>
 
<form>
	<input type="text" autofocus="autofocus" id="search" placeholder="Buscar..." autocomplete="off">
    </form>

	<div id="results"></div>
    
	<script>
        document.getElementById('search').addEventListener('input', function() {
            let query = this.value;
            if (query.length > 0) {
                let xhr = new XMLHttpRequest();
                xhr.open('GET', 'search.php?query=' + query, true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById('results').innerHTML = this.responseText;
                    }
                };
                xhr.send();
            } else {
                document.getElementById('results').innerHTML = '';
            }
        });
    </script>	
	</br>
	</br>
</br>
	<a href="principal.php"><div class='result-item'>ID: " . $row["id_usuario"]. " - Usuario: " . $row["usuario"]. "</div></a>
</body>
</html>
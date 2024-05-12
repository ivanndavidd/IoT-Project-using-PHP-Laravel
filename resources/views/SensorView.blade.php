<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Monitoring Sampah</title>

    <!-- panggil jquery -->
    <script type="text/javascript" src= "{{ ('jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#level").load("{{ url('levelsensor') }}");
                $("#status").load("{{ url('statussensor') }}");
                $("#alamat").load("{{ url('alamatsensor') }}");
                // Ambil nilai dari ID "level" dan "status"
                var level = $("#level").text();
                var status = $("#status").text();

                // Masukkan nilai ke dalam sel yang sesuai di dalam tabel
                $("#level_table").text(level);
                $("#status_table").text(status);
            }, 1000);
        });
</script>
    </script>
  </head>
  <body>
    <!-- tampilan header -->
    <div class = "container" style = "text-align: center; margin-top: 50px;">
    <h1>Monitoring Sampah</h1>
    </div>
    <!-- tampilan sensor -->
    <div class="container" style="margin-top:30px;">
        <div class="row" style="text-align:center;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style = "text-align:center; background-color: white; color: blue;">
                        <h4>Level Sampah</h4>
                    </div>
                    <div class="card-body">
                        <div style ="font-size: 50px; font-weight:bold;">
                    <span id ="level">0</span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style = "text-align:center; background-color: white; color: green;">
                        <h4>Status Sampah</h4>
                    </div>
                     <div class="card-body">
                        <div style ="font-size: 50px; font-weight:bold">
                        <span id="status">Sedikit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tampilan data table -->
    <div class="container" style ="text-align: center; margin-top: 30px;">
    <h3>History Table</h3>
    </div>
    <div>
        <table class="table" style = "width:90%; text-align:center; margin-left:5%; margin-right:5%; margin-top:30px;">
            <thead>
                <tr>
                <th style = "width:10%" scope="col">No</th>
                <th style = "width:20%" scope="col">Level</th>
                <th style = "width:20%" scope="col">Status</th>
                <th style = "width:40%" scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td id = "level_table">Mark</td>
                <td id = "status_table">Otto</td>
                <td id = "alamat">@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style = "margin-top: 70px; margin-left:5%;">
    <button type="Back" class="btn btn-primary">Back</button>
    </div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
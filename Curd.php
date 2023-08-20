<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- This is bootstrap CDN below -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- This is Css file link below -->
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
         <!-- here is your search navBar start. -->
         <div class="row my-3">
            <div class="col-md-6 my-3 d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-feather fa-2xl"style="color: #fafafa;"></i>
            </div>
            <div class="col-md-6 my-3 d-flex justify-content-center align-items-center">
                <form id='search_form'>
                    <input type="text" name='search' placeholder='Search'>
                    <button class='btn'><i class="fa-solid fa-magnifying-glass fa-2xl" style="color: #fafafa;"></i></button>
                </form>
            </div>
        </div>
        <!-- here is your Table start -->
    <div class="row">
    <div class="col-md-12 my-3 curd">
      <!-- here is Edit block start -->
      <div class="edit_block"></div>

      <h3 class="text-center">PHP CURD Table</h3>
        <form id='form' action="" class='d-flex justify-content-center align-items-center'>
            <input class='mx-1' type="text" name='first_name' placeholder='Name'>
            <input class='mx-1' type="text" name='class_name' placeholder='Class Name'>
            <input class='mx-1 age' type="number" name='age' placeholder='age'>
            <button type='submit' class='btn'><i class="fa-solid fa-share fa-2xl" style="color: #fafafa;"></i></button>
        </form>
        <table id='table_data' class='my-3' border='1px' width='100%'>

        </table>
        </div>
    </div>
    <!-- here is Jquery CDN      -->
    <script src='jquery.js'></script>
    <script>
    $(document).ready(function() {
        //   here is load command start
        function load() {
          $.ajax({
            url: "loadTable.php",
            type: "POST",
                success: function(e) {
                    $('#table_data').html(e);
                }
            });
          }
        load();


        // here is delet command start
            $(document).on('click', '#delet', function(e) {
                var id = $(this).data('id');
                $.ajax({
                  url: 'delet.php',
                  type: "POST",
                  data: {
                    id: id
                  },
                  success: function(data) {
                        if (data) {
                          alert('Record has been Deleted !');
                        }
                    }
                })
            })
     
       
        // here is Insert Command start
        $('#form').on('submit', function(e) {
            e.preventDefault();
            var form = new FormData(this);
            $.ajax({
                url: "insert.php",
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        alert('Record Has been Add !');
                    }
                }
            })
        })

        // here is Edit Conmmand start
        $(document).on('click','#edit',function(e){          
          var id = $(this).data('id');
          $('.edit_block').css({'display':'flex'});
          $.ajax({
            url:'getUpdate.php',
            type:'POST',
            data:{id:id},
            success:function(data){
              $('.edit_block').html(data);
            }
          })
        })
        $(document).on('click','.close_edit_block',function(e){
          $('.edit_block').css({'display':'none'});
        })

        // here is Update Command start
        $(document).on('submit','#edit_form',function(e){
          e.preventDefault();
          var form = new FormData(this); 
          $.ajax({
            url: 'Update.php',
            type:'POST',
            data:form,
            contentType:false,
            processData:false,
            success:function(data){
              alert('Recode has been updated!');
            }
          })
        })

        // here is your Serach Command start
        $('#search_form').on('submit',function(e){
                e.preventDefault();
                var form = new FormData(this);
                $.ajax({
                  url: "Search.php",
                  type:"POST",
                  data:form,
                  contentType:false,
                  processData:false,
                  success:function(data){
                    $('#table_data').html(data);
                  }
                })
            })

      })
      </script>
      <?php
      include 'java.php';
    ?>
</body>

</html>
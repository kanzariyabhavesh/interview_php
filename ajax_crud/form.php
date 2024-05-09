<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body>

  <center>
    <form method="post" id="form">
      <br>
      <table border="10px">
        <tr>
          <td><label for="fname">Name:</label>
            <input type="text" id="name" name="name">
            <div class="error" id=nameerror></div>
          </td>
        </tr>
        <tr>
          <td><label for="Email">E-mail:</label>
            <input type="text" id="email" name="email">
            <div class="error" id=emailerror></div>
          </td>
        </tr>
        <tr>
          <td><label for="Address">Address:</label>
            <textarea type="address" id="address" name="address"></textarea>
            <div class="error" id=addresserror></div>
          </td>
        </tr>
        <tr>
          <td><label for="Phone">Phone Number:</label>
            <input type="number" id="phone" name="phone">
            <div class="error" id=phoneerror></div>
          </td>
        </tr>
        <tr>
          <td><label for="city">City:</label>
            <select name="city" id="city">
              <option value=""></option>
              <option value="morbi">Morbi</option>
              <option value="rajkot">Rajkot</option>
              <option value="halvad">Halvad</option>
            </select>
            <div class="error" id=cityerror></div>
          </td>
        </tr>
        <tr>
          <td><label for="Gender">Gender:</label>
            <input type="radio" id="male" name="gender" value="Male">Male
            <input type="radio" id="female" name="gender" value="Female">Female
            <div class="error" id=gendererror></div>
          </td>
        </tr>
        <input type="hidden" name="hiddenname" id="hiddenid">
        <tr>
          <td>
            <button type="button" id="submit" name="submit" onclick="submitbutton()">Submit</button>
            <button type="button" name="updete" id="updete" onclick="updetebutton()">Updete</button>
          </td>
        </tr>
      </table>
    </form>
    <h1>All Data</h1>
    <table border="10px" id="dataTable">
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Address</th>
        <th>Phone</th>
        <th>City</th>
        <th>Gender</th>
        <th>Action</th>
      </thead>
      <tbody>

      </tbody>
    </table>
  </center>

  <script>
      record();
      $("#updete").hide();
      $("#submit").show();
      function submitbutton(){
        $.ajax({
          url: "validate.php",
          type: "post",
          data: {
            name: $('#name').val(),
            email: $('#email').val(),
            address: $('#address').val(),
            phone: $('#phone').val(),
            city: $('#city').val(),
            gender: $("input[name='gender']:checked").val(),
            submit: $('#submit').val(),

          },
          success: function(data) {
            if (data == 1) {
              document.getElementById("nameerror").innerHTML = "";
              document.getElementById("emailerror").innerHTML = "";
              document.getElementById("addresserror").innerHTML = "";
              document.getElementById("phoneerror").innerHTML = "";
              document.getElementById("cityerror").innerHTML = "";
              document.getElementById("gendererror").innerHTML = "";
              $('#form')[0].reset();
              record();
            } else {
              var errors = JSON.parse(data);
              document.getElementById("nameerror").innerHTML = errors.name;
              document.getElementById("emailerror").innerHTML = errors.email;
              document.getElementById("addresserror").innerHTML = errors.address;
              document.getElementById("phoneerror").innerHTML = errors.phone;
              document.getElementById("cityerror").innerHTML = errors.city;
              document.getElementById("gendererror").innerHTML = errors.gender;
            }
          }
        })

      }

    function record() {
      $.ajax({
        url: "database_data.php",
        type: "get",
        dataType: 'json',
        success: function(data) {
          var tbody = $('#dataTable tbody');
          tbody.empty();
          var row_number = 0;
          $.each(data, function(index, row) {
            row_number = row_number + 1;
            var tr = $('<tr>');
            var id = row.id;
            tr.append($('<td>').text(row_number));
            tr.append($('<td>').text(row.name));
            tr.append($('<td>').text(row.email));
            tr.append($('<td>').text(row.address));
            tr.append($('<td>').text(row.phone));
            tr.append($('<td>').text(row.city));
            tr.append($('<td>').text(row.gender));
            tr.append($('<td>').html('<button type="button" onclick="rowEdit(' + id + ')">Edit</button><button type="button" onclick="rowDelete(' + id + ')">Delete</button>'));
            tbody.append(tr);
          });
        }
      });
    }

    function rowDelete(id) {
      $.ajax({
        url: "delect.php",
        type: "post",
        data: {
          deleteid: id,
        },
        success: function(data) {
          record();
        },

      });
    }

    function rowEdit(id) {
      $("#updete").show();
        $("#submit").hide();
      $.ajax({
        url: "edit.php",
        type: "post",
        data: {
          editid: id,
        },
        success: function(data) {
          var editvalue = JSON.parse(data);
          document.getElementById("name").value = editvalue[0].name;
          document.getElementById("email").value = editvalue[0].email;
          document.getElementById("address").value = editvalue[0].address;
          document.getElementById("phone").value = editvalue[0].phone;
          document.getElementById("city").value = editvalue[0].city;
          if (editvalue[0].gender == 'Male') {
            $('#male').prop('checked', true);
          } else if (editvalue[0].gender == 'Female') {
            $('#female').prop('checked', true);
          }
          document.getElementById("hiddenid").value = editvalue[0].id;
        },
      });
    }

    function updetebutton(){
      $.ajax({
          url: "validate.php",
          type: "post",
          data: {
            name: $('#name').val(),
            email: $('#email').val(),
            address: $('#address').val(),
            phone: $('#phone').val(),
            city: $('#city').val(),
            gender: $("input[name='gender']:checked").val(),
            updeteid: $("#hiddenid").val(),
            updete: $('#updete').val(),

          },
          success: function(data) {
            if (data == 1) {
              document.getElementById("nameerror").innerHTML = "";
              document.getElementById("emailerror").innerHTML = "";
              document.getElementById("addresserror").innerHTML = "";
              document.getElementById("phoneerror").innerHTML = "";
              document.getElementById("cityerror").innerHTML = "";
              document.getElementById("gendererror").innerHTML = "";
              $('#form')[0].reset();
              record();
              $("#updete").hide();
              $("#submit").show();

            } else {
              var errors = JSON.parse(data);
              console.log(errors);
              document.getElementById("nameerror").innerHTML = errors.name;
              document.getElementById("emailerror").innerHTML = errors.email;
              document.getElementById("addresserror").innerHTML = errors.address;
              document.getElementById("phoneerror").innerHTML = errors.phone;
              document.getElementById("cityerror").innerHTML = errors.city;
              document.getElementById("gendererror").innerHTML = errors.gender;
              document.getElementById("hiddenid").innerHTML = errors.updeteid;

            }
          }
        })
    }
      

  </script>

</body>

</html>
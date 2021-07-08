<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css'>

</head>

<body>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Api Client</h4>
                    <button type="button" class="add" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div style="text-align:center">
                            <form id='addCon' class="form-horizontal" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                            Name:<br />
                            <input type="text" name="name" id="name" /><br />
                            Surname:<br />
                            <input type="text" name="surname" id="surname" /><br />
                            E-mail:<br />
                            <input type="email" name="email" id="email" /><br />
                            Phone:<br />
                            <input type="text" name="phone" id="phone" /><br />
                            Status:<br />
                            <input type="text" name="status" id="status" /><br />

    <!-- Modal footer -->
                            <div class="modal-footer">
                                <input class="btn btn-success" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>

                
                   
                </div>
            </div>
        </div>
    </div>
<!-- The Modal -->
<div class="modal" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Api Client</h4>
                <button type="button" class="edit" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div style="text-align:center">
                        <form id='editCont'>
                            
                        Name:<br />
                        <input type="text" name="name1" id="name1" /><br />
                        Surname:<br />
                        <input type="text" name="surname1" id="surname1" /><br />
                        E-mail:<br />
                        <input type="email" name="email1" id="email1" /><br />
                        Phone:<br />
                        <input type="text" name="phone1" id="phone1" /><br />
                        Status:<br />
                        <input type="text" name="status1" id="status1" /><br />

<!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" button id="edit" class="btn btn-info" data-toggle="modal"
                            data-target="#myModal1">Update</button><br>
                        </div>
                    </form>
                </div>

            
               
            </div>
        </div>
    </div>
</div>
    <!-- CLASS/CONTAINER -->
    <div class="container">
        <br>
        <div class="text-center">
            <button type="button" button id="add" class="btn btn-info" data-toggle="modal"
                data-target="#myModal">Add Api Client</button><br>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" id="tbody">
        </div>
        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody id='bilun'>
            @foreach($contacts as $contact)
                <tr id="cid{{$contact->id}}">
                <td>{{$contact['id']}}</td>
                <td>{{$contact['name']}}</td>
                <td>{{$contact['surname']}}</td>
                <td>{{$contact['email']}}</td>
                <td>{{$contact['phone']}}</td>
                <td>{{$contact['status']}}</td>
                <td><button button id="editBtn" class="btn btn-warning" data-toggle="modal" data-target="#myModal1" onclick="editCon({{$contact}})">Update</button></td>
                <td><button button id="deleteBtn" class="btn btn-warning" onclick="deleteCon({{$contact['id']}})">Delete</button></td>
</tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addCon').submit(function(e) {
        e.preventDefault();

        let name = $("#name").val();
        let surname = $("#surname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let status = $("#status").val();
           
            $.ajax({
            type: 'POST',
            url: "{{ route('contact.store') }}",
            data: { "_token": "{{ csrf_token() }}",
                    name: $("#name").val(), surname: $("#surname").val(), email: $("#email").val(), phone: $("#phone").val(), status: $("#status").val(), },
               },
            success: function (res) {
                console.log(res);
              swal("Contact added successfully!", "", "success");
              $('#myModal').modal('hide');
              var trLen = $("#bilun").children('tr').length;

              $("#bilun").append("<tr id=" + (parseInt(trLen) + 1) + ">" +
                                   "<td id=tr" + (parseInt(trLen) + 1) + "-id>" +  $("#id").val() + "</td>" +
                                   "<td id=tr" + (parseInt(trLen) + 1) + "-name>" +  $("#name").val() + "</td>" +
                                   "<td id=tr" + (parseInt(trLen) + 1) + "-surname>" + $("#surname").val() + "</td>" +
                                   "<td id=tr" + (parseInt(trLen) + 1) + "-email>" +  $("#email").val() + "</td>" +
                                   "<td id=tr" + (parseInt(trLen) + 1) + "-phone>" +  $("#phone").val() + "</td>" +
                                   "<td id=tr" + (parseInt(trLen) + 1) + "-status>" +  $("#status").val() + "</td>" +
                                
                                   "</tr>");
                               $("#name").val("");
                               $("#surname").val("");
                               $("#email").val("");
                               $("#phone").val("");
                               $("#status").val("");
            },
         });
                    });
   
    
    </script>



<script>
 function deleteCon(id)
{
    $.ajax({
                    type: 'DELETE',
                    url:'/destroy/'+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{"_token": "{{ csrf_token() }}"},
                    
                    success: function (e) {
                      swal("Contact deleted successfully!", "", "success");
                      $("#cid"+id).remove();

                    },
                });

}
</script>


<script>
    function editCon(contact)
    {

            //console.log(contact);
            $("#name1").val(contact.name);
            $("#surname1").val(contact.surname);
            $("#phone1").val(contact.phone);
            $("#email1").val(contact.email);
            $("#status1").val(contact.status);



            let name = $("#name1").val();
            let surname = $("#surname1").val();
            let email = $("#email1").val();
            let phone = $("#phone1").val();
            let status = $("#status1").val();





            $('#edit').click(function(e) {
            $.ajax({
                url: "{{route('update')}}",
                type: "PUT",
                data: {
                    name: $("#name1").val(), surname: $("#surname1").val(), email: $("#email1").val(), 
                    phone: $("#phone1").val(), status: $("#status1").val(), id:contact.id
                     },
           
                success:function(response)
                {
                    console.log(response);
                    swal("Contact updated successfully!", "", "success");
                        $('#cid' + response.id +' td:nth-child(1)').text(response.id);
                        $('#cid' + response.id +' td:nth-child(2)').text(response.name);
                        $('#cid' + response.id +' td:nth-child(3)').text(response.surname);
                        $('#cid' + response.id +' td:nth-child(4)').text(response.phone);
                        $('#cid' + response.id +' td:nth-child(5)').text(response.email);
                        $('#cid' + response.id +' td:nth-child(6)').text(response.status);
                        $("#myModal1").modal('hide');
                        $("#editCont")[0].reset();
                }
            });
        });
    }
    
    </script>

</body>
</html>
{{-- <script>
$.ajax({
    type: 'GET',
    url: '"{{route('index')}}"',
    
    success: function (e) {
        var trLen = $("#bilun").children('tr').length;
        $.each(e,function(i , deneme){

       
            $("#bilun").append("<tr id=" + (parseInt(trLen) + 1) + ">" +
                "<td id=tr" + (parseInt(trLen) + 1) + "-id>" +  $("#id").val() + "</td>" +
                "<td id=tr" + (parseInt(trLen) + 1) + "-name>" +  $("#name").val() + "</td>" +
                "<td id=tr" + (parseInt(trLen) + 1) + "-surname>" + $("#surname").val() + "</td>" +
                "<td id=tr" + (parseInt(trLen) + 1) + "-email>" +  $("#email").val() + "</td>" +
                "<td id=tr" + (parseInt(trLen) + 1) + "-phone>" +  $("#phone").val() + "</td>" +
                "<td id=tr" + (parseInt(trLen) + 1) + "-status>" +  $("#status").val() + "</td>" +
             
                "</tr>");
            });

    },
});
</script> --}}

{{-- beforeSend: function(){
                
    if (!$client || !Hash::check($request->api_key, $client->api_key)) {
    return response('Not Authorized', 401);
    }
}, --}}
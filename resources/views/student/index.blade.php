@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Estudiantes</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('student.create') }}">Agregar estudiante</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td class="id">{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->address }}</td>
                                   
                                    <td class="edit">
                                        <a href="{{ route('student.edit', $student) }}>" class="btn btn-success">Editar</a>
                                    </td>
                                    <td class="delete">
                                        <form id="deleteForm" action="{{ route('student.destroy', $student->id) }}" method="post"
                                            class="form-hidden">
                                            <div onclick="confirmDelete({{ $student->id }})" class="btn btn-danger">Eliminar</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No se han registrado estuiantes</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $students->links('vendor/pagination/bootstrap-4') }}
                    <div id="modal">
                        <div id="modal-form">
                            <table cellpadding="10px" width="100%">

                            </table>
                            <div id="close-btn">X</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
          var x = confirm("CUIDADO!!! ¿Estás seguro de que quieres eliminar este estudiante? ESTO ELIMINARÁ TODOS LOS PRÉSTAMOS ASOCIADOS AL ESTUDIANTE. Clic en Aceptar para continuar, Cancelar para volver a atrás");
          if (x) {
              //Change the action form to delete the author with the corresponding ID
              document.getElementById("deleteForm").action = "/student/delete/" + id;
              document.getElementById("deleteForm").submit();

          }
          else
              return false;
      }

  </script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">

        // Show student detail
        $(".view-btn").on("click", function() {
            var student_id = $(this).data("sid");
            $.ajax({
                url: "http://127.0.0.1:8000/student/show/" + student_id,
                type: "get",
                success: function(student) {
                    console.log(student);
                    form =
                        "<tr><td>Nombre :</td><td><b>" + student['name'] + "</b></td></tr>" +
                        "<tr><td>Dirección :</td><td><b>" + student['address'] + "</b></td></tr>" +
                        "<tr><td>Clase :</td><td><b>" + student['class'] + "</b></td></tr>" +
                        "<tr><td>Teléfono :</td><td><b>" + student['phone'] + "</b></td></tr>" +
                        "<tr><td>E-mail :</td><td><b>" + student['email'] + "</b></td></tr>";
                    console.log(form);

                    $("#modal-form table").html(form);
                    $("#modal").show();
                }
            });
        });

        // Hide modal box
        $('#close-btn').on("click", function() {
            $("#modal").hide();
        });

        // Delete student script
        $(".delete-student").on("click", function() {
            var s_id = $(this).data("sid");
            $.ajax({
                url: "delete-student.php", // You might need to update this URL
                type: "POST",
                data: {
                    sid: s_id
                },
                success: function(data) {
                    $(".message").html(data);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });

        //Show shudent detail
        /*
        $(".view-btn").on("click", function() {
            var student_id = $(this).data("sid");
            $.ajax({
                url: "http://127.0.0.1:8000/student/show/"+student_id,
                type: "get",
                success: function(student) {
                    console.log(student);
                    form ="<tr><td>Student Name :</td><td><b>"+student['name']+"</b></td></tr><tr><td>Address :</td><td><b>"+student['address']+"</b></td></tr><tr><td>Gender :</td><td><b>"+ student['gender']+ "</b></td></tr><tr><td>Class :</td><td><b>"+ student['class']+ "</b></td></tr><tr><td>Age :</td><td><b>"+ student['age']+ "</b></td></tr><tr><td>Phone :</td><td><b>"+ student['phone']+ "</b></td></tr><tr><td>Email :</td><td><b>"+ student['email']+ "</b></td></tr>";
          console.log(form);

                    $("#modal-form table").html(form);
                    $("#modal").show();
                }
            });
        });

        //Hide modal box
        $('#close-btn').on("click", function() {
            $("#modal").hide();
        });

        //delete student script
        $(".delete-student").on("click", function() {
            var s_id = $(this).data("sid");
            $.ajax({
                url: "delete-student.php",
                type: "POST",
                data: {
                    sid: s_id
                },
                success: function(data) {
                    $(".message").html(data);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });
        */
    </script>
@endsection

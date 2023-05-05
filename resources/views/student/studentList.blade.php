<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-3">
        <button type="button" class="btn btn-primary" id="modelOpen" data-bs-toggle="modal" data-bs-target="#myModal">
            Open modal
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Student form</h4>
                        <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="studentForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                    name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sub">Subject:</label>
                                <input type="text" class="form-control" id="sub" placeholder="Enter Subject"
                                    name="sub">
                                @error('sub')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="div">Division:</label>
                                <input type="text" class="form-control" id="div" placeholder="Enter Division"
                                    name="div">
                                @error('div')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tname">Teacher Name:</label>
                                <select name="tname">
                                    @foreach ($tech as $teach)
                                        <option value="{{ $teach->id }}">{{ $teach->teacherName }}</option>
                                    @endforeach
                                </select>
                                @error('tname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="img">Image:</label>
                                <input type="file" class="form-control" id="img" name="img">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>



                </div>
            </div>
        </div>


        <!-- The Update Modal -->


        <!-- The Modal -->
        <div class="modal" id="myUpdateModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Student update form</h4>
                        <button type="button" class="btn-close" id="closeModel" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="studentUpdateForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control name" id="name" placeholder="Enter Name"
                                    name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sub">Subject:</label>
                                <input type="text" class="form-control sub" id="sub"
                                    placeholder="Enter Subject" name="sub">
                                @error('sub')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="div">Division:</label>
                                <input type="text" class="form-control div" id="div"
                                    placeholder="Enter Division" name="div">
                                @error('div')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tname">Teacher Name:</label>
                                <select name="tname" class="form-control tname">
                                    @foreach ($tech as $teach)
                                        <option value="{{ $teach->id }}">{{ $teach->teacherName }}</option>
                                    @endforeach
                                </select>
                                @error('tname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="img">Image:</label>
                                <div id="show_image"></div>
                                <input type="file" class="form-control img" id="img" name="img">
                                @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="id" class="id">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div>



                </div>
            </div>
        </div>





        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Subject</td>
                    <td>Division</td>
                    <td>Teacher Name</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        {{-- <table width="100%" border="1px">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                @foreach ($stud as $studs)
                    <tr>
                        <td>{{ $studs->id }}</td>
        <td>{{ $studs->name }}</td>
        <td>{{ $studs->sub }}</td>
        <td>{{ $studs->div }}</td>
        <td>{{ $studs->getTeacherName->teacherName }}</td>
        <td><img src="storage/images/{{ $studs->img }}" width="50px"></td>
        <td><a href="{{ route('studentEdit', $studs->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('studentDelete', $studs->id) }}" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        @endforeach

        </tbody>
        </table> --}}
    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $(document).on("click", "#modelOpen", function() {
            $('#myModal').modal('show');
        });



        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('studentList') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'sub',
                        name: 'sub'
                    },
                    {
                        data: 'div',
                        name: 'div'
                    },
                    {
                        data: 'tname',
                        name: 'tname'
                    },
                    {
                        data: 'img',
                        name: 'img'
                    },
                    {
                        data: 'action',
                        name: 'action',

                    },

                ]
            });

            // create Student

            $("#studentForm").on('submit', (function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('studentAdd') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        table.ajax.reload();
                        $('#myModal').modal('hide');

                    },
                });
            }));

            //Edit Student

            $(document).on("click", ".edit_btn", function() {
                var id = $(this).attr("data-id")
                $.ajax({
                    url: "{{ route('studentEdit') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#myUpdateModal").modal("show");
                        $(".name").val(data.stud.name)
                        $(".sub").val(data.stud.sub)
                        $(".div").val(data.stud.div)
                        $(".tname").val(data.stud.tname)
                        $(".id").val(data.stud.id)
                        var urls = window.location.origin
                        $("#show_image").html('<img src="' + urls +
                            '/storage/images/' + data.stud.img +
                            '" width="50" class="img-fluid img-thumbnail">')
                    },
                });
            });

            // create Student

            $("#studentUpdateForm").on('submit', (function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('studentUpdate') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        table.ajax.reload();
                        $('#myUpdateModal').modal('hide');

                    },
                });
            }));


            $(document).on("click", ".delete_btn", function() {

                $.ajax({
                    url: "{{ route('studentDelete') }}",
                    type: "GET",
                    data: {
                        id: $(this).attr("data-id"),
                    },

                    success: function(data) {

                        table.ajax.reload();
                        $("#myUpdateModal").modal("hide");


                    },
                });
            });


        });
    })

    $("#closeModel").click(function() {
        $('#studentForm').trigger("reset");
    })
</script>

</html>

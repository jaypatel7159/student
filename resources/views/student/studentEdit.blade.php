<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Student Update form</h2>
        <form action="{{ route('studentUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $stud->id }}">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ $stud->name }}"
                    placeholder="Enter Name" name="name">
            </div>
            <div class="mb-3">
                <label for="sub">Subject:</label>
                <input type="text" class="form-control" id="sub" value="{{ $stud->sub }}"
                    placeholder="Enter Subject" name="sub">
            </div>
            <div class="mb-3">
                <label for="div">Division:</label>
                <input type="text" class="form-control" id="div" value="{{ $stud->div }}"
                    placeholder="Enter Division" name="div">
            </div>
            <div class="mb-3">
                <label for="tname">Teacher Name:</label>
                <select name="tname">
                    <option value="{{ $stud->id }}">{{ $tech->teacherName }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="img">Image:</label>
                <img src="/storage/images/{{ $stud->img }}" width="50px">
                <input type="file" class="form-control" id="img" name="img">
            </div>


            <input type="submit" name="submit" value="Submit">

        </form>
    </div>

</body>

</html>

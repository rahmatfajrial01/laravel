<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>

<body>
    <p align='center'><b>Blog List</b></p>
    <table style="width:100%">
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Body</th>
        </tr>
        @foreach ($blogs as $blog)
            <tr>
                <td> {{ $blog->title }} </td>
                <td> {{ $blog->category->title }}</td>
                <td> {{ $blog->excerpt }}</td>
            </tr>
        @endforeach

    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>

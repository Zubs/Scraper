<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Interior companies in Lagos</title>
</head>
<body class="container py-5">
<table class="table table-striped table-hover caption-top">
    <caption>Users</caption>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Link</th>
    </tr>
    </thead>
    <tbody>
    @forelse($companies as $company)
        @if($company != null)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $company['name'] }}</td>
                <td>{{ $company['address'] }}</td>
                <td>{{ $company['link'] }}</td>
            </tr>
        @endif
    @empty
        <p>No companies found</p>
    @endforelse
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

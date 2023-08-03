<!DOCTYPE html>
<html>
<head>
    <title>Create Campaign</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Campaign Manager</a>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong>Create Campaign</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('campaigns') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Campaign Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter campaign name">
                        </div>
                        <div class="form-group">
                            <label for="content">Campaign Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter campaign content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

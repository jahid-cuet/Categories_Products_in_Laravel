<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
{{-- @if($message=Session::get('success'))
<div class="alert alert-success alert-block">
  <strong>{{$message}}</strong>
</div> --}}

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h1>{{ $info->title }} </h1>
                <form method="POST" action="{{ route($info->form_route) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name<span>&#x002A;</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Product Name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="price" class="form-label">Price <span>&#x002A;</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter Price" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image:</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select" id="category" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->type }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="small_description" class="form-label">Description<span>&#x002A;</span></label>
                            <input type="text" class="form-control @error('small_description') is-invalid @enderror" id="small_description" name="small_description" placeholder="Write a small description" value="{{ old('small_description') }}">
                            @error('small_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

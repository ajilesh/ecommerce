@extends('layout.admin.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="content-header">
            <h2 class="content-title">Add New Product</h2>
            
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Basic</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('productinsert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="product_name" class="form-label">Product title</label>
                        <input type="text" name="pname" placeholder="Type here" value="{{ old('pname') }}" class="form-control" id="product_name">
                        @error('pname')
                        <span class="text-danger">
                            {{ $message }}
                        </span>@enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Full description</label>
                        <textarea name="pdescr" placeholder="Type here" class="form-control" rows="4"></textarea>
                        @error('pdescr')
                        <span class="text-danger">
                            {{ $message }}
                        </span>@enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Regular price</label>
                                <div class="row gx-2">
                                    <input placeholder="$" name="rprice" type="text" class="form-control">
                                </div>
                            </div>
                            @error('rprice')
                            <span class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label">Promotional price</label>
                                <input placeholder="$" name="pprice" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Currency</label>
                            <select name="pcurrency" class="form-select">
                                <option> USD </option>
                                <option> EUR </option>
                                <option> RUBL </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Category</label>
                                <select name="pcat" class="form-select">
                                    <option> Automobiles </option>
                                    <option> Home items </option>
                                    <option> Electronics </option>
                                    <option> Smartphones </option>
                                    <option> Sport items </option>
                                    <option> Baby and Tous </option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Sub-category</label>
                                <select name="psubcat" class="form-select">
                                    <option> Nissan </option>
                                    <option> Honda </option>
                                    <option> Mercedes </option>
                                    <option> Chevrolet </option>
                                </select>
                            </div>
                            
                        </div> <!-- row.// -->
                    </div>
                    <div class="mb-4">
                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Size</label>
                                <select name="psize" class="form-select">
                                    <option> S </option>
                                    <option>L </option>
                                    <option>M </option>
                                    <option>XL</option>
                                    <option>XXL </option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Colors</label>
                                <select name="pcolor" class="form-select">
                                    <option> RED </option>
                                    <option> ORANGE </option>
                                    <option> BLUE </option>
                                    <option> GREEN </option>
                                </select>
                            </div>
                            
                        </div> <!-- row.// -->
                    </div>
                    <div class="mb-4">
                        <div class="input-upload">
                            <img src="assets/imgs/theme/upload.svg" alt="">
                            <input name="pimage[]" multiple class="form-control" accept="image/*" type="file">
                        </div>
                        @error('pimage')
                           <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tax rate</label>
                        <input name="ptax" type="text" placeholder="%" class="form-control" id="product_name">
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-md rounded font-sm hover-up">Publish</button>
                    </div>
                </form>
            </div>
        </div> <!-- card end// -->
        
    </div>
    
</div>
@endsection

@extends('cdns')
@section('title', 'Update')

@section('content')
    <div class="row">
      <div class="col-sm-6 offset-3">
        <h5 class="text-center text-uppercase alert alert-info py-2">Update Record</h5>
         <form action="" method="POST" class="form-control">
          @csrf
          @method('PUT')
         <div class="row mb-3">
            <input type="hidden" name="update_id" value="{{$student->id}}">
            <label for="colFormLabelSm" class="col-form-label">Name</label>
            <div class="col">
              <input type="text" name="name" value="{{$student->name}}" class="form-control" id="colFormLabelSm" >
            </div>
          </div>
          <div class="row mb-3">
            <label for="colFormLabel" class="col-form-label">City</label>
            <div class="col">
              <input type="text" name="city" value="{{$student->city}}" class="form-control" id="colFormLabel">
            </div>
          </div>
          <div class="row">
            <label for="colFormLabelLg" class="col-form-label">Pin Code</label>
            <div class="col">
              <input type="number" name="pin_code" value="{{$student->pincode}}" class="form-control" id="colFormLabelLg">
            </div>
          </div>
          <div class="mt-4 text-center">
            <input type="submit" value="Update Record"  class="btn btn-info btn-sm">
          </div>
         </form>
      </div>
    </div>
@endsection
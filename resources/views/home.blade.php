@extends('cdns')
@section('title', 'Home')

@section('content')
    <div class="row">
      {{-- Show Form --}}
      <div class="col-sm-4">
        <h5 class="text-center text-uppercase alert alert-warning py-2">Add Students</h5>
         <form action="{{route('add')}}" method="POST" class="form-control">
          @csrf
         <div class="row mb-3">
            <label for="colFormLabelSm" class="col-form-label">Name</label>
            <div class="col">
              <input type="text" name="name" class="form-control" id="colFormLabelSm" >
            </div>
          </div>
          <div class="row mb-3">
            <label for="colFormLabel" class="col-form-label">City</label>
            <div class="col">
              <input type="text" name="city" class="form-control" id="colFormLabel">
            </div>
          </div>
          <div class="row">
            <label for="colFormLabelLg" class="col-form-label">Pin Code</label>
            <div class="col">
              <input type="number" name="pin_code" class="form-control" id="colFormLabelLg">
            </div>
          </div>
          <div class="mt-4 text-center">
            <input type="submit" value="Add Record"  class="btn btn-success btn-sm">
          </div>
         </form>
         <div>
          @if (session('status'))
              <div class="alert alert-success mt-2">
                {{session('status')}}
              </div>
          @endif
          @if (session('delete'))
              <div class="alert alert-danger mt-2">
                {{session('delete')}}
              </div>
          @endif
          @if (session('something'))
              <div class="alert alert-info mt-2">
                {{session('something')}}
              </div>
          @endif
         </div>
      </div>
      {{-- End Form --}}
      {{-- Show Student Table --}}
      <div class="col-sm-8">
        <h5 class="text-center text-uppercase alert alert-info py-2">Students Information</h5>
         <table class="table">
            <thead class="table-light">
              <th>Id</th>
              <th>Name</th>
              <th>City</th>
              <th>Pin Code</th>
              <th>Action</th>
            </thead>
            <tbody>
              @if ($students)
                  @foreach ($students as $stud)
                  <tr>
                    <td>{{$stud->id}}</td>
                    <td>{{$stud->name}}</td>
                    <td>{{$stud->city}}</td>
                    <td>{{$stud->pincode}}</td>
                    <td>
                        <form action="{{route('edit')}}" method="POST" class="d-inline">
                          @csrf
                          <input type="hidden" name="update_id" value="{{$stud->id}}">
                          <input type="submit" value="Edit" class="btn btn-info btn-sm">
                        </form>
                        <form action="{{route('delete')}}" method="POST" class="d-inline">
                          @csrf
                          <input type="hidden" name="delete_id" value="{{$stud->id}}">
                          <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                  </tr>
                  @endforeach
              @endif
            </tbody>
          </table>
      </div>
      {{-- End Table--}}
    </div>
@endsection
@extends('admin.layouts.app')

@section('content')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header">Create New Question</div>



                    <div class="card-body">
                         @if (session('success'))
                         <div class="alert alert-primary alert-dismissible show">
                              {{ session('success') }}

                         </div>
                         @endif
                         @if (session('error'))
                         <div class="alert alert-danger alert-dismissible show">
                              {{ session('error') }}

                         </div>
                         @endif
                         <form method="POST" action="{{ route('admin.question.store') }}">
                              @csrf

                              <div class="form-group">
                                   <label for="question">Question:</label>
                                   <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
                              </div>

                              <div class="form-group">
                                   <label for="options">Options:</label>
                                   <input type="text" class="form-control" name="options[]" placeholder="Option 1" required>
                                   <input type="text" class="form-control mt-2" name="options[]" placeholder="Option 2" required>
                                   <input type="text" class="form-control mt-2" name="options[]" placeholder="Option 3" required>
                                   <input type="text" class="form-control mt-2" name="options[]" placeholder="Option 4" required>
                              </div>
                              <br>
                              <div class="form-group">
                                   <label for="correct_option">Correct Option:</label>
                                   <select class="form-control" name="correct_option" required>
                                        <option value="">Select correct option</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                   </select>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary">Create Question</button>

                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>

@endsection
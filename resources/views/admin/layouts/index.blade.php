@extends('admin.layouts.app')

@section('content')
<div class="container">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                         @if (session('status'))
                         <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                         </div>
                         @endif


                         <div>

                              <a href="{{ route('admin.question.add')}}" class="btn btn-primary"> Create Questions </a>

                         </div>

                         <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                   <tr>
                                        <th>Sr</th>
                                        <th>Question</th>
                                        <th>Correct answer</th>
                                        <th>Create date</th>

                                   </tr>
                              </thead>
                              <tbody>

                                   @if(isset($questions))
                                   @foreach($questions as $item)
                                   <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{$item->question}}</td>
                                        <td> {{ $item->correctOption->option->option }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d')}}</td>

                                   </tr>
                                   @endforeach
                                   @endif

                              </tbody>

                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>

@endsection